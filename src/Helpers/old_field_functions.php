<?php

function getOldFields($form)
{
    if (isset($_SESSION['old_fields'])) return $_SESSION['old_fields'][$form] ?? [];
    else return [];
}

function getOldField($form, $field)
{
    if (!isset($_SESSION['old_fields'])) return null;
    if (!isset($_SESSION['old_fields'][$form])) return null;

    return $_SESSION['old_fields'][$form][$field] ?? null;
}

function setOldFields($form, $fields)
{
    if (!isset($_SESSION['old_fields'])) $_SESSION['old_fields'] = []; 

    $_SESSION['old_fields'][$form] = $fields;
}

function clearOldFields()
{
    if (isset($_SESSION['old_fields'])) unset($_SESSION['old_fields']);
}