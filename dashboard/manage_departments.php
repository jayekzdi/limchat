<?php
include 'functions.php';
?>
<div class="container-fluid">
<h3>Manage Departments</h3>
        <hr>
  <div class="row">
     <div class="col-md-11">
         <button class="btn btn-md btn-info pull-right" id="department-btn">
            <i class="fas fa-user-plus"></i> Create Department
         </button>
       </div>
    </div>
  <div class="row">
    <div class="col-md-11">
       <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Departments</th>
                    <th></th>
                    <th></th>
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
                <?php echo loadDepartments($connect);?>
            </tbody>
        </table>
   </div>  <!-- column -->
    
</div>  <!-- row -->
   
</div><!-- container -->
<script>
  $(document).ready(function(){
    $('.table').DataTable();
  });
</script>
  