<?php 
require_once '/../domain_objek/node_role.php';

class modelRole
{
    private $roles = [];
    private $nextId = 1;

    public function __construct() {
        if (isset($_SESSION['roles'])) {
            $this->roles = unserialize($_SESSION['roles']);
            $this->nextId = count($this->roles) + 1;
        } else {
            $this->initializeDefaultRole();
        }
    }

    public function initializeDefaultRole() {
        $this->addRole("Owner", "Owner", 1);
        $this->addRole("Admin", "Admin", 1);
        $this->addRole("Kurir", "Kurir", 1);
        $this->addRole("Teknisi", "Teknisi", 1);
    }

    public function addRole($role_name, $role_desc, $role_status) {
        $peran = new Role($this->nextId++, $role_name, $role_desc, $role_status);
        $this->roles[] = $peran;
        $this->saveToSession();
    }

    private function saveToSession() {
        $_SESSION['roles'] = serialize($this->roles);
    }

    public function getAllRoles() {
        return $this->roles;
    }

    public function getRoleById($role_id) {
        foreach ($this->roles as $role) {
            if ($role->role_id == $role_id) {
                return $role;
            }
        }
        return null;
    }

    public function updateRole($role_id, $role_name, $role_desc, $role_status) {
        foreach ($this->roles as $role) {
            if ($role->role_id == $role_id) {
                $role->role_name = $role_name;
                $role->role_deskripsi = $role_desc;
                $role->role_status = $role_status;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function deleteRole($role_id) {
        foreach ($this->roles as $key => $role) {
            if ($role->role_id == $role_id) {
                unset($this->roles[$key]);
                $this->roles = array_values($this->roles);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function getRoleByName($role_name) {
        foreach ($this->roles as $role) {
            if ($role->role_name == $role_name) {
                return $role;
            }
        }
        return null;
    }
}
?>