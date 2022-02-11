<?php

require_once 'Database.php';
class Books extends Database{ 

    public function addBook($table,$post) {
     
        
//        print_r($data);
//        exit;
//        $name = $data['name'];
//        $author = $data['author'];
//        $publication_date = $data['publication_date'];
//        $cat_id = $data['cat_id'];
////         print_r($data);
////        exit;

       // $sql = "INSERT INTO `books`(`name`,`author`,`publication_date`,`cat_id`) VALUES ('$name','$author','$publication_date','$cat_id')";
//        $sql = "INSERT INTO `books`(`name`, `author`, `publication_date`) VALUES ('$name','$author','$publication_date')";

        $result = $this->insert($table,$post);
        if ($result) {
            $insertMsg = "book save successfully";
            return $insertMsg;
        } else {
            $insertMsg = "book not save";
            return $insertMsg;
        }
    }

    public function allBooks($col, $table,int $limit,int $offset) {
       $result= $this->pagination($col, $table,$limit,$offset);
        return $result;
    }

    public function deleteBook($table,$id) {
        $result= $this->delete($table, $id);
        return $result;
    }

    public function edit($col,$table,$id) {
        $result= parent::edit($col, $table, $id);
        return $result;
    }
    public function printBookList($col, $table){
        $result=$this->select($col, $table) ;
        return $result;
        
    }
    

    public function update($table,$id, $post) {
//        echo '<pre>';
//        print_r($data);
//        exit();
//        $name = $data['name'];
//        $author = $data['author'];
//        $publication_date = $data['publication_date'];
//        $id = $data['id'];

//        $sql = "UPDATE `books` SET `name`='$name',`author`='$author',`publication_date`='$publication_date' WHERE `id`='$id'";
//        $result = mysqli_query($this->link, $sql);
        $result= parent::update($table, $id, $post);
        return $result;
//        
//        if ($result) {
//            //    $mesg= "update successfully done";
//            //    return $mesg;
//            header('location:http://localhost:8080/bms/views/user/books.php');
//        } else {
//            echo "not updated";
//        }
    }

}

