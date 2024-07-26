<?php

namespace App;

use App\Controllers\AccountController;
use App\Controllers\AuthController;
use App\Controllers\MainController;
use App\Repositories\impl\PDOUserRepository;
use App\Repositories\UserRepository;
use App\Services\AccountService;
use App\Services\AuthService;
use App\Services\impl\AccountServiceImpl;
use App\Services\impl\AuthServiceImpl;
use InvalidArgumentException;

class DependencyContainer
{
    private static array $instances = [];

    public static function initializeDependencies()
    {
        // Initialize Repositories
        static::$instances[UserRepository::class] = new PDOUserRepository();

        // Initialize Services
        static::$instances[AuthService::class] = new AuthServiceImpl(static::$instances[UserRepository::class]);
        static::$instances[AccountService::class] = new AccountServiceImpl();

        // Initialize Controllers
        static::$instances[MainController::class] = new MainController();
        static::$instances[AuthController::class] = new AuthController(static::$instances[AuthService::class]);
        static::$instances[AccountController::class] = new AccountController(static::$instances[AccountService::class]);
    }

    public static function get(string $class)
    {
        if (array_key_exists($class, static::$instances)) {
            return static::$instances[$class];
        }

        throw new InvalidArgumentException("No instance found for class {$class}");
    }
}