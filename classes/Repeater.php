<?php
require_once 'Database.php';

class Repeater extends Database {
    
   
    public function allRepeater($col, $table){
        $result= $this->select($col, $table) ;
        return $result;
    }
}
