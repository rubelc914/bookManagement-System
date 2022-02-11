<?php
include_once '../layout/dashboard/header.php';
include_once '../layout/dashboard/sidebar.php';


require_once '../../classes/Database.php';
require_once '../../classes/Books.php';
$db = new Database();
//$books = new Books();
//$allbooks = $books->allBooks();
$limit = 3;
if (isset($_GET['page'])) {
    $page_number = $_GET['page'];
} else {
    $page_number = 1;
}
$offset = ($page_number - 1) * $limit;
//$sql = "SELECT * FROM books LIMIT $limit OFFSET $offset";
//$sql = "select books.*,category.name as cat_name from books INNER JOIN category on category.id = books.cat_id";
$book = new Books();
$result = $book->allBooks('*', 'books', $limit, $offset);
//print_r(mysqli_fetch_assoc($result));
//exit;
?>
<div class="row">

    <div class="search">

        <form action="search.php" method="post">
            Search: <input type="text" name="search" required>
            <input type ="submit">
        </form>

    </div>
    <div class="add-books">
        <form method="get" action="add.php">
            <button type="submit" name>+ Add Book</button>
        </form>
    </div>
    <div class="mytable">
        <h3>All Books</h3>
        <a href="print.php" class="btn btn-primary btn-sm text-right" role="button" aria-pressed="true">
            <i class="fas fa-print"></i> Print</a>
        <a href="pdfdownload.php" class="btn btn-primary btn-sm text-right" role="button" aria-pressed="true">
            <i class="fas fa-print"></i> PDF View</a>
        <table>
            <tr>
                <th>Name</th>
                <th>Author Name</th>
                <th>publication date</th>
<!--                <th>Category</th>-->
                <th calspan="1">Action</th>


            </tr>
<?php while ($rows = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $rows['name'] ?></td>
                    <td><?= $rows['author'] ?></td>
                    <td><?= $rows['publication_date'] ?></td>


                    <td>
                        <a href="edit-books.php?id=<?= $rows['id'] ?>">Edit</a> ||
                        <a href="delete.php?id=<?= $rows['id'] ?>&book=book"onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>|| 
                        <!-- Button trigger modal -->
                        <button type="button" value="<?= $rows['id'] ?>" onclick="myfun(this)" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Details
                        </button>

                    </td>

                </tr>
<?php } ?>
            <tr>
        </table>
        <!-- start Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Book Information</h5>
                        <button type="button" id="Close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    <div id="printModal">

                        <div class="modal-body" >
                            <table class="table">
                                <thead>

                                </thead>
                                <tbody id="book_modal_detail">
                                    <tr>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer"id="PrintClose">
                        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="#"  class="btn btn-primary btn-sm" role="button" onclick="modalPrint()" 
                           aria-pressed="true"><i class="fas fa-print"></i> Print</a>

                    </div>
                </div>
            </div>
        </div>



        <!--start paginations-->
<?php
$query2 = "SELECT * FROM books";
$result2 = mysqli_query($db->link, $query2) or die("Failed");
if (mysqli_num_rows($result2)) {
    $total_records = mysqli_num_rows($result2);

    $total_page = ceil($total_records / $limit);
//        echo $total_page;
    echo'<div class="pagination">';
    if ($page_number > 1) {
        ?>
                <a href="books.php?page=<?= $page_number - 1 ?>">&laquo;</a>
            <?php
            }

            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $page_number) {
                    $active = "active";
                } else {
                    $active = "";
                }
                ?>
                <a class="<?= $active ?>"href="books.php?page=<?= $i ?>"><?= $i ?></a>
                <?php
            }
        }
        if ($total_page > $page_number) {
            ?>
            <a href="books.php?page=<?= $page_number + 1 ?>">&raquo;</a>
        <?php }
        ?>


    </div>
    <!--end paginations-->

</div>
</div>


<!--modal script-->
<script>
    function modalPrint() {
        console.log("clicked");
        document.getElementById("Close").style.display="none";
        document.getElementById("PrintClose").style.display="none";
        window.print();
        location.reload();
    }
    


</script>
<script>
    var modal = document.getElementsByClassName("modal fade")[0];
    function myfun(element) {
        console.log(element.value);
        var url = "booksAjax.php?id=" + element.value;
        console.log(url);
        var xmlhttp = new XMLHttpRequest();
        document.getElementById("book_modal_detail").innerHTML = '';
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("book_modal_detail").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", url, true);
        xmlhttp.send();

    }
</script>

