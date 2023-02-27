<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['username'] =  $user->username;
            $success['email'] = $user->email;
            $success['password'] = $user->password;


            return response()->json([
                'status' => 'success',
                'data' => $success
            ]);

        }
        else{
            return response()->json(['error'=>'Login Unsuccesfully']);
        }
    }
    public function signup(Request $request)
    {
        $validator = Validator ::make($request->all(), [
            'username' => ' required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return response()->json('Error validation', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('auth_token')->plainTextToken;
        $success['username'] = $user->name;

        return response()->json([
            [
                'status' => 'success',
                'data' => $user
            ]
        ]);

    }
}
