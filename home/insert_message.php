<?php 
include 'functions.php';
$reciever=$_POST["reciever"];
$message=$_POST["content"];
$sql ='select * from badwords';
 $result=mysqli_query($connect,$sql) or die(mysqli_error($conncet));
 while($row=mysqli_fetch_assoc($result)){
     $message=preg_replace('/\b'.$row["bad_word"].'\b/i',str_repeat("*",strlen($row["bad_word"])),$message);
 }
 $sql ='INSERT INTO message(msg_sender,msg_reciever,msg_content,msg_date,msg_time,msg_read) VALUES ((SELECT ei_id FROM employee_info WHERE CONCAT(ei_name," ",ei_last_name)="'.$_SESSION["fullname"].'"),(SELECT ei_id FROM employee_info WHERE CONCAT(ei_name," ",ei_last_name)="'.$reciever.'"),"'.$message.'",DATE_FORMAT(NOW(),"%m/%d/%Y"),TIME_FORMAT(NOW(),"%h:%i %p"),0)';
 $result=mysqli_query($connect,$sql) or die(mysqli_error($conncet));
 if($result){
    $sql1='SELECT message.msg_id AS ID,CONCAT(employee_info.ei_name," ",employee_info.ei_last_name) AS Sender,count(message.msg_content) AS Message,message.msg_content,CONCAT(name2.ei_name," ",name2.ei_last_name) AS reciever,message.msg_date AS Date_Send,message.msg_time AS Time_Send,message.msg_read FROM message  INNER JOIN employee_info ON (employee_info.ei_id = message.msg_sender) INNER JOIN employee_info name2 ON (name2.ei_id = message.msg_reciever) WHERE ((CONCAT(employee_info.ei_name," ",employee_info.ei_last_name)="'.$_SESSION["fullname"].'" AND CONCAT(name2.ei_name," ",name2.ei_last_name)="'.$reciever.'") OR (CONCAT(name2.ei_name," ",name2.ei_last_name)="'.$_SESSION["fullname"].'" AND CONCAT(employee_info.ei_name," ",employee_info.ei_last_name)="'.$reciever.'" )) and msg_read=0 ORDER BY msg_id,msg_read desc limit 1';
    $result1=mysqli_query($connect,$sql1) or die(mysqli_error($connect));
        while($row1=mysqli_fetch_array($result1)){
            if($row1["msg_read"]==0 && $row1["Message"]>0){
                if($row1["Sender"]!=$_SESSION["fullname"] && $row["ei_status"]==1){
                    echo "<script>
                    var audio=new Audio('../sound/apple_pay.mp3');
                    audio.play();
                    </script>";
            }
        }
}
 }
     else{
         echo "prob";
     }
?>