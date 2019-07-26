<?php
include 'functions.php';
if(isset($_POST["id"])){
$id=$_POST["id"];
$output='';
$sql='Update employee_info set ei_active=0 where ei_id='.$id.'';
$result=mysqli_query($connect,$sql) or die (mysqli_error($connect));
// $sql1='select ei_username from employee_info where ei_id='.$id.'';
// $result=mysqli_query($connect,$sql1) or die (mysqli_error($connect));
// $row=mysqli_fetch_array($result);
// $sql='drop table if exists '.$row["ei_username"].'';
// $result=mysqli_query($connect,$sql) or die (mysqli_error($connect)); //if do you want to drop the tables
$output.='<div id="alert_success_remove" class="alert alert-success">Your Account was Removed Successfully </div>
<table class="table table-condensed">
<thead>
    <tr>
        <th>Name</th>
        <th>Username</th>
        <th>Department</th>
        <th>Address</th>
        <th>Birthday</th>
        <th>Gender</th>
        <th></th>
        <th></th>
    </tr>
</thead>
<tbody>';
    $sql='SELECT ei_id,ei_name as Name,ei_username as Username,ei_password as Password,emp_gender.gender AS Gender,ei_birthday as Birthday,ei_address as Address,emp_dept.dept_name AS Department FROM employee_info INNER JOIN emp_gender ON(emp_gender.gender_id=ei_gender)INNER JOIN emp_dept ON(emp_dept.dept_id=ei_dept) where ei_active=1';
    $result=mysqli_query($connect,$sql) or die (mysqli_error($connect));
    while($row=mysqli_fetch_assoc($result))
    {
     $output.='<tr>
        <td>'.$row["Name"].'</td>
<td>'.$row["Username"].'</td>
<td>'.$row["Department"].'</td>
<td>'.$row["Address"].'</td>
<td>'.$row["Birthday"].'</td>
<td>'.$row["Gender"].'</td>
<td> <button type="button" class="btn btn-default btn-sm pull-right edit-trigger" id="'.$row['ei_id'].'" data-toggle="modal" data-target="#user-edit">
<i class="fas fa-user-edit"></i>
</button>
<td> <button type="button" class="btn btn-danger btn-sm pull-right remove-trigger" id="'.$row['ei_id'].'" data-toggle="modal" >
<i class="fas fa-trash"></i>
</button>
</tr>';
}
$output.='<?php include "modals/remove_account_modal.php"?>';
$output.='</tbody>
</table>';
echo $output;
}
?>