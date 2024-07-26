<?php

function getFlashMessages($type)
{
    if (isset($_SESSION['flash_messages'])) return $_SESSION['flash_messages'][$type] ?? [];
    else return [];
}

function addFlashMessage($type, $message)
{
    if (!isset($_SESSION['flash_messages'])) $_SESSION['flash_messages'] = [];

    $_SESSION['flash_messages'][$type][] = $message;
}

function clearFlashMessages()
{
    if (isset($_SESSION['flash_messages'])) unset($_SESSION['flash_messages']);
}