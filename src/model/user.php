<?php

class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserByEmail($email)
    {
        $query = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute(['email' => $email]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
