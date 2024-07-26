<?php

namespace App\Repositories\impl;

use App\Models\User;
use App\Repositories\UserRepository;
use DateTime;
use PDO;

class PDOUserRepository extends PDORepository implements UserRepository
{
    public function findAll()
    {
        $pdo = self::getConnection();
        $sql = 'SELECT * FROM users';

        $stmt = $pdo->query($sql);

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $users = [];

        foreach ($rows as $row)
        {
            $user = self::createUserFromRow($row);
            $users[] = $user;
        }

        return $users;
    }

    public function findById($id)
    {
        $pdo = self::getConnection();
        $sql = "SELECT * FROM users WHERE id = :id LIMIT 1";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $user = null;
        if ($row != null)
        {
            $user = self::createUserFromRow($row);
        }

        return $user;
    }

    public function findByUsername($username)
    {
        $pdo = self::getConnection();
        $sql = "SELECT * FROM users WHERE username = :id LIMIT 1";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $user = null;
        if ($row != null)
        {
            $user = self::createUserFromRow($row);
        }

        return $user;
    }

    public function findByEmail($email)
    {
        $pdo = self::getConnection();
        $sql = "SELECT * FROM users WHERE id = :email LIMIT 1";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $user = null;
        if ($row != null)
        {
            $user = self::createUserFromRow($row);
        }

        return $user;
    }

    public function findByUsernameOrEmail($username, $email)
    {
        $pdo = self::getConnection();
        $sql = "SELECT * FROM users WHERE username = :username OR email = :email LIMIT 1";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username, 'email' => $email]);
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $user = null;
        if ($row != null)
        {
            $user = self::createUserFromRow($row);
        }

        return $user;
    }

    public function existsByUsername($username)
    {
        $pdo = self::getConnection();
        $sql = "SELECT COUNT(*) FROM users WHERE username = :username";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        
        return $stmt->fetchColumn() > 0;
    }

    public function existsByEmail($email)
    {
        $pdo = self::getConnection();
        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        
        return $stmt->fetchColumn() > 0;
    }

    public function existsByUsernameOrEmail($username, $email)
    {
        $pdo = self::getConnection();
        $sql = "SELECT COUNT(*) FROM users WHERE username = :username OR email = :email";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username, 'email' => $email]);
        
        return $stmt->fetchColumn() > 0;
    }

    public function save($entity)
    {
        $pdo = self::getConnection();

        if (isset($entity->id)) {
            // Update existing record
            $sql = "UPDATE users SET username = :username, email = :email, hash = :hash;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'username' => $entity->username,
                'email' => $entity->email,
                'hash' => $entity->hash,
                'id' => $entity->id
            ]);
        } else {
            // Insert new record
            $sql = "INSERT INTO users (username, email, hash) VALUES (:username, :email, :hash)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'username' => $entity->username,
                'email' => $entity->email,
                'hash' => $entity->hash
            ]);
            $entity->id = $pdo->lastInsertId();
        }

        return $this->findById($entity->id);
    }

    public function delete($entity)
    {
        $pdo = self::getConnection();
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $entity->id]);
    }

    private static function createUserFromRow($row): User
    {
        $createdAt = new DateTime($row['created_at']);
        $updatedAt = new DateTime($row['updated_at']);

        $user = new User;
        $user->id = $row['id'];
        $user->username = $row['username'];
        $user->email = $row['email'];
        $user->hash = $row['hash'];
        $user->createdAt = $createdAt;
        $user->updatedAt = $updatedAt;

        return $user;
    }
}