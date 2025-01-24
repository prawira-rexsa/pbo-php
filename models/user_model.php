<?php  
require_once '/../domain_objek/node_user.php';

    class userModel{
        private $users;
        private $nextId = 1;

        public function __construct(){
            if(isset($_SESSION['users'])){
                $this->users = unserialize($_SESSION['users']);
                $this->nextId = count($this->users) + 1;
            }else {
                $this->initializeDefaultUser();
            }
        }

        public function initializeDefaultUser() {
            $this->addUsers("Khusnul Siti", "Jl Bulak Banteng Surabaya", "Admin");
            $this->addUsers("Dimas Prawiraharja", "Jl Surabaya", "Teknisi");
            $this->addUsers("Ahmad", "Jl Kapas Madya", "Kurir");
        }

        public function addUsers($username, $addressUser, $jabatanUser) {
            $peranUser = new User($this->nextId++, $username, $addressUser, $jabatanUser);
            $this->users[] = $peranUser;
            $this->saveToSession();
        }

        private function saveToSession() {
            $_SESSION['users'] = serialize($this->users);
        }

        public function getAllUser(){
            return $this->users;
        }

        public function getUserById($user_id){
            foreach($this->users as $user){
                if($user->user_id == $user_id){
                    return $user;
                }
            }
            return null;
        }

        public function updateUser($user_id, $username, $addressUser, $jabatanUser){
            foreach($this->users as $user){
                if($user->user_id == $user_id){
                    $user->username = $username;
                    $user->addressUser = $addressUser;
                    $user->jabatanUser = $jabatanUser;
                    $this->saveToSession();
                    return true;
                }
            }
            return false;
        }

        public function deleteUser($user_id) {
            foreach ($this->users as $key => $user) {
                if ($user->user_id == $user_id) {
                    unset($this->users[$key]);
                    $this->users = array_values($this->users);
                    $this->saveToSession();
                    return true;
                }
            }
            return false;
        }
    
        public function getUserByName($username) {
            foreach ($this->users as $user) {
                if ($user->username == $username) {
                    return $user;
                }
            }
            return null;
        }

    }

?>