<?php include 'functions.php';
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$f_name_firstname="";
$username="";
$password="luisianaim123"; 
$enc_pass=md5($password);
$gender=$_POST["gender"];
$birthday=$_POST["birthday"];
$address=$_POST["address"];
$department=$_POST["department"];
$sec_quest=$_POST["sec_quest"];
$sec_ans=$_POST["sec_ans"];
$enc_ans=md5($sec_ans);
        $lname=strtolower(str_replace(" ","",$lastname));
        $f_name=explode(" ",$firstname);
            foreach($f_name as $fname=>$value){
                $f_name_firstname.=strtolower($value[0]);
                }
 
                $username=$f_name_firstname.$lname;

                $sql='select count(ei_username) from employee_info where ei_username like"'.$username.'%"';
                $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
                while($row=mysqli_fetch_array($result)){
                    if($row[0]!=0){
                    $username=$username.$row[0];
            } //condition if user exist
            else{
                $username=$username;
            }
        } //count the number of user with same account

$sql='INSERT INTO employee_info(ei_name,ei_last_name,ei_username,ei_password,ei_gender,ei_birthday,ei_address,ei_dept,ei_status,ei_active,ei_security_question,ei_security_answer,ei_user_type) VALUES("'.$firstname.'","'.$lastname.'","'.$username.'","'.$enc_pass.'",'.$gender.',"'.$birthday.'","'.$address.'",'.$department.',3,1,'.$sec_quest.',"'.$enc_ans.'",2)';
$result=mysqli_query($connect,$sql) or die (mysqli_error($connect));
    $sql1='select group_name from groupchat where group_id='.$department.'';
$result=mysqli_query($connect,$sql1) or die (mysqli_error($connect));
$row=mysqli_fetch_array($result);
$group_name=strtolower(str_replace(" ","_",$row["group_name"]));
$sql='insert into '.$group_name.'(group_username,group_name) values((select ei_id from employee_info where ei_username="'.$username.'"),'.$department.')';
$result=mysqli_query($connect,$sql) or die (mysqli_error($connect));
$output.='<div id="alert_success" class="alert alert-success">Your Account is Added Successfully </div>
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
$sql='SELECT ei_id,ei_name as Name, ei_last_name as LastName,ei_username as Username,ei_password as Password,emp_gender.gender AS Gender,ei_birthday as Birthday,ei_address as Address,emp_dept.dept_name AS Department FROM employee_info INNER JOIN emp_gender ON(emp_gender.gender_id=ei_gender)INNER JOIN emp_dept ON(emp_dept.dept_id=ei_dept) where ei_active=1';
$result=mysqli_query($connect,$sql);
while($row=mysqli_fetch_assoc($result))
    {
     $output.='   <tr>
        <td>'.$row["Name"].' '.$row["LastName"].'</td>
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
include 'modals/remove_account_modal.php';
$output.='</tbody>
</table>';
echo $output;
?>