<?php
include_once '../layout/dashboard/header.php';
include_once '../layout/dashboard/sidebar.php';
require_once '../../classes/Database.php';
require_once '../../classes/Books.php';
require_once '../../classes/Category.php';
$cat = new Category();
if (isset($_POST['name'])){ 
//    print_r($_POST);
    $post = $_POST;
    $insertMsg = $cat->addCategory('category',$post);

//        print_r($_POST);
}
?>

<div class="row">


    <div class="inputfile">

        <form action="" method="post">
            <label for="fname">Category Name:</label>
            <input type="text" id="fname" name="name"><br><br>
          
                <p>Please select your Category Status:</p>
                  <input type="radio" id="html" name="status" value="1" checked>
                  <label for="html">Active</label><br>
                  <input type="radio" id="css" name="status" value="0">
                  <label for="css">Inactive</label><br>
                <br><br>
<!--                <input type="submit" name="submit" value="Submit">-->
                <button type="submit">Add</button>
                </form>
                </div>
                <?php if (isset($insertMsg)) { ?> 
                    <h5 class="text-center"><?= $insertMsg ?></h5>
                <?php } ?>
                </div>

                     