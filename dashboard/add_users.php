<?php include 'functions.php';

$sql0='SELECT ei_id,ei_username FROM employee_info WHERE ei_name<>"'.$fullname.'"';
$result=mysqli_query($connect,$sql0);
    while($row=mysqli_fetch_assoc($result)){
        $sql1 = "insert into ".$row["ei_username"]."(cntc_username,cntc_fullname) values ((select ei_id from employee_info where ei_name='".$fullname."'),(select ei_id from employee_info where ei_name='".$fullname."'))";
        $result=mysqli_query($connect,$sql1);
        $sql2 = "insert into ".$username."(cntc_username,cntc_fullname) values ((select ei_id from employee_info where ei_username='".$row["ei_username"]."'),(select ei_id from employee_info where ei_username='".$row["ei_username"]."'))";
        $result=mysqli_query($connect,$sql2);
    }
$output='<p>Congratulations! Your account has been created</p>';
echo $output;
?>