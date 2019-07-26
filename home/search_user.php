<?php 
include 'functions.php';
$search=$_POST["search"];
$sql= 'SELECT ei_name as FName,ei_last_name as LName,ei_status,ei_image from employee_info  where concat(ei_name," ",ei_last_name) like "%'.$search.'%" and ei_active=1 and ei_user_type=2 and concat(ei_name," ",ei_last_name) <>"'.$_SESSION["fullname"].'" order by ei_last_name';
$result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
$output='';
$num=0;
    while($row=mysqli_fetch_assoc($result)){
      echo '<a href="#" data-target="'.$row["FName"].' '.$row["LName"].'" class=" users">
      <p>'.$row["FName"].' '.$row["LName"].'</p></a>';
  } 
?>