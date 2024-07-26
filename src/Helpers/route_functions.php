<?php

function route(string $routeParam): string
{
    return "index.php?route=$routeParam";
}

function redirectTo(string $route)
{
    header("Location: " . route($route));
}

function isLoggedIn(): bool
{
    return isset($_SESSION['user']);
}