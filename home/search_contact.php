<?php
include 'functions.php';
$searched=$_POST["search"];
$output='';
    $sql= 'SELECT ei_name as FName,ei_last_name as LName,ei_status,ei_image from employee_info  where ei_active=1 and ei_user_type=2 and concat(ei_name," ",ei_last_name) <>"'.$_SESSION["fullname"].'" and concat(ei_name," ",ei_last_name) like "%'.$searched.'%"';
    $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
    $user=[];
      while($row=mysqli_fetch_array($result)){
            if($row["ei_image"]==""){
        $output.='<div class="inbox" data-target="'.$row["FName"].' '.$row["LName"].'">
        <div class="inbox-user fas fa-user-circle user-pic"></div>
                    <strong data-target="'.$row["FName"].' '.$row["LName"].'">'.$row["FName"].' '.$row["LName"].'</strong>';
            }else{
                $output.='<div class="inbox" data-target="'.$row["FName"].' '.$row["LName"].'">
                <div class="inbox-user  user-pic">
                    <img src="../img/'.$row["ei_image"].'" style="width:4vw; border-radius:50px;">
                </div>
                <strong data-target="'.$row["FName"].' '.$row["LName"].'">'.$row["FName"].' '.$row["LName"].'</strong>';
            }
        $sql1='SELECT message.msg_id AS ID,CONCAT(employee_info.ei_name," ",employee_info.ei_last_name) AS Sender,count(message.msg_content) AS Message,message.msg_content,CONCAT(name2.ei_name," ",name2.ei_last_name) AS reciever,message.msg_date AS Date_Send,message.msg_time AS Time_Send,message.msg_read FROM message  INNER JOIN employee_info ON (employee_info.ei_id = message.msg_sender) INNER JOIN employee_info name2 ON (name2.ei_id = message.msg_reciever) WHERE ((CONCAT(employee_info.ei_name," ",employee_info.ei_last_name)="'.$_SESSION["fullname"].'" AND CONCAT(name2.ei_name," ",name2.ei_last_name)="'.$row["FName"].' '.$row["LName"].'") OR (CONCAT(name2.ei_name," ",name2.ei_last_name)="'.$_SESSION["fullname"].'" AND CONCAT(employee_info.ei_name," ",employee_info.ei_last_name)="'.$row["FName"].' '.$row["LName"].'" )) and msg_read=0 ORDER BY msg_id,msg_read desc limit 1';
        $result1=mysqli_query($connect,$sql1) or die(mysqli_error($connect));
        while($row1=mysqli_fetch_array($result1)){
            if($row1["msg_read"]==0 && $row1["Message"]>0){
                if($row1["Sender"]!=$_SESSION["fullname"]){
                $output.='<div class="badge">'.$row1["Message"].'</div>';
                $output.= '<title> New Message ('.$row1["Message"].')</title>';
                $output.= '
            <audio autoplay>
            <source src="../sound/apple_pay.mp3" type="audio/mpeg">
            </audio>';
                }else{
                    if($row["ei_status"]==3){
                    $output.='<div class="offline-status"></div>';
                   
                    }elseif($row["ei_status"]==1){
                        $output.='<div class="online-status"></div>';
                       
                        }
                }
            }else{
                if($row["ei_status"]==3){
                    $output.='<div class="offline-status"></div>';
                   
                    }elseif($row["ei_status"]==1){
                        $output.='<div class="online-status"></div>';
                       
                        }
            }
           
            $output.='</div>';        
           }
        
      }
    echo $output;
?>