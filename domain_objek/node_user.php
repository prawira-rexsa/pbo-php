<?php
    class User{
        public $user_id;
        public $username;
        public $addressUser;
        public $jabatanUser;

        public function __construct($user_id, $username, $addressUser, $jabatanUser){
            $this->user_id = $user_id;
            $this->username = $username;
            $this->addressUser = $addressUser;
            $this->jabatanUser = $jabatanUser;
        }
    }
?>