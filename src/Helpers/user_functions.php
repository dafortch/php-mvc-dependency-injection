<?php

use App\Models\User;

function setUser($user)
{
    $_SESSION['user'] = $user;
}

function unsetUser()
{
    if (isset($_SESSION['user'])) unset($_SESSION['user']);
}

function getUser(): User
{
    return $_SESSION['user'] ?? null;
}