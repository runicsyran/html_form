<?php

class AuthController {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: ../public/dashboard.php");
            exit();
        } else {
            return "Username or password is incorrect.";
        }
    }

    public function register($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);

        if ($stmt->execute()) {
            return "Registration successful.";
        } else {
            return "Registration failed.";
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: ../public/login.php");
        exit();
    }

    public function isLoggedIn() {
        session_start();
        return isset($_SESSION['user_id']);
    }
}