<?php
 include 'functions.php';
    $members=$_POST["newmembers"];
$db_name=strtolower(str_replace(" ","_",$_SESSION["group_chatname"]));
 $sql='insert into '.$db_name.'(group_username,group_name,group_admin) values((select ei_id from employee_info where CONCAT(ei_name," ",ei_last_name)="'.$members.'"),(select group_id from groupchat where group_name="'.$_SESSION["group_chatname"].'"),0)';
 $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
 $sql ='INSERT INTO message_group(msg_sender,msg_groupchat,msg_content,msg_date,msg_time) VALUES (1,(select group_id from groupchat where group_name="'.$_SESSION["group_chatname"].'"),"'.$_SESSION["fullname"].' added '.$members.'",DATE_FORMAT(NOW(),"%m/%d/%Y"),TIME_FORMAT(NOW(),"%h:%i %p"))';
        $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
?>