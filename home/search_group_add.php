<?php 
include 'functions.php';
    $search=$_POST["search"];
  $groupchat=strtolower(str_replace(" ","_",$_POST["chatname"]));
  if($search==""){ 
  }else{
    $sql1='SELECT CONCAT(ei_name," ",ei_last_name) as Member FROM employee_info  WHERE ei_id NOT IN(SELECT group_username FROM '.$groupchat.') AND CONCAT(ei_name," ",ei_last_name) like "%'.$search.'%" and ei_active=1 AND ei_user_type=2';
    $result1=mysqli_query($connect,$sql1) or die(mysqli_error($connect));
    while($row1=mysqli_fetch_array($result1)){
	  echo '<a href="#" data-target="'.$row1["Member"].'" class=" users">
        <p>'.$row1["Member"].'</p></a>';
    }
}
?>