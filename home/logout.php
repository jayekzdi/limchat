<?php
include 'functions.php';
$sql='insert into activity_log (log_fullname,log_activity,log_date,log_time) values((select ei_id from employee_info where CONCAT(ei_name," ",ei_last_name)="'.$_SESSION["fullname"].'"),"Logged Out",DATE_FORMAT(NOW(),"%m/%d/%Y"),TIME_FORMAT(NOW(),"%h:%i %p"))';
    $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
$sql='update employee_info set ei_status=3 where concat(ei_name," ",ei_last_name)="'.$_SESSION["fullname"].'"';
$result=mysqli_query($connect,$sql);
unset($_SESSION["fullname"]);
header("location:../");
?>