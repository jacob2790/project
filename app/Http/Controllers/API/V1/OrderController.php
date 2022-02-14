<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;
use JWTAuth;
use Redirect;
use Validator;
use App\User;
use App\PetImages;
use App\Pets;
use App\Stores;
use Session;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->message = '';
        $this->response_success = ['status' => true, 'message' => $this->message];
        $this->message = '';
        $this->response_failure = ['status' => false, 'message' => $this->message];
    }

    public function ordercreate(Request $request)
    {
        $response = [];
        $data = $request->all();
        $petId = isset($data['petId']) ? $data['petId'] : '';
        $quantity = isset($data['quantity']) ? $data['quantity'] : '';
        $shipDate = isset($data['shipDate']) ? $data['shipDate'] : '';
        $status = isset($data['status']) ? $data['status'] : '';
        $complete = isset($data['complete']) ? $data['complete'] : '';        

        if (empty($petId) || empty($quantity) || empty($shipDate) || empty($status) || empty($complete)) {
            $response = array_merge($this->response_failure, ['errors' => null]);
            $response['message'] .= 'Invalid or incorrect parameters!';
            return response()->json($response);
        }

        $validator = Stores::validate_add($data);
        if ($validator->fails()) {
            $response = array_merge($this->response_failure, ['errors' => $validator->errors()]);
            $response['message'] .= 'Invalid or incorrect parameters!';
            return response()->json($response);
        }
       
        $order=Stores::create($data);
        $order_data['id'] = $order->id;
        $order_data['petId'] = $order->petId;
        $order_data['quantity'] = $order->quantity;
        $order_data['shipDate'] = $order->shipDate;
        $order_data['status'] = $order->status;
        $order_data['complete'] = $order->complete;
        $response = array_merge($this->response_success, ['data' => $order_data]);
        $response['message'] .= 'Order created!';
        return response()->json($response);         
    }

    public function fetchorder($orderId)
    {
        $response = [];        
        if (empty($orderId)) {
            $response = array_merge($this->response_failure, ['errors' => null]);
            $response['message'] .= 'Invalid or incorrect parameters!';
            return response()->json($response);
        }

        $order_detail = Stores::where('id', $orderId)->get();
        $order_detail=collect($order_detail)->toArray();

        if (empty($order_detail)) { 
            $response = array_merge($this->response_failure, ['errors' => null]);
            $response['message'] .= 'No records found.';
            return response()->json($response);
        }else{
            $order_detail=collect($order_detail)->first(); 
            $order_data['id'] = $order_detail['id'];
            $order_data['petId'] = $order_detail['petId'];
            $order_data['quantity'] = $order_detail['quantity'];
            $order_data['shipDate'] = $order_detail['shipDate'];
            $order_data['status'] = $order_detail['status'];
            $order_data['complete'] = $order_detail['complete']; 
            $response = array_merge($this->response_success, ['data' => $order_data]);
            $response['message'] .= 'User detail!';
            return response()->json($response);    
        }                 
    }


    public function orderDelete($orderId)
    {
        $response = [];
        if (empty($orderId)) {
            $response = array_merge($this->response_failure, ['errors' => null]);
            $response['message'] .= 'Invalid or incorrect parameters!';
            return response()->json($response);
        }

        $order_detail = Stores::where('id', $orderId)->get();
        $order_detail=collect($order_detail)->toArray();

        if (empty($order_detail)) {
            $response = array_merge($this->response_failure, ['errors' => null]);
            $response['message'] .= 'User not found';
            return response()->json($response);
        }else{
            $order_detail=collect($order_detail)->first();
            Stores::where('id',$orderId)->delete();
            $response = array_merge($this->response_success);
            $response['message'] .= 'Order deleted.';
            return response()->json($response);
        }                 
    }

}