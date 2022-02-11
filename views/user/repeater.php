<?php
require_once"../../classes/Database.php";
require_once"../../classes/DynamicField.php";
require_once"../../classes/Repeater.php";
$repeater = new Repeater();

$result = $repeater->allRepeater('*', 'dynamic_field');


$data;

foreach ($result as $key => $values) {

    $data = $values['data'];
    $data = json_decode($values['data'],true);
    echo "<pre>";
    print_r($data); exit;
}
   ?>


    <!doctype html>
    <html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script
                src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>

            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

            <title>book Management</title>
        </head>
        <body>
            <div class="container">
                <form method="post" action="" onsubmit="repeaterAjax()">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Department</th>
    <!--                            <th><a href="javascript:void(0)" class="btn btn-success addRow">+</a></th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                 $id = uniqid();
                                foreach ($data as $key => $value) {
                                  
                                  //  echo "id:" . $key . "fname: " . $value->fname . ",lname: " . $value->lname . ", Department: " . $value->dept . "<br>";
                             
                                 ?>
                            <tr>
                            <td>1</td>
                            <td><input type="text" name="info[<?= $id ?>][fname]" value="<?= $value->fname ?>" class="from-control"></td>
                            <td><input type="text" name="info[<?= $id ?>][lname]" value="<?= $value->lname ?>" class="from-control"></td>
                            <td><input type="text" name="info[<?= $id ?>][dept]" value="<?= $value->dept ?>" class="from-control"></td>
<!--                            <th><a href="javascript:void(0)" class="btn btn-danger deleteRow">-</a></th>-->
                            <th><a href="javascript:void(0)" class="btn btn-success addRow">+</a></th>
 
                        </tr>
                         <?php }?>
                    </tbody>

                </table>
                <button class="btn btn-success" type="submit" >Record Data</button>
            </form>
        </div>
        <script>
            var sl = 2;
            $('tbody').on('click', '.addRow', function () {
                var uniqid = Math.random().toString(16).slice(2);
                var tr = "<tr>" +
                        "<td> " + sl++ + " </td>" +
                        "<td><input type='text' name='info[" + uniqid + "][fname]' class='from-control'></td>" +
                        "<td><input type='text' name='info[" + uniqid + "][lname]' class='from-control'></td>" +
                        "<td><input type='text' name='info[" + uniqid + "][dept]' class='from-control'></td>" +
                        "<th><a href='javascript:void(0)' class='btn btn-danger deleteRow'>-</a></th>" +
                        "</tr>"

                $('tbody').append(tr);
            });
            $('tbody').on('click', '.deleteRow', function () {
                $(this).parent().parent().remove();
                sl -= 1;
            });
            function repeaterAjax() {
                event.preventDefault();
                console.log(event);
                var url = 'repeaterAjax.php';
                var data = $('form').serialize();
                $.post(url, data, (res) => {

                })
//                document.querySelectorAll('input').forEach((input) => {
//                  
//
//                });



//                savedata = JSON.stringify(savedata);
//               console.log(savedata);

//                $.ajax({
//                    type: "post",
//                    url: "repeaterAjax.php",
//                    data: {data},
//                    success: (res) => {
//
//                    }
//
//
//
//                });
//                $.post('repeaterAjax.php', savedata, function (response) {
//                    // Log the response to the console
//                    console.log("Response: " + response);
//                });
            }
        </script>
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