<?php
include 'functions.php';
$searched=$_POST["search"];
$output1='';
$groupname="Select group_name from groupchat";
        $result=mysqli_query($connect,$groupname);
        while($row=mysqli_fetch_assoc($result)){
        $row["group_name"]=strtolower(str_replace(" ","_",$row["group_name"]));
        $sql1 = 'SELECT groupchat.group_name as GC,employee_info.ei_username FROM '.$row["group_name"].' INNER JOIN employee_info ON('.$row["group_name"].'.group_username = employee_info.ei_id) INNER JOIN groupchat ON(groupchat.group_id = '.$row["group_name"].'.group_name) where employee_info.ei_username="'.$_SESSION["username"].'" and groupchat.group_name like "%'.$searched.'%"';
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
?>