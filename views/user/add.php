<?php 
include_once '../layout/dashboard/header.php';
include_once '../layout/dashboard/sidebar.php';
require_once '../../classes/Database.php';
require_once '../../classes/Books.php';
require_once '../../classes/Category.php';
$books = new Books();
$cats=new Category();
$cats= $cats->allCategory('*','category');

if (isset($_POST['name'])) {
    $post=$_POST;
//    print_r($post);    exit();
    $insertMsg = $books->addBook('books',$post);
     if($insertMsg){
        header('location:http://localhost:8080/bms/views/user/books.php');
    }
}
?>

<div class="row">


    <div class="inputfile">

        <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
            <label for="fname">Book Name:</label>
            <input type="text" id="fname" name="name"><br><br>
            <label for="lname">Author Name:</label>
            <input type="text" id="lname" name="author"><br><br>
            <label for="lname">Publication date</label>
            <input type="date" id="lname" name="publication_date"><br><br>
            <label for="cars">Choose a Category:</label>
            <select name="cat_id" id="cars">
                <option selected>Select Category</option>
                     <?php while($row=mysqli_fetch_assoc($cats)){?>
                      <option value="<?= $row['id']?>"><?= $row['name']?></option>
                      <?php }?>
            </select><br><br>  
<!--            <input type="submit" name="submit" value="Submit">-->
            <button type="submit">Add</button>
        </form>
    </div>
    <?php if (isset($insertMsg)) { ?> 
        <h5 class="text-center"><?= $insertMsg ?></h5>
    <?php } ?>
</div>

     
