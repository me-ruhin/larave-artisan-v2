<?php 
namespace App\Services;

use App\Models\User;

class AuthService{


public function isUserExists($email, $password){
    $user =  User::where(['email'=>$email])->first();
    
    if(!$user){
        return false;
    }
    $user['token'] = $this->generateToken($user);
    $user['token_type'] = "Bearer";
    return  $user;

//    $token =  $this->generateToken($user);
    
}

public function generateToken($user){
    $token = $user->createToken('test')->plainTextToken;
    return $token;
}

}

?>