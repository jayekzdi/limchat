<?php
include 'functions.php';
$pass=$_POST["password"];
$password=md5($pass);
$output='';
$sql='UPDATE employee_info SET ei_password="'.$password.'" where ei_id='.$_SESSION["user_id"].'';
$result=mysqli_query($connect,$sql) or die (mysqli_error($connect));
$output='<div class="alert alert-success">Successfully Change your Password</div>';
echo $output;
?>