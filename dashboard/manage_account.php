    <?php
    include 'functions.php';
    ?>
<div class="container-fluid">
<h2>Manage Accounts</h2>
        <hr>
  <div class="row">
     <div class="col-md-12">
         <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#user-create">
            <i class="fas fa-user-plus"></i> Create Account
        </button>
        <?php include 'modals/create_account.php';?>
       </div>
    </div>
  <div class="row">
    <div class="col-md-12" id="table-for-data">
    <div id="alert_success" class="alert alert-success"></div>
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
            <tbody>
                <?php  
                $sql='SELECT ei_id,ei_name as Name, ei_last_name as LastName,ei_username as Username,ei_password as Password,emp_gender.gender AS Gender,ei_birthday as Birthday,ei_address as Address,emp_dept.dept_name AS Department FROM employee_info INNER JOIN emp_gender ON(emp_gender.gender_id=ei_gender)INNER JOIN emp_dept ON(emp_dept.dept_id=ei_dept) where ei_active=1 and ei_user_type=2';
                $result=mysqli_query($connect,$sql);
                while($row=mysqli_fetch_assoc($result))
                {
                    ?>
                    <tr>
                    <td><?php echo $row["Name"]." ".$row["LastName"]  ;?></td>
        <td><?php echo $row["Username"];?></td>
        <td><?php echo $row["Department"];?></td>
        <td><?php echo $row["Address"];?></td>
        <td><?php echo $row["Birthday"];?></td>
        <td><?php echo $row["Gender"];?></td>
        <td> <button type="button" class="btn btn-default btn-sm pull-right edit-trigger" id="<?php echo $row['ei_id'];?>" data-toggle="modal" data-target="#user-edit">
        <i class="fas fa-user-edit"></i>
        </button>
        <td> <button type="button" class="btn btn-danger btn-sm pull-right remove-trigger" id="<?php echo $row['ei_id'];?>" data-toggle="modal" data-target="#user-delete">
        <i class="fas fa-trash"></i>
        </button>
        </tr>
        <?php 
            }
        ?>
            </tbody>
        </table>
   </div>  <!-- column -->
    
</div>  <!-- row -->
   
</div><!-- container -->
    <!-- Update Account -->
    <div class="modal fade" id="user-edit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Account <i class="fas fa-user-edit"></i></h4>
        </div>
        <div class="modal-body" id="load_employee_info">
          
        </div>
        
      </div>
      
    </div>
  </div>

<div class="modal fade" id="user-delete" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#ac2925; color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Remove Account <i class="fas fa-trash"></i></h4>
        </div>
        <div class="modal-body">
          <p class="lead">Are you sure do you want to remove this account</p> 
        </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default pull-right" data-dismiss="modal">No</button>
          <button type="button" class="btn btn-danger pull-right" id="remove_account" name="remove_account" data-dismiss="modal">Yes</button>
      </div>
      
     </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('.table').DataTable();
  });
</script>
  
    