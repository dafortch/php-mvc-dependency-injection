<?php

namespace App\Repositories;

interface UserRepository extends Repository
{
    public function findByUsername($username);

    public function findByEmail($email);

    public function findByUsernameOrEmail($username, $email);

    public function existsByUsername($username);

    public function existsByEmail($email);

    public function existsByUsernameOrEmail($username, $email);
}