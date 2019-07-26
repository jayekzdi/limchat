<?php
include 'functions.php';
if(isset($_POST["id"])){
$id=$_POST["id"];
$fullname=$_POST["fullname"];
$username=$_POST["username"];
$password=$_POST["password"]; 
$enc_pass=md5($password);
$gender=$_POST["gender"];
$birthday=$_POST["birthday"];
$address=$_POST["address"];
$department=$_POST["department"];
$output='';
$sql='UPDATE employee_info SET ei_name ="'.$fullname.'",ei_username ="'.$username.'",ei_password ="'.$enc_pass.'",ei_gender ='.$gender.',ei_birthday ="'.$birthday.'",ei_dept ='.$department.',ei_address ="'.$address.'" where ei_id='.$id.'';
$result=mysqli_query($connect,$sql) or die (mysqli_error($connect));
$output.='<div id="alert_success_update" class="alert alert-success">Congratulations! Your Account was Updated Successfully </div>
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
    $result=mysqli_query($connect,$sql);
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
<td> <button type="button" class="btn btn-danger btn-sm pull-right remove-trigger" id="'.$row['ei_id'].'" data-toggle="modal" data-target="#user-delete">
<i class="fas fa-trash"></i>
</button>
</tr>';
}
$output.='</tbody>
</table>';
echo $output;
}
?>