<?php

 class User{

     public $email;
     public $password;

     public function __construct($email, $password, $role){
         $this->email = $email;
         $this->password = $password;
         $this->role = $role;
     }

     public function get_email() {
        return $this->email;
     } 
     public function get_password() {
        return $this->password;
     }

     public function get_role() {
        return $this->role;
     }

 }
?>