<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use JWTAuth;
use Redirect;
use Validator;
use App\PetImages;
use App\Pets;
use Session;

class PetsController extends Controller
{
    public function __construct()
    {
        $this->message = '';
        $this->response_success = ['status' => true, 'message' => $this->message];
        $this->message = '';
        $this->response_failure = ['status' => false, 'message' => $this->message];
        $this->directory_petimage = "petimages";

    }

    public function upload_pets_image(Request $request)
    {
        $response = [];
        $data = $request->all();
        $username = isset($data['pet_id']) ? $data['pet_id'] : '';
        $firstName = isset($data['image']) ? $data['image'] : '';

        if (empty($pet_id) || empty($image)) {
            $response = array_merge($this->response_failure, ['errors' => null]);
            $response['message'] .= 'Invalid or incorrect parameters!';
            return response()->json($response);
        }

        $validator = PetImages::validate_add($data);
        if ($validator->fails()) {
            $response = array_merge($this->response_failure, ['errors' => $validator->errors()]);
            $response['message'] .= 'Invalid or incorrect parameters!';
            return response()->json($response);
        }

        // pets image file upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if (verify_file_mime_type($file, 'image')) {
                $data['image'] = upload_file($file, $this->directory_petimage);
            } else
                $response = array_merge($this->response_failure, ['errors' => $validator->errors()]);
                $response['message'] .= 'Please upload a valid image file.';
                return response()->json($response);                
        }
        
        $pets=PetImages::create($data); 
        $pets_image_data['id'] = $pets->id; 
        $pets_image_data['pet_id'] = $pets->pet_id;
        $pets_image_data['phone'] = $pets->image;
        $response = array_merge($this->response_success, ['data' => $pets_image_data]);
        $response['message'] .= 'pets image saved!';
        return response()->json($response);         
    }




    public function fetchpet($id)
    {
        $response = [];        
        if (empty($id)) {
            $response = array_merge($this->response_failure, ['errors' => null]);
            $response['message'] .= 'Invalid or incorrect parameters!';
            return response()->json($response);
        }
        $pets_detail = Pets::where('id', $id)->with('category')->with('tags')->get();
        $pets_detail=collect($pets_detail)->toArray();
        if (empty($pets_detail)) { 
            $response = array_merge($this->response_failure, ['errors' => null]);
            $response['message'] .= 'Pets not found!';
            return response()->json($response);
        }else{
            $pets_detail=collect($pets_detail)->first(); 
            $pets_data['id'] = $pets_detail['id'];
            $pets_data['category']['id'] = $pets_detail['category']['id'];
            $pets_data['category']['name'] = $pets_detail['category']['name'];
            $pets_data['name'] = $pets_detail['name'];
            $pets_data['tags']['id'] = $pets_detail['tags']['id'];
            $pets_data['tags']['name'] = $pets_detail['tags']['name']; 
            $pets_data['status'] = $pets_detail['status'];
            $response = array_merge($this->response_success, ['data' => $pets_data]);
            $response['message'] .= 'Pets detail!';
            return response()->json($response);    
        }                 
    }


     public function update_pets(Request $request)
    {
        $response = [];
        $data = $request->all();
        $id = isset($data['id']) ? $data['id'] : '';
        $name = isset($data['name']) ? $data['name'] : '';
        $category_id = isset($data['category']['id']) ? $data['category']['id'] : '';
        $category_name = isset($data['category']['name']) ? $data['category']['name'] : '';
        $tags_id = isset($data['tags']['id']) ? $data['tags']['id'] : '';
        $tags_name = isset($data['tags']['name']) ? $data['tags']['name'] : '';

        if (empty($id) || empty($name) || empty($category_id) || empty($category_name) || empty($tags_id) || empty($tags_name)) {
            $response = array_merge($this->response_failure, ['errors' => null]);
            $response['message'] .= 'Invalid or incorrect parameters!';
            return response()->json($response);
        }

        $validator = Pets::validate_update($data);
        if ($validator->fails()) {
            $response = array_merge($this->response_failure, ['errors' => $validator->errors()]);
            $response['message'] .= 'Invalid or incorrect parameters!';
            return response()->json($response);
        }      

        $record = Pets::findOrFail($data['id']);
        $record->update($data);        
        $pets_data['id'] = $pets_detail['id'];
        $pets_data['category']['id'] = $pets_detail['category']['id'];
        $pets_data['category']['name'] = $pets_detail['category']['name'];
        $pets_data['name'] = $pets_detail['name'];
        $pets_data['tags']['id'] = $pets_detail['tags']['id'];
        $pets_data['tags']['name'] = $pets_detail['tags']['name']; 
        $pets_data['status'] = $pets_detail['status'];
        $response = array_merge($this->response_success, ['data' => $pets_data]);
        $response['message'] .= 'User updated!';
        return response()->json($response);         
    }

    public function petsDelete($id)
    {
        $response = [];
        if (empty($id)) {
            $response = array_merge($this->response_failure, ['errors' => null]);
            $response['message'] .= 'Invalid or incorrect parameters!';
            return response()->json($response);
        }
        $pets_detail = Pets::where('id', $id)->get();
        $pets_detail=collect($pets_detail)->toArray();
        if (empty($pets_detail)) {
            $response = array_merge($this->response_failure, ['errors' => null]);
            $response['message'] .= 'No record found!';
            return response()->json($response);
        }else{
            $pets_detail=collect($pets_detail)->first();
            Pets::where('id',$pets_detail['id'])->delete();
            $response = array_merge($this->response_success);
            $response['message'] .= 'Pet deleted.';
            return response()->json($response);
        }                 
    }   

}