<?php 
include 'functions.php';
// $reciever=$_POST["reciever"];
$message=$_POST["content"];
$sql ='select * from badwords';
 $result=mysqli_query($connect,$sql) or die(mysqli_error($conncet));
 while($row=mysqli_fetch_assoc($result)){
     $message=preg_replace('/\b'.$row["bad_word"].'\b/i',str_repeat("*",strlen($row["bad_word"])),$message);
 }
 $sql ='INSERT INTO message_group(msg_sender,msg_groupchat,msg_content,msg_date,msg_time,msg_read) VALUES ((SELECT ei_id FROM employee_info WHERE concat(ei_name," ",ei_last_name)="'.$_SESSION["fullname"].'"),(SELECT group_id FROM groupchat WHERE group_name="'.$_SESSION["group_chatname"].'"),"'.$message.'",DATE_FORMAT(NOW(),"%m/%d/%Y"),TIME_FORMAT(NOW(),"%h:%i %p"),0)';
 $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
 if($result){
     echo "1";
 }
     else{
         echo "prob";
     }
?>