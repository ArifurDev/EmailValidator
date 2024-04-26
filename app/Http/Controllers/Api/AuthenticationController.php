<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends BaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if($validator ->fails())
        {
            return $this->sendError('Validation error',$validator->errors());
        }

        $password = bcrypt($request->password);

        //create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password
        ]);

        //create token
        $success['token'] = $user->createToken('RestApi')->plainTextToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success,'User created successfully');

    }

    public function login(Request $request)
    {
        // Logic for user login
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails())
        {
            return $this->sendError('Validation error',$validator->errors());
        }

        //check user
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
        {
            $user = Auth::user();

            //create token
            $success['token'] = $user->createToken('RestApi')->plainTextToken;
            $success['name'] = $user->name;

            return $this->sendResponse($success,'user loging successfully');
        }else{
            return $this->sendError('Unauthorised',['error'=>'Unauthorised']);
        }
    }

    public function logout()
    {
        // Logic for user logout
        Auth::user()->tokens()->delete();
        return $this->sendResponse([],'User logout successfully');
    }
}
