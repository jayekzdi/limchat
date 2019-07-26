<?php
include 'functions.php';
if(isset($_POST["id"])){
$id=$_POST["id"];
$output='';
$sql='Update announcements set ann_status=0 where ann_id='.$id.'';
$result=mysqli_query($connect,$sql) or die (mysqli_error($connect));
echo '<div class="alert alert-success">Your Post has been Removed</div>';
}
?>