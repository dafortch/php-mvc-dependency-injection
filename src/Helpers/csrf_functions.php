<?php

function generateCsrfToken()
{
    return bin2hex(random_bytes(32));
}

function saveCsrfTokenInSession()
{
    $_SESSION['csrf_token'] = generateCsrfToken();
}

function getCsrfToken()
{
    return $_SESSION['csrf_token'] ?? null;
}

function validateCsrfToken()
{
    if (empty($_POST['csrf_token']) || $_POST['csrf_token'] != $_SESSION['csrf_token'])
    {
        die('Invalid CSRF Token');
    }
    saveCsrfTokenInSession();
}
