<?php
include 'functions.php';
if(isset($_POST["group_name"])&& $_POST["group_name"]!=""){
  $group_name=$_POST["group_name"];
  $group_member=$_POST["group_member"];
  $db_name=strtolower(str_replace(" ","_",$group_name));
  $output='';
    $sql='insert into groupchat(group_name) values("'.$group_name.'")';
    $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
    $sql='create table '.$db_name.' (group_id INT(11) PRIMARY KEY AUTO_INCREMENT,group_username INT(11) NOT NULL,group_name INT(11) not null,group_admin int(11) not null)';
    $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
    foreach($group_member as $users=>$value){
        $sql='insert into '.$db_name.'(group_username,group_name,group_admin) values((select ei_id from employee_info where CONCAT(ei_name," ",ei_last_name)="'.$value.'"),(select group_id from groupchat where group_name="'.$group_name.'"),0)';
        $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
  }
  $sql='insert into '.$db_name.'(group_username,group_name,group_admin) values((select ei_id from employee_info where CONCAT(ei_name," ",ei_last_name)="'.$_SESSION["fullname"].'"),(select group_id from groupchat where group_name="'.$group_name.'"),1)';
        $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
  $output.='<div class="alert alert-success">Success: Groupchat Created</div>';
  echo $output;
}

?>