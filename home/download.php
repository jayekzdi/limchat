<?php
include 'functions.php';
$sql='insert into activity_log (log_fullname,log_activity,log_date,log_time) values((select ei_id from employee_info where CONCAT(ei_name," ",ei_last_name)="'.$_SESSION["fullname"].'"),"Download the File",DATE_FORMAT(NOW(),"%m/%d/%Y"),TIME_FORMAT(NOW(),"%h:%i %p"))';
    $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
if(isset($_GET["filename"])){
$name=$_GET["filename"];
$file='../uploads/'.$name;
if(file_exists($file)){
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }
}
else{
    echo 'File not Found';
}

}
?>