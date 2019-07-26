    <?php include 'functions.php'; ?>
<div class="container-fluid" id="dashbrd">
 <div class="row">
     <div class="col-lg-3">
        <div class="user-online">
          <div class="online-tab">
                <div class="fas fa-user pull-left online-icon"></div>
                <?php 
                    $sql="select count(ei_id) from employee_info where ei_active=1 and ei_status=1";
                    $result=mysqli_query($connect,$sql);
                while($row=mysqli_fetch_array($result)){
                ?>
                <p class="online-number">
                    <?php echo $row[0]; ?>
                </p>
                <?php
                }
                ?>
                <div class="online-head-tab">
                 <p class="online-head">Users Online</p>
                </div>
            
            </div>
        </div>
     </div>
     <div class="col-lg-3">
        <div class="user-online">
          <div class="user-tab">
                <div class="fas fa-user-circle pull-left online-icon"></div>
                <?php 
                    $sql="select count(ei_id) from employee_info where ei_active=1";
                    $result=mysqli_query($connect,$sql);
                while($row=mysqli_fetch_array($result)){
                ?>
                <p class="online-number">
                <?php echo $row[0]; ?>
                </p>
                <?php 
                } 
                ?>
                <div class="online-head-tab">
                 <p class="online-head">Users</p>
                </div>
            
            </div>
        </div>
     </div>

     <div class="col-lg-3">
        <div class="user-online">
          <div class="groupchat-tab">
                <div class="fas fa-users pull-left online-icon"></div>
                <?php 
                    $sql="select count(group_id) from groupchat";
                    $result=mysqli_query($connect,$sql);
                while($row=mysqli_fetch_array($result)){
                ?>
                <p class="online-number"><?php echo $row[0]; ?></p>
                <?php 
                } 
                ?>
                <div class="online-head-tab">
                 <p class="group-head">Groupchats</p>
                </div>
            
            </div>
         </div>
     </div>
    </div>
    <div class="row">
            <div class="col-md-5">
                <div class="well event-list" >
                    <?php include 'json.php'; ?>
                </div>
          </div>
          <div class="col-md-5">
          <div class="well event-list" >
                 <p class="lead text-center"><i class="fas fa-bullhorn" style="font-size:1.5em;"></i>ANNOUNCEMENTS</p>
                 <div class="btn-group btn-group-xs" role="group" id="btn-prio">
                    <button class="btn btn-info ann-filter"  data-target="all" id="filter-all">All</button>
                    <button class="btn btn-default ann-filter" data-target="low" id="filter-low">Low</button>
                    <button class="btn btn-warning ann-filter" data-target="normal" id="filter-normal">Normal</button>
                    <button class="btn btn-danger ann-filter" data-target="urgent" id="filter-urgent">Urgent</button>
                 </div>
                    <div id="page-announce"></div>
              </div>
            </div>
    </div>

          
   </div>
   
</div>
<div class="modal fade" id="view-announcement" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">View Announcement <i class="fas fa-bullhorn"></i></h4>
        </div>
        <div class="modal-body" id="view_post">
 </div>
      </div>
      
    </div>
  </div>
