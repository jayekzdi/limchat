<?php
include 'functions.php';
if(isset($_POST['loadcontent'])){
    if($_POST["loadcontent"]=='active'){
        echo load_active($connect);
    }
    if($_POST["loadcontent"]=='groupchat'){
        echo groupchat($connect);
    }
}

?>