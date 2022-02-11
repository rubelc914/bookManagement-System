<?php

require_once '../../classes/Database.php';
$db = new Database();
$id = $_GET['id'];

$sql = "select books.*,category.name as category from books INNER JOIN category on category.id = books.cat_id WHERE books.id = $id";
$books = $db->link->query($sql);
$string = '';
foreach ($books as $key => $book) {
    foreach ($book as $key => $value) {
        if ($key == 'cat_id' || $key == 'id') {
            continue;
        }

        $string .= '<tr>
                                <td>' . ucfirst($key) . '</td>
                                <td>' . $value . '</td>
                              </tr>';
    }
}
echo $string;


