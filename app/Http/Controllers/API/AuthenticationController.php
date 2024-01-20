<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use App\Services\AuthService;
use Log;

class AuthenticationController extends Controller
{
    private $authService; // DI

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(loginRequest $request)
    {
        $user =  $this->authService->isUserExists($request->email, $request->password);

        return response($user);
    }
}
