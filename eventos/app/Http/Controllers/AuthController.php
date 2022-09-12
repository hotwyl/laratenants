<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LogarRequest;
use App\Service\AuthService;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->middleware('auth', ['except' => [
            'register', 'login'
        ]]);

        $this->authService = $authService;
    }

    public function register(AuthRequest $request)
    {
        return $this->authService->register($request->all());
    }

    public function login(LogarRequest $request)
    {
        return $this->authService->login($request->only('email', 'password'));
    }
}
