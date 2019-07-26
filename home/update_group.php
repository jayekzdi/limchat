<?php
include 'functions.php';
    $group_id=$_POST["group_id"];
    $groupname_edit=$_POST["groupname_edit"];
    $renamed_groupname=strtolower(str_replace(" ","_",$groupname_edit));
    $db=strtolower(str_replace(" ","_",$_SESSION["group_chatname"]));
    $sql='update groupchat set group_name="'.$groupname_edit.'" where group_id='.$group_id.'';
          $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
          $sql ='INSERT INTO message_group(msg_sender,msg_groupchat,msg_content,msg_date,msg_time) VALUES (1,'.$group_id.',"'.$_SESSION["fullname"].' was changed to '.$groupname_edit.'",DATE_FORMAT(NOW(),"%m/%d/%Y"),TIME_FORMAT(NOW(),"%h:%i %p"))';
        $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
        $sql='RENAME TABLE '.$db.' TO '.$renamed_groupname.'';
        $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
        $output='';
        //$_POST["username"]=$groupname_edit;
    echo $output;
?>