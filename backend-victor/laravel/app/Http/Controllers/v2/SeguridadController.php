<?php

namespace App\Http\Controllers\v2;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SeguridadController extends BaseController
{
    function login(Request $request)
    {
        $response = new \stdClass();

        $user = User::where("email","=",$request->email)
        ->where("password","=",$request->password)
        ->first();

        if($user)
        {
            $response->success = true;
            $response->data = new \stdClass();

            $token = $user->createToken('Laravel Password Grant Client')->accessToken;

            //return $token;
            
            $response->data->access_token=$token;
            $response->data->token_type="Bearer";

            return response()->json($response,200);
       }
        else
        {
            $response->success = false;
            $response->errors = [];
            $response->errors[]="el ususuario o contraseña no existen";

            return response()->json($response,400);
        }
    }

    function store(Request $request)
    {
        $response = new \stdClass();

        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->email_verified_at=date("Y-m-d H:i:s");
        $user->save();

        /*
        $user_data = [
            "name" => "user05",
            "email" => "user05@syslacs.com",
            "password" => "123",
            "remember_token" => Str::random(10),
        ];
        $user = User::create($user_data);
        $user = User::find($user->id);
        */

        //$token = $user->createToken('Laravel Password Grant Client')->accessToken;
        //$response = ['token' => $token];

        $response->data = new \stdClass();
        $response->data=$user;
        $response->success=true;

        return response()->json($response, 200);

    }
}
