<?php

namespace App\Models;

use DateTime;

class User {
    public int $id;
    public string $username;
    public string $email;
    public string $hash;
    public DateTime $createdAt;
    public DateTime $updatedAt;
}