
          <h4 class="modal-title">Edit Account <i class="fas fa-user-edit"></i></h4><hr>
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
            <img src="../img/blank_img.png" id="img-user" alt="blank" class="img-circle img-responsive" style="width:50%;">
            <input type="file" name="img-edit" id="img-edit">
		<label for="name"> First Name:</label>
		 <input type="text" name="fullname" id="first_edit" class="form-control"  value="<?php echo $row["Name"] ; ?>" required/>
		 <label for="name">Last Name:</label>
		 <input type="text" name="fullname" id="last_edit" class="form-control"  value="<?php echo $row["Last_Name"] ; ?>" required/>
		 <label for="name">Userame:</label>
			<input type="text" name="username" id="username_edit" class="form-control" value="<?php echo $row["Username"] ; ?>" required disabled/>
		 <label for="gender">Gender:</label>
			<select class="form-control" id="gender_edit" name="gender_edit"  value="<?php echo $row["Gender"] ; ?>" required>
					<option hidden></option>
				<?php
					$sql1="select * from emp_gender";
					$result1=mysqli_query($connect,$sql1);
					while($row1=mysqli_fetch_array($result1)){
					  if($row["Gender"]===$row1["gender"]){ 
					  echo'<option value="'.$row1["gender_id"].'" selected="selected">'.$row1["gender"].'</option>';
					}
					else{
					  echo '<option value="'.$row1["gender_id"].'">'.$row1["gender"].'</option>';
					}
				  }
				  ?>
				</select>
			<label for="gender">Birthday:</label>
			<div class="input-group date" data-provide="datepicker" >
				<input type="text" class="form-control"  value="<?php echo $row["Birthday"] ; ?>" id="birthday_edit">
				<div class="input-group-addon">
				 <span class="far fa-calendar"></span>
				 </div>
				 </div>
				 <label for="gender">Department:</label>
			<select class="form-control" id="department_edit" name="department"  value="<?php echo$row["Department"] ; ?>" required>
					<option hidden></option>
					<?php
					$sql2='SELECT * from emp_dept';
					$result=mysqli_query($connect,$sql2);
					while($row2=mysqli_fetch_array($result)){
					  if($row["Department"]===$row2["dept_name"]){ 
						echo '<option value="'.$row2["dept_id"].'" selected="selected">'.$row2["dept_name"].'</option>';
					  }
					  else{
						echo '<option value="'.$row2["dept_id"].'">'.$row2["dept_name"].'</option>';
					  }
					}
					?>
					 </select>
					 <label for="address">Address:</label>
			<input type="text" name="address" id="address_edit" class="form-control" value="<?php echo $row["Address"] ; ?>" required/>
				
				  <button type="button" class="btn btn-default pull-right">Cancel</button>
				  <button type="button" class="btn btn-info pull-right" id="update_user" name="update_account">Update</button>
		

<?php
}
?>