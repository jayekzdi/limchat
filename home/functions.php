<?php 
include '../db.php'; // database connection 
session_start();
// Function for Loading Active Users

function load_active($connect){
    $output='';
    $sql= 'SELECT ei_name as FName,ei_last_name as LName,ei_status,ei_image from employee_info  where ei_active=1 and ei_user_type=2 and concat(ei_name," ",ei_last_name) <>"'.$_SESSION["fullname"].'"';
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
}
    function chat_active($connect){
        $sql='select ei_status as active from employee_info where concat(ei_name," ",ei_last_name)="'.$_SESSION["receiver_user"].'"';
        $result=mysqli_query($connect,$sql);
        while($row=mysqli_fetch_assoc($result)){
            if($row['active']==1){
                echo '<div class="status"></div>';
        }
        elseif($row['active']==3){
            echo '<div class="status" style="background-color:rgb(73, 73, 73);"></div>';
    }
}
    }

    function groupchat($connect){
        
        $output1='';
        $output1.='<div class="row">
        <span class="btn btn-default btn-md pull-right" id="create_gc">
        <i class="fas fa-user-plus"></i>Create Groupchat
        </span>
        </div>
            <div id="gc_container">';        
        $groupname="Select group_name from groupchat";
        $result=mysqli_query($connect,$groupname);
        while($row=mysqli_fetch_assoc($result)){
        $row["group_name"]=strtolower(str_replace(" ","_",$row["group_name"]));
        $sql1 = 'SELECT groupchat.group_name as GC,employee_info.ei_username FROM '.$row["group_name"].' INNER JOIN employee_info ON('.$row["group_name"].'.group_username = employee_info.ei_id) INNER JOIN groupchat ON(groupchat.group_id = '.$row["group_name"].'.group_name) where employee_info.ei_username="'.$_SESSION["username"].'"';
         $result1=mysqli_query($connect,$sql1) or die(mysqli_error($connect));
        while($row1=mysqli_fetch_array($result1)){
        $username=$row1["ei_username"];
        if($username==$_SESSION["username"]){
       $output1.= '<div class="inbox-group" data-target="'.$row1["GC"].'">
       <div class="inbox-user fas fa-user-circle user-pic"></div>
                   <strong data-target="'.$row1["GC"].'">'.$row1["GC"].'</strong>
             </div>
   </div>';
   $sql_read='SELECT message_group.msg_id AS ID,message_group.msg_sender,CONCAT(employee_info.ei_name," ",employee_info.ei_last_name) AS Sender,message_group.msg_content AS Message,groupchat.group_name AS Group_Name,message_group.msg_date AS Date_Send,message_group.msg_time AS Time_Send,msg_read FROM message_group INNER JOIN employee_info ON (employee_info.ei_id = message_group.msg_sender) INNER JOIN groupchat ON (groupchat.group_id = message_group.msg_groupchat) WHERE (groupchat.group_name="'.$row1["GC"].'") ORDER BY msg_id ASC';    
     $read_result=mysqli_query($connect,$sql_read) or die(mysqli_error($connect));
     while($row2=mysqli_fetch_assoc($read_result)){
        if($row2["msg_read"]==0 && $row2["Message"]>0){
            if($row2["Sender"]!=$_SESSION["fullname"]){
            $output1.='<div class="badge">'.$row1["Message"].'</div>';
            $output1.= '<title> New Message ('.$row1["Message"].')</title>';
            $output1.= '
        <audio autoplay>
        <source src="../sound/apple_pay.mp3" type="audio/mpeg">
        </audio>';
            }else{}
        }else{}
        $output1.='</div>';        
        }
    
    }
}
        }
        $output1.='</div>';
        echo $output1;
    }
    
 ?>