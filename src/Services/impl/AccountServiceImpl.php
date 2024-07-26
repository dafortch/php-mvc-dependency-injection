<?php

namespace App\Services\impl;

use App\Services\AccountService;

class AccountServiceImpl implements AccountService
{
    public function profileView()
    {
        require_once 'views/account.php';
    }
}