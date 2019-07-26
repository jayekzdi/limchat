 <div class="modal fade" id="user-create" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Account <i class="fas fa-user-plus"></i></h4>
        </div>
        <div class="modal-body">
        <div id="alert-error" class="alert alert-danger" hidden>

        </div>
        <div class="row">
                <div class="col-md-10">
                <form method="post">
            <label for="name"> First Name:</label>
             <input type="text" name="fullname" id="first_create" class="form-control"  required/>
             <label for="name">Last Name:</label>
             <input type="text" name="fullname" id="last_create" class="form-control"  required/>
             <label for="gender">Gender:</label>
                <select class="form-control" id="gender_create" name="gender" value="<?php echo $_POST["gender"]; ?>" required>
                        <option selected="selected" hidden></option>
                         <?php echo LoadGender($connect); ?>
                      </select>
                <label for="gender">Birthday:</label>
                <div class="input-group date" data-provide="datepicker">
                    <input type="text" class="form-control" id="birthday_create">
                    <div class="input-group-addon" >
                     <span class="far fa-calendar"></span>
                     </div>
                     </div>
                     <label for="gender">Department:</label>
                <select class="form-control" id="department_create" name="department" value="<?php echo $_POST["department"]; ?>" required>
                        <option selected="selected" hidden></option>
                         <?php echo LoadDepartmentsOption($connect); ?>
                      </select>
                      <label for="address">Address:</label>
                <input type="text" name="address" id="address_create" class="form-control" required/>

                <label for="gender">Security Question:</label>
                <select class="form-control" id="sec_quest_create" name="department" value="<?php echo $_POST["department"]; ?>" required>
                        <option selected="selected" hidden></option>
                         <?php echo LoadSecurityQuestion($connect); ?>
                      </select>
                      <label for="address">Security Answer:</label>
                <input type="password" name="address" id="sec_ans_create" class="form-control" required/>
                
                      <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-info pull-right" id="save_account" name="save_account">Save</button>
            </form>
    </div>
      </div>
      
    </div>
  </div>
  
  