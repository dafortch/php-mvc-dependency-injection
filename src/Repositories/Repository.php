<?php

namespace App\Repositories;

interface Repository
{
    public function findAll();

    public function findById($id);

    public function save($entity);

    public function delete($entity);
}