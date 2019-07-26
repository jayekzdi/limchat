<?php
include 'functions.php';
?>
<div class="container-fluid">
<h3>Announcements</h3>
        <hr>
  <div class="row">
     <div class="col-md-11">
         <button class="btn btn-md btn-info pull-right" id="announcement-btn" data-toggle="modal" data-target="#user-announcement">
            <i class="fas fa-bullhorn"></i> Create Announcement
         </button>
         <div class="modal" id="user-announcement" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create announcement <i class="fas fa-bullhorn"></i></h4>
        </div>
        <div class="modal-body">
        <div id="alert-error" class="alert alert-danger" hidden>

        </div>
        <div class="row">
                <div class="col-md-10">
                <form method="post">
            <label for="name"> Title:</label>
             <input type="text" name="fullname" id="title_create" class="form-control"  required/>
             <label for="name">Announcement:</label>
             
          <textarea class="form-message form-control" name="announcement" id="announcenent_create"
          style="width:100%; height:20vh; resize:none;"></textarea>

         <select name="priority" id="announcement_priority">
          <option value="low">Low</option>
          <option value="normal">Normal</option>
          <option value="urgent">Urgent</option>
         </select>

                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info pull-right" id="save_announcement" name="save_announcement">Save</button>
    </div>
      </div>
      
    </div>
  </div>
       </div>
    </div>
  <div class="row">
    <div class="col-md-11">
       <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date Posted</th>
                    <th>Announcement</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
            	</tr>
            </thead>
            <tbody>
                <?php echo loadAnnoucements($connect); ?>
            </tbody>
        </table>
   </div>  <!-- column -->
   <div class="modal" id="view-announcement" role="dialog">
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
</div>  <!-- row -->
</div><!-- container -->
<script>
  $(document).ready(function(){
    $('.table').DataTable();
  });
</script>
<?php include 'modals/remove_announcement.php'; ?>