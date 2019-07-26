<?php
include 'functions.php';
if(isset($_POST["id"])){
$name=$_POST["id"];
$output='';
$sql='SELECT ann_title,ann_date,ann_announcement,concat(employee_info.ei_name," ",employee_info.ei_last_name) as creator from announcements inner join employee_info on (ei_id=ann_name) where ann_id='.$name.'';
$result=mysqli_query($connect,$sql);
while($row=mysqli_fetch_array($result)){
   $output=' <p class="lead">'.$row["ann_title"].'</p>
            <p>Posted by: '.$row["creator"].'</p>
        <p>Date Posted:'.$row["ann_date"].'</p>
        <h5>'.$row["ann_announcement"].'</h5>
        <hr>';

    }
    echo $output;
}

?>
  
  