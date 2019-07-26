 <?php
  include "functions.php";
    $event_name=$_POST["event_name"];
    $event_start=$_POST["event_start"];
    $event_end=$_POST["event_end"];
    $time_start=$_POST["time_start"];
    $time_end=$_POST["time_end"];
    $output='';
      $sql='insert into event(event_name,event_date_start,event_date_end,event_time_start,event_time_end,event_status) values("'.$event_name.'","'.$event_start.'","'.$event_end.'",TIME_FORMAT("'.$time_start.'","%h:%i %p"),TIME_FORMAT("'.$time_end.'","%h:%i %p"),1)';
      $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
        $output.='<div class="alert alert-success">Event Posted</div>';
        echo $output;
 ?>