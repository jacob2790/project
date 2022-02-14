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
use Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->message = '';
        $this->response_success = ['status' => true, 'message' => $this->message];
        $this->message = '';
        $this->response_failure = ['status' => false, 'message' => $this->message];
    }

    public function usercreate(Request $request)
    {
        $response = [];
        $data = $request->all();
        $username = isset($data['username']) ? $data['username'] : '';
        $firstName = isset($data['firstName']) ? $data['firstName'] : '';
        $lastName = isset($data['lastName']) ? $data['lastName'] : '';
        $email = isset($data['email']) ? $data['email'] : '';
        $phone = isset($data['phone']) ? $data['phone'] : '';
        $password = isset($data['password']) ? $data['password'] : '';

        if (empty($username) || empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($password)) {
            $response = array_merge($this->response_failure, ['errors' => null]);
            $response['message'] .= 'Invalid or incorrect parameters!';
            return response()->json($response);
        }

        $validator = User::validate_add($data);
        if ($validator->fails()) {
            $response = array_merge($this->response_failure, ['errors' => $validator->errors()]);
            $response['message'] .= 'Invalid or incorrect parameters!';
            return response()->json($response);
        }

        if ($this->exists($data['email'])) {
            $response = array_merge($this->response_failure, ['errors' => []]);
            $response['message'] .= 'An account using the same email address already exists! Please use a new email.';
            return response()->json($response);
        }

        if ($this->exists_username($data['username'])) {
            $response = array_merge($this->response_failure, ['errors' => []]);
            $response['message'] .= 'An account using the same user name already exists! Please use a new user name.';
            return response()->json($response);
        }

        $data['password'] = Hash::make($password);
        $user=User::create($data);       
        unset($data['password']);
        $user_data['id'] = $user->id;
        $user_data['username'] = $user->username;
        $user_data['firstName'] = $user->firstName;
        $user_data['lastName'] = $user->lastName;
        $user_data['email'] = $user->email;
        $user_data['phone'] = $user->phone;
        $response = array_merge($this->response_success, ['data' => $user_data]);
        $response['message'] .= 'User created!';
        return response()->json($response);         
    }

    public function fetchuser($username)
    {
        $response = [];        
        if (empty($username)) {
            $response = array_merge($this->response_failure, ['errors' => null]);
            $response['message'] .= 'Invalid or incorrect parameters!';
            return response()->json($response);
        }

        $user_detail = User::where('username', $username)->get();
        $user_detail=collect($user_detail)->toArray();

        if (empty($user_detail)) { 
            $response = array_merge($this->response_failure, ['errors' => null]);
            $response['message'] .= 'Invalid user detail!';
            return response()->json($response);
        }else{
            $user_detail=collect($user_detail)->first(); 
            $user_data['id'] = $user_detail['id'];
            $user_data['username'] = $user_detail['username'];
            $user_data['firstName'] = $user_detail['firstName'];
            $user_data['lastName'] = $user_detail['lastName'];
            $user_data['email'] = $user_detail['email'];
            $user_data['phone'] = $user_detail['phone']; 
            $response = array_merge($this->response_success, ['data' => $user_data]);
            $response['message'] .= 'User detail!';
            return response()->json($response);    
        }                 
    }


     public function userupdate(Request $request)
    {
        $response = [];
        $data = $request->all();
        $username = isset($data['username']) ? $data['username'] : '';
        $firstName = isset($data['firstName']) ? $data['firstName'] : '';
        $lastName = isset($data['lastName']) ? $data['lastName'] : '';
        $email = isset($data['email']) ? $data['email'] : '';
        $phone = isset($data['phone']) ? $data['phone'] : '';
        

        if (empty($username) || empty($firstName) || empty($lastName) || empty($email) || empty($phone)) {
            $response = array_merge($this->response_failure, ['errors' => null]);
            $response['message'] .= 'Invalid or incorrect parameters!';
            return response()->json($response);
        }

        $validator = User::validate_update($data);
        if ($validator->fails()) {
            $response = array_merge($this->response_failure, ['errors' => $validator->errors()]);
            $response['message'] .= 'Invalid or incorrect parameters!';
            return response()->json($response);
        }

        if ($this->exists($data['email'],$data['id'])) {
            $response = array_merge($this->response_failure, ['errors' => []]);
            $response['message'] .= 'An account using the same email address already exists! Please use a new email.';
            return response()->json($response);
        }

        if ($this->exists_username($data['username'],$data['id'])) {
            $response = array_merge($this->response_failure, ['errors' => []]);
            $response['message'] .= 'An account using the same user name already exists! Please use a new user name.';
            return response()->json($response);
        }

        $record = User::findOrFail($data['id']);
        $record->update($data);
        $user_data['id'] = $record->id;
        $user_data['username'] = $record->username;
        $user_data['firstName'] = $record->firstName;
        $user_data['lastName'] = $record->lastName;
        $user_data['email'] = $record->email;
        $user_data['phone'] = $record->phone;
        $response = array_merge($this->response_success, ['data' => $user_data]);
        $response['message'] .= 'User updated!';
        return response()->json($response);         
    }






    public function userDelete($username)
    {
        $response = [];
        if (empty($username)) {
            $response = array_merge($this->response_failure, ['errors' => null]);
            $response['message'] .= 'Invalid or incorrect parameters!';
            return response()->json($response);
        }

        $user_detail = User::where('username', $username)->get();
        $user_detail=collect($user_detail)->toArray();

        if (empty($user_detail)) {
            $response = array_merge($this->response_failure, ['errors' => null]);
            $response['message'] .= 'User not found';
            return response()->json($response);
        }else{
            $user_detail=collect($user_detail)->first();
            User::where('id',$user_detail['id'])->delete();
            $response = array_merge($this->response_success);
            $response['message'] .= 'User deleted.';
            return response()->json($response);
        }                 
    }



    
    public function login(Request $request)
    {
        $response = [];
        $data = $request->all();
        $email = (isset($data['email'])) ? $data['email'] : '';
        $password = (isset($data['password'])) ? $data['password'] : '';

        if (empty($email) || empty($password)) {
            $response = array_merge($this->response_failure, ['errors' => null]);
            $response['message'] .= 'Invalid or incorrect parameters!';
            return response()->json($response);
        }        

        if (Auth::attempt(['email' => $email, 'password' => $password,])) {
            $User = User::where('email', $email)
                ->select('id', 'username', 'firstName', 'lastName', 'email', 'phone','userStatus')
                ->first();

            // inactive User account
            if ($User->userStatus != 0) {
                $response = array_merge($this->response_failure, ['errors' => []]);
                $response['message'] .= 'Your account is inactive! Please contact administrator.';
                return response()->json($response);
            }

            $token = JWTAuth::fromUser($User);
            unset($data['password']);
            $User_data['id'] = $User->id;
            $User_data['username'] = $User->username;
            $User_data['firstName'] = $User->firstName;
            $User_data['lastName'] = $User->lastName;
            $User_data['email'] = $User->last_name;
            $User_data['phone'] = $User->phone;
            $response = array_merge($this->response_success, ['data' => $User_data, 'token' => $token]);
        } else {
            $response = array_merge($this->response_failure, ['errors' => []]);
            $response['message'] .= 'Incorrect email or password! Please try again.';
            return response()->json($response);
        }
        return response()->json($response);
    }


    public function logout()
    {  
        $response = [];       
        Auth::logout();
        Session::flush();
        $response = array_merge($this->response_success);
        $response['message'] .= 'You have been successfully logged out!';
        return response()->json($response);
    }





  
    /* Custom methods */
    public function exists($email, $id = null)
    {
        if ($id == null) $items = User::all()->where('email', $email); else
            $items = User::all()->where('email', $email)->where('id', '!=', $id);
        return ($items->count() > 0) ? true : false;
    }



    public function exists_username($username, $id = null)
    {
        if ($id == null) $items = User::all()->where('username', $username); else
            $items = User::all()->where('username', $username)->where('id', '!=', $id);
        return ($items->count() > 0) ? true : false;
    }  

}