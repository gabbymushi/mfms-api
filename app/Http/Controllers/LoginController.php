<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use JWTFactory;
use JWTAuth;
use App\Models\User;
use Config;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use App\Models\Employee;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        Config::set('jwt.user', 'App\Models\User');
        Config::set('jwt.identifier', 'user_id');
        Config::set('auth.providers.users.model', User::class);
        //        $validator = Validator::make($request->all(), [
        //            'email' => 'required|string|email|max:255',
        //            'password'=> 'required'
        //        ]);
        //        if ($validator->fails()) {
        //            return response()->json($validator->errors());
        //        }
        //return response()->json($request->input('email'));
        //$credentials = $request->only('username', 'password');
        try {
            if (!$token = JWTAuth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        //return Auth::user()->name;
        $user = JWTAuth::toUser($token);
        if ($user->user_type == "member") {
            $user_info=Member::where('user_id',$user->user_id)->first();
         }else if($user->user_type == "manager"){
            $user_info=Employee::where('user_id',$user->user_id)->first();
         }
        return response()->json(compact('token', 'user','user_info'));
        //return response()->json(compact('token'));
    }
}
