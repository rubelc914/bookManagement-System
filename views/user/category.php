<?php

include_once '../layout/dashboard/header.php';
include_once '../layout/dashboard/sidebar.php';
require_once '../../classes/Database.php';
require_once '../../classes/Category.php';
$cats = new Category();
$allcats = $cats->allCategory('*','category');
?>



<div class="container">

    <div class="add-books">
        <form method="get" action="add-category.php">
            <button type="submit" name>+ Add Category</button>
        </form>
    </div>
    <table id="customers">
        
            <tr>
                <th>Name</th>
                <th>Status</th>
<?php while ($rows = mysqli_fetch_assoc($allcats)) { ?>
            </tr>
            <tr>
                <td><?= $rows['name']?></td>
                <td><?= $rows['status']== 1?'active':'inactive'?></td>

            </tr>
<?php }?>  

        </table>

    </div>
  