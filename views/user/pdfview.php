<?php
require_once '../../classes/Database.php';
require_once '../../classes/Books.php';


$list = new Books();
$booklist = $list->printBookList('*', 'books');
?>




<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>all books</title>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                border-color: #96D4D4;
                padding: 15px;
                border-spacing: 30px;
            }
            th, td {
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #D6EEEE;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-4 ">
                    <center><h2>All Book List</h2></center> 
                    <br /> 
                    <b style="color:blue;">Date:</b>
                    <?php
                    $date = date("d-m-Y", strtotime("+6 HOURS"));
                    echo $date;
                    ?>
                    <table style="width:100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Author</th>
                                <th>publication date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($rows = mysqli_fetch_assoc($booklist)) { ?>
                                <tr>
                                    <td style="text-align:center;"><?= $rows['name'] ?></td>
                                    <td style="text-align:center;"><?= $rows['author'] ?></td>
                                    <td style="text-align:center;"><?= $rows['publication_date'] ?></td>
                                </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>




        <!-- Optional JavaScript; choose one of the two! -->
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        -->
    </body>
</html>
