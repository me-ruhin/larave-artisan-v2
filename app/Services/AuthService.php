<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{


    public function isUserExists($email, $password)
    {
        $user =  User::where(['email' => $email])->first();

        if (!$user) {

            $data = [
                "status" => false,
                "message" => "Email not found",
                "code" => 404
            ];
            return $data;
        }


        if (!Hash::check($password, $user->password)) {
            $data = [
                "status" => false,
                "message" => "Invalid password",
                "code" => 404
            ];
            return $data;
        }
        $user['token'] = $this->generateToken($user);
        $user['token_type'] = "Bearer";
        return  $user;

        //    $token =  $this->generateToken($user);

    }

    public function generateToken($user)
    {
        $token = $user->createToken('test')->plainTextToken;
        return $token;
    }
}
