<?php
include '../db.php';
$record_per_page=3;
$page='';
$output='';
if(isset($_POST["page"])){
        $page=$_POST["page"];
}
else{
        $page=1;
}
$page_start=($page - 1)*$record_per_page; 
$sql='SELECT * from announcements where ann_status=1 and ann_pinned="low" order by ann_date desc limit '.$page_start.','.$record_per_page.'';
$result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
while($row=mysqli_fetch_array($result))
{       
                $output.='<div class="well well-sm">
                <div class="label label-default">Low</div>
                <h4><a class="link" id="'.$row["ann_id"].'" style="color:#777; cursor:pointer;">'.$row["ann_title"].'</a></h4>
                  <p>Date Posted:'.$row["ann_date"].'</p>
                  </div>';

}
$output .= '<div align="center">';
$page_sql="SELECT * from announcements where ann_status=1 and ann_pinned='low' order by ann_id desc";
$result=mysqli_query($connect,$page_sql) or die(mysqli_error($connect));
$total_records=mysqli_num_rows($result);
$total_page=ceil($total_records/$record_per_page);
for($i=1; $i<=$total_page; $i++)  
 {  
      $output .= "<span class='pagination_link_low' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
 }
 $output .= '</div>';
 echo $output;
?>