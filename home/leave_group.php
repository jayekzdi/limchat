<?php
include 'functions.php';
$db_name=strtolower(str_replace(" ","_",$_SESSION["group_chatname"]));
$sql=' delete from '.$db_name.' where group_username=(select ei_id from employee_info where concat(ei_name," ",ei_last_name)="'.$_SESSION["fullname"].'")';
$result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
$sql ='INSERT INTO message_group(msg_sender,msg_groupchat,msg_content,msg_date,msg_time) VALUES (1,(select group_id from groupchat where group_name="'.$_SESSION["group_chatname"].'"),"'.$_SESSION["fullname"].' left the group. ",DATE_FORMAT(NOW(),"%m/%d/%Y"),TIME_FORMAT(NOW(),"%h:%i %p"))';
        $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
?>