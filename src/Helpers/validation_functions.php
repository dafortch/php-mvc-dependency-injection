<?php

function setValidationErrors($form, $errors)
{
    if (!isset($_SESSION['validation_errors'])) $_SESSION['validation_errors'] = []; 

    $_SESSION['validation_errors'][$form] = $errors;
}

function clearValidationErrors()
{
    if (isset($_SESSION['validation_errors'])) unset($_SESSION['validation_errors']);
}