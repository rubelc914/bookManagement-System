<?php

class Category extends Database {

    public function addCategory($table,$post) {

//        print_r($data);
//        exit;
//        $name = $data['name'];
//        $status = $data['status'];
//
//        $sql = "INSERT INTO `category`( `name`, `status`) VALUES ('$name','$status')";

//        $result = mysqli_query($this->link, $sql);
         $result = $this->insert($table,$post);
        if ($result) {
            $insertMsg = "Category save successfull";
            return $insertMsg;
        } else {
            $insertMsg = "Category not save";
            return $insertMsg;
        }
    }

    public function allCategory($col,$table) {
//        $result = mysqli_query($this->link, "SELECT * FROM `category` ");
        $result= $this->select($col, $table);
        return $result;
    }

}


