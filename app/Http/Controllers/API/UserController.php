<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    

    public function loggedInfo(Request $request){
        return $request->user();
    }


    public function userList(Request $request){
         
        return $request->user();
    }

    public function createUser(Request $request){
         
        User::create([
            "name"     => $request->name,
            "email"    => $request->email,
            "password" => $request->name,
            "role_id"  => 1
        ]);
        return response(['message'=>"User successfully created"]);
    }
}
