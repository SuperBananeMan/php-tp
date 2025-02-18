<?php

namespace App\Models;

use PDO;

class User
{
    private $db;

    public function __construct ($db) {
        $this->db = $db;
    }

    public function findByEmail($email) {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();
        if ($user) {
            return $user;
        }
        return null;
    }

    public function create($name, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = $this->db->prepare('INSERT INTO users (name, email, password, created_at) VALUES (:name, :email, :password, NOW())');
        $query->bindParam(':name', $name);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $hashedPassword);
        $query->execute();
    }
}
