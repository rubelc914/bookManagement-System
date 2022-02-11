<?php
include_once '../layout/dashboard/header.php';
include_once '../layout/dashboard/sidebar.php';
require_once '../../classes/Database.php';
require_once '../../classes/Books.php';
if(isset($_GET['id'])){
    
$id = $_GET['id'];
$books = new Books();
$row = $books->edit('*','books',$id);
//$row = mysqli_fetch_assoc($result);
//print_r($row);
}

if(isset($_POST['name'])){
    $books = new Books();
    $post=$_POST;
    $id= $_POST['id'];
//    print_r($post);exit;
    $mesg=$books->update('books',$id,$post);
    if($mesg){
        header('location:http://localhost:8080/bms/views/user/books.php');
    }else{
        header('location:http://localhost:8080/bms/views/user/books.php?id='.$id);
    }
    

}  
?>



    <div class="row">
        <div class="inputfile">
            <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
                <input type="hidden" name="id" value="<?= $row['id']?>">
                <label for="fname">Book Name:</label>
                <input type="text" id="fname" name="name" value="<?= $row['name'] ?>"><br><br>
                <label for="lname">Author Name:</label>
                <input type="text" id="lname" name="author" value="<?= $row['author'] ?>"><br><br>
                <label for="lname">Publication date</label>
                <input type="date" id="lname" name="publication_date" value="<?= $row['publication_date'] ?>"><br><br>
<!--                <input type="submit" name="update" value="update">-->
                <button type="submit" >update</button>
            </form>
        </div>
        
         <?php
            if(isset($mesg)){ ?> 
              <h5 class="text-center"><?=$mesg?></h5>
           <?php }?>
        
    </div>

