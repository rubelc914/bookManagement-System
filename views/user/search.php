<?php
include_once '../layout/dashboard/header.php';
include_once '../layout/dashboard/sidebar.php';
require_once '../../classes/Database.php';
require_once '../../classes/Books.php';
require_once '../../classes/Category.php';
$db = new Database();
//$con = $db->link;
$search = $_POST["search"];
//print_r($search);
//exit;

if ($db->link->connect_error) {
    echo 'Connection Faild: ' . $db->link->connect_error;
} else {
//    $sql = "SELECT * FROM books where name like '%$search%'";
    $sql = "SELECT * FROM books WHERE CONCAT(name,author,publication_date) LIKE '%$search%'";
    $res =$db->link->query($sql);
    ?><table>
        <tr>
            <th>Name</th>
            <th>Author Name</th>
            <th>publication date</th>
        </tr>
        <?php while ($rows = $res->fetch_assoc()) { ?>
            <tr>
                <td><?= $rows['name'] ?></td><br>
                <td><?= $rows['author'] ?></td>
                <td><?= $rows['publication_date'] ?></td>
    </tr>
    </table>
    <?php
    }
//    header('location: books.php');
}

include_once 'books.php';

?>