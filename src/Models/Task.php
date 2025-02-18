<?php

namespace App\Models;

class Task
{
    private $db;

    public function __construct ($db) {
        $this->db = $db;
    }

    public function findAllByUser() {
        $stmt = $this->db->query('SELECT * FROM tasks WHERE user_id = ' . $_SESSION['user']['id']);
        return $stmt->fetchAll();
    }

    public function create($title, $description) {
        $query = $this->db->prepare('INSERT INTO tasks (title, description, user_id, created_at) VALUES (:title, :description, :user_id, NOW())');
        $query->bindParam(':title', $title);
        $query->bindParam(':description', $description);
        $query->bindParam(':user_id', $_SESSION['user']['id']);
        $query->execute();
    }
}
