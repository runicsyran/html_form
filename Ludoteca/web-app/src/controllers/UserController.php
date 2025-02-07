<?php
// filepath: /web-app/web-app/src/controllers/UserController.php

namespace App\Controllers;

use App\Models\User;

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function getUserById($id) {
        return $this->userModel->findById($id);
    }

    public function updateUser($id, $data) {
        return $this->userModel->update($id, $data);
    }

    public function deleteUser($id) {
        return $this->userModel->delete($id);
    }
}
?>