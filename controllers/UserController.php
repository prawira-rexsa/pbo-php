<?php
require_once '/models/user_model.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new userModel();
    }

    public function addUser($username, $addressUser, $jabatanUser) {
        $this->model->addUsers($username, $addressUser, $jabatanUser);
        header('Location: ../index.php?action=view_users');
        exit();
    }

    public function updateUser($user_id, $username, $addressUser, $jabatanUser) {
        if ($this->model->updateUser($user_id, $username, $addressUser, $jabatanUser)) {
            header('Location: ../index.php?action=view_users');
            exit();
        }
        return "User with ID '$user_id' not found.";
    }

    public function deleteUser($user_id) {
        if ($this->model->deleteUser($user_id)) {
            header('Location: ../index.php?action=view_users');
            exit();
        }
        return "User with ID '$user_id' not found.";
    }

    public function getAllUsers() {
        return $this->model->getAllUser();
    }

    public function getUserById($user_id) {
        return $this->model->getUserById($user_id);
    }

    public function getUserByName($username) {
        return $this->model->getUserByName($username);
    }
}
?>