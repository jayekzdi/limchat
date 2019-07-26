<?php
    include 'functions.php';
    $sql="update announcement set ann_status=0 WHERE ann_date BETWEEN ann_date AND date_format(CURDATE()+INTERVAL 1 day,'%h:%i %p') and ann_pinned='urgent'";
    $result=mysqli_query($connect,$sql);
    $sql="update event set event_status=0 WHERE event_date_end = DATE_FORMAT(NOW(),'%m/%d/%Y') AND event_time_start BETWEEN event_time_start AND event_time_end";
    $result=mysqli_query($connect,$sql);
?>