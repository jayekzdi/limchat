<?php include "functions.php";?>
          <h4 class="modal-title">Create Groupchat <i class="fas fa-user-plus"></i></h4>
        
        <div class="row">
                <div class="col-md-10">
                <form method="post">
            <label for="name"> Group Name:</label>
             <input type="text" name="fullname" id="group_create" class="form-control"  required/>
             <div class="col-md-6" style="margin:5vh 0;">
              <div class="well" id="list_users">
                <label for="chk_user">Users:</label><br>
                <input type="text" name="search_user" id="search_user" class="form-control">
                  <div id="search-users">
                <?php 
                $sql= 'SELECT ei_name as FName,ei_last_name as LName,ei_status,ei_image from employee_info  where ei_active=1 and ei_user_type=2 and concat(ei_name," ",ei_last_name) <>"'.$_SESSION["fullname"].'" order by ei_last_name';
                $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
                $output='';
                $num=0;
                    while($row=mysqli_fetch_assoc($result)){
                      echo '<a href="#" data-target="'.$row["FName"].' '.$row["LName"].'" class=" users">
                      <p>'.$row["FName"].' '.$row["LName"].'</p></a>';
                  } 
                
                ?>
                </div>
              </div>
            </div>
            <div class="col-md-6" style="margin:5vh 0;">
              <div class="well" id="list_add"> 
              <label for="chk_user">Users Added:</label><br>
              </div>
            </div>
                    <div class="row">
                      <button type="button" class="btn btn-info pull-right" id="save_group" name="save_group">Save</button>
                    </div>