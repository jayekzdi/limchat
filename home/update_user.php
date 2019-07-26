<?php
include 'functions.php';
$image_name=$_POST["file_name"];
$fullname=$_POST["fullname"];
$lastname=$_POST["lastname"];
$username=$_POST["username"];
$gender=$_POST["gender"];
$birthday=$_POST["birthday"];
$address=$_POST["address"];
$department=$_POST["department"];
$output='';
$sql='UPDATE employee_info SET ei_name ="'.$fullname.'",ei_last_name ="'.$lastname.'",ei_username ="'.$username.'",ei_gender ='.$gender.',ei_birthday ="'.$birthday.'",ei_dept ='.$department.',ei_address ="'.$address.'",ei_image="'.$image_name.'" where ei_id='.$_SESSION["user_id"].'';
$result=mysqli_query($connect,$sql) or die (mysqli_error($connect));
$output='<div class="alert alert-success">Successfully Updated</div>';
echo $output;

?>