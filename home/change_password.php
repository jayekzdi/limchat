
          <h4 class="modal-title">Change Password <i class="fas fa-key"></i></h4><hr>
		<?php
include 'functions.php';
$sql='SELECT ei_name as Name,ei_last_name as Last_Name,ei_username as Username,ei_password as Password,emp_gender.gender AS Gender,ei_birthday as Birthday,ei_address as Address,emp_dept.dept_name AS Department FROM employee_info INNER JOIN emp_gender ON(emp_gender.gender_id=ei_gender)INNER JOIN emp_dept ON(emp_dept.dept_id=ei_dept) where concat(ei_name," ",ei_last_name)="'.$_SESSION["fullname"].'"';
$result=mysqli_query($connect,$sql);
$output='';
while($row=mysqli_fetch_array($result)){
	?>
	<div class="row">
   
			<div class="col-md-10">
			<div id="alert-error-update" class="alert alert-danger" hidden></div>
            <label for="name">Password:</label>
                <input type="password" name="password" id="current_password" class="form-control"  required/>
                <input type="hidden" id="password_valid" value="<?php echo $row["Password"];?>" >
    <label for="name">Password:</label>
                <input type="password" name="password" id="password_edit" class="form-control"  required/>
             <label for="name"> Confirm Password:</label>
                <input type="password" name="pass2" id="pass2_edit" class="form-control" required/>
				  <button type="button" class="btn btn-default pull-right">Cancel</button>
				  <button type="button" class="btn btn-info pull-right" id="update_password" name="update_account">Save Password</button>
		

<?php
}
?>