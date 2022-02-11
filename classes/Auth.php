<?php
require_once 'Database.php';

class Auth extends Database  {
    
    public function login($col,$table,$where) {
        $user= $this->select($col, $table,$where);
        return $user;
        
    }
}
