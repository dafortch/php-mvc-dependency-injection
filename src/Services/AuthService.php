<?php

namespace App\Services;

use App\Dtos\LoginRequestDto;
use App\Dtos\RegisterRequestDto;

interface AuthService
{
    public function loginView();

    public function authenticate(LoginRequestDto $loginRequest);

    public function registerView();

    public function register(RegisterRequestDto $registerRequest);

    public function logout();
}