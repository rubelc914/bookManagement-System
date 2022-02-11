<?php

class Database {

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "assignment_db";
    public $link;

    public function __construct() {

        $this->link = mysqli_connect("$this->host", "$this->user", "$this->password", "$this->dbname");
    }
    
    
    
    public function edit($col,$table,$id) {
        $sql="SELECT ".$col. " FROM ".$table." WHERE id=". $id;
//        echo $sql;        exit();
        $result = $this->link->query($sql)->fetch_assoc();
        if ($result) {
            return $result;
        }
        return $this->link->error;
        
        
    }
    
    
   public function insert($table, $post) {
        $key = $val = '';

        $keys = array_keys($post);
        $vals = array_values($post);

        if (!empty($keys)) {
            foreach ($keys as $ik => $vK) {
                $com = sizeof($keys) - 1 != $ik ? "," : "";
                $key .= "`" . $vK . "`" . $com;
//                print_r($key); exit;
            }
        }
        if (!empty($vals)) {
            foreach ($vals as $iV => $vV) {
                $com = sizeof($vals) - 1 != $iV ? "," : "";
                $val .= "'" . $vV . "'" . $com;
//                print_r($val); exit;
            }
        }

        $sql = "INSERT INTO `" . $table . "` (" . $key . ") VALUES (" . $val . ");";
//  echo $sql;        exit();
        
       
           $result = $this->link->query($sql);
           
        if ($result) {
            return $result;
        }
        return $this->link->error;
    }

      
    
    public function update($table,$id, $post) {
        $keyVal = '';
        $i = 0;
        foreach ($post as $keys => $value) {
            $com = sizeof($post) - 1 != $i ? "," : " ";
//           if($keys=='update'){
//               continue;
//           }
            $keyVal .= "`" . $keys . "` = '" . $value . "'" . $com;
            
            $i++;
           
        }
        
        $sql = "UPDATE `" . $table . "` SET " . $keyVal . " WHERE ID = " . $id;
//         echo $sql;        exit();

//        return $sql;

        $result = $this->link->query($sql);
        if ($result) {
            return $result;
        }
        return $this->link->error;
    }

        
    

    public function pagination($col, $table, int $limit, int $offset) {
//        echo $offset;        exit();
        $sql = "SELECT " . $col . " FROM " . $table . " LIMIT " . $limit . " OFFSET " . $offset;
//        echo $sql;        exit();
        $result = $this->link->query($sql);
        if ($result) {
            return $result;
        }
        return $this->link->error;
    }

    public function delete($table, $id) {
        $sql = "DELETE FROM " . $table . " WHERE id = " . $id;
//        echo $sql;        exit();
        $result = $this->link->query($sql);
        if ($result) {
            return $result;
        }
        return $this->link->error;
    }
    
    public function select($col,$table,$where="") {
        $sql= "SELECT ".$col . " FROM ".$table .$where;
//        echo $sql; exit;
        $result= $this->link->query($sql);
        if($result){
            return $result;
        }
        return $this->link->error;
    }
    
   
    

}


//$db=new Database();
//$result= $db->edit('*', 'books',27);
//
//print_r($result);
?>
