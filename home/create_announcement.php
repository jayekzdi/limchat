 <?php
  include "functions.php";
  if(isset($_POST["title_create"])||isset($_POST["announcement_create"])||isset($_POST["pinned_post"])){
    if($_POST["title_create"]!="" || $_POST["announcement_create"]!="" || $_POST["pinned_post"]!="")
    $title_create=$_POST["title_create"];
    $announcement_create=$_POST["announcement_create"];
    $pinned_post=$_POST["pinned_post"];
    $output='';
      $sql='insert into announcements(ann_title,ann_announcement,ann_date,ann_status,ann_pinned,ann_name) values("'.$title_create.'","'.$announcement_create.'",DATE_FORMAT(NOW(),"%m/%d/%Y"),1,"'.$pinned_post.'",(select ei_id from employee_info where concat(ei_name," ",ei_last_name)="'.$_SESSION["fullname"].'"))';
      $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
        $output.='<div class="alert alert-success">Announcement Posted</div>';
        echo $output;
    }
    else{

    }
 ?>