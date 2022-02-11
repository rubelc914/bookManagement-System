<?php
include_once '../layout/dashboard/header.php';
include_once '../layout/dashboard/sidebar.php';

if(isset($_POST['name'])){
    
$myfile = fopen("mytext.txt", "a+") or die("Unable to open file!");
$txt = $_POST;
$txt= implode(" ",$txt);
fwrite($myfile, "\n".$txt);
fclose($myfile);
}
?>

<html>
    <head>
        
    </head>
    <body>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="post"><br>
            <label for="fname">Add Text:</label>
            <input type="text" id="fname" name="name"><br><br>
            
<!--            <input type="submit" name="submit" value="Submit">-->
            <button type="submit">Add</button>
        </form>
    </body>
</html>
<!--create log file-->
<?php
//session_start();
$id= $_SESSION['user_id'];
$userName= $_SESSION['username'];
date_default_timezone_set("Asia/Dhaka");
$logTime = date('Y-m-d h:i:sa');
$logMsg = "log file created and userId= " .$id ."User Name= ".$userName;
  
myLog("* Start Log For Day : '" . $logTime . "'*");
myLog($logMsg);
myLog("* END Log For Day : '" . $logTime . "'*");
 
function myLog($logMsg)
{
    $logFileName = "log";
    if (!file_exists($logFileName)) 
    {
        // create directory folder 
        mkdir($logFileName, 0777, true);
    }
    $logFileData = $logFileName.'/log_' . date('d-M-Y') . '.log';
//    print_r($logFileData);exit;
    file_put_contents($logFileData, $logMsg . "\n", FILE_APPEND);
}


