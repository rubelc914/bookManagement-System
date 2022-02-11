<?php
require_once '../../classes/Database.php';
require_once '../../classes/Books.php';
$book = new Books();

if(isset($_GET['book'])){
    $id= $_GET['id'];
    $book->deleteBook('books',$id);
    header('location:books.php');
}