<?php

namespace App\Controllers;

use App\Services\AccountService;

class AccountController
{

    private AccountService $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function profile()
    {
        $this->accountService->profileView();
    }
}