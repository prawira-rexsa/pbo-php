<?php
require_once '/models/role_model.php';

class RoleController {
    private $model;

    public function __construct() {
        $this->model = new modelRole();
    }

    public function addRole($role_name, $role_desc, $role_status) {
        $this->model->addRole($role_name, $role_desc, $role_status);
        header('Location: ../index.php?action=view');
        exit();
    }

    public function updateRole($role_id, $role_name, $role_desc, $role_status) {
        if ($this->model->updateRole($role_id, $role_name, $role_desc, $role_status)) {
            header('Location: ../index.php?action=view');
            exit();
        }
        return;
    }

    public function deleteRole($role_id) {
        if ($this->model->deleteRole($role_id)) {
            header('Location: ../index.php?action=view');
            exit();
        }
        return;
    }

    public function getAllRoles() {
        return $this->model->getAllRoles();
    }

    public function getRoleById($role_id) {
        return $this->model->getRoleById($role_id);
    }

    public function getRoleByName($role_name) {
        return $this->model->getRoleByName($role_name);
    }
}
?>