<?php

namespace App\Dtos;

class LoginRequestDto
{
    public string $usernameOrEmail;
    public string $password;
}