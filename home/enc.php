<?php
    $password=$_POST["old_pass"];
    $enc=md5($password);
    echo $enc;
?>