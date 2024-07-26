<?php

namespace App\Controllers;

use App\Dtos\LoginRequestDto;
use App\Dtos\RegisterRequestDto;
use App\Services\AuthService;

class AuthController
{

    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login()
    {
        $this->authService->loginView();
    }

    public function register()
    {
        $this->authService->registerView();
    }

    public function processLogin()
    {
        $dto = new LoginRequestDto;
        $dto->usernameOrEmail = $_POST['usernameOrEmail'] ?? '';
        $dto->password = $_POST['password'] ?? '';

        $this->authService->authenticate($dto);
    }

    public function processRegister()
    {
        $dto = new RegisterRequestDto;
        $dto->username = $_POST['username'] ?? '';
        $dto->email = $_POST['email'] ?? '';
        $dto->password = $_POST['password'] ?? '';
        $this->authService->register($dto);
    }

    public function logout()
    {
        $this->authService->logout();
    }
}