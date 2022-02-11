<?php
require_once '../../classes/Database.php';
$db= new Database();
$alldata=(json_encode($_POST['info']));
print_r($alldata);
$result = $db->insert('dynamic_field',[
    'data'=>$alldata
]);
