<?php
include 'functions.php';
if(isset($_POST["id"])){
$name=$_POST["id"];
$sql='SELECT ei_name as Name,ei_last_name as Last_Name,ei_username as Username,ei_password as Password,emp_gender.gender AS Gender,ei_birthday as Birthday,ei_address as Address,emp_dept.dept_name AS Department FROM employee_info INNER JOIN emp_gender ON(emp_gender.gender_id=ei_gender)INNER JOIN emp_dept ON(emp_dept.dept_id=ei_dept) where employee_info.ei_id="'.$name.'"';
$result=mysqli_query($connect,$sql);
$output='';
while($row=mysqli_fetch_array($result)){

 
    $output.='<div class="row">
            
                <div class="col-md-10">
                <div id="alert-error-update" class="alert alert-danger" hidden></div>
            <label for="name"> First Name:</label>
             <input type="text" name="fullname" id="first_edit" class="form-control"  value="'.$row["Name"].'" required/>
             <label for="name">Last Name:</label>
             <input type="text" name="fullname" id="last_edit" class="form-control"  value="'.$row["Last_Name"].'" required/>
             <label for="name">Userame:</label>
                <input type="text" name="username" id="username_edit" class="form-control" value="'.$row["Username"].'" required disabled/>
             <label for="name">Password:</label>
                <input type="password" name="password" id="password_edit" class="form-control" value="'.$row["Password"].'" required/>
             <label for="name"> Confirm Password:</label>
                <input type="password" name="pass2" id="pass2_edit" class="form-control" value="'.$row["Password"].'" required/>
             <label for="gender">Gender:</label>
                <select class="form-control" id="gender_edit" name="gender_edit" value="'.$row["Gender"].'" required>
                        <option hidden></option>';
                        $sql1="select * from emp_gender";
                        $result1=mysqli_query($connect,$sql1);
                        while($row1=mysqli_fetch_array($result1)){
                          if($row["Gender"]===$row1["gender"]){ 
                          $output.= '<option value="'.$row1["gender_id"].'" selected="selected">'.$row1["gender"].'</option>';
                        }
                        else{
                          $output.= '<option value="'.$row1["gender_id"].'">'.$row1["gender"].'</option>';
                        }
                      }
                         $output.=' </select>
                <label for="gender">Birthday:</label>
                <div class="input-group date" data-provide="datepicker" >
                    <input type="text" class="form-control" value="'.$row["Birthday"].'" id="birthday_edit">
                    <div class="input-group-addon">
                     <span class="far fa-calendar"></span>
                     </div>
                     </div>
                     <label for="gender">Department:</label>
                <select class="form-control" id="department_edit" name="department" value="'.$row["Department"].'" required>
                        <option hidden></option>';
                        $sql2='SELECT * from emp_dept';
                        $result=mysqli_query($connect,$sql2);
                        while($row2=mysqli_fetch_array($result)){
                          if($row["Department"]===$row2["dept_name"]){ 
                            $output.= '<option value="'.$row2["dept_id"].'" selected="selected">'.$row2["dept_name"].'</option>';
                          }
                          else{
                            $output.= '<option value="'.$row2["dept_id"].'">'.$row2["dept_name"].'</option>';
                          }
                        }
                         $output.=  '</select>
                         <label for="address">Address:</label>
                <input type="text" name="address" id="address_edit" class="form-control" value="'.$row["Address"].'" required/>
                         <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-info pull-right" id="update_account" name="update_account">Update</button>
                      </div>
            
    </div>';
     } 
     echo $output;
}
?>
  