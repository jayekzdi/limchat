<?php
session_start();
$result=mysqli_query($connect,$sql);
unset($_SESSION["admin"]);
header("location:../");
?>