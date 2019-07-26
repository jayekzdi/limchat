<?php
    include 'functions.php';
    ?>
<div class="container-fluid">
<h2>Manage Accounts</h2>
        <hr>
  <div class="row">
     <div class="col-md-12">
         
  <div class="row">
    <div class="col-md-12">
       <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Name</th>
            		<th>Activity</th>
                    <th>Date</th>
                    <th>Time</th>
            	</tr>
            </thead>
            <tbody>
                <?php  
                $sql='SELECT concat(employee_info.ei_name," ",employee_info.ei_last_name) as Names, log_activity as Logs, log_date,log_time from activity_log inner join employee_info on (log_fullname=ei_id) order by log_id desc';
                $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
                while($row=mysqli_fetch_assoc($result))
                {
                    ?>
                    <tr>
                    <td><?php echo $row["Names"];?></td>
        <td><?php echo $row["Logs"];?></td>
        <td><?php echo $row["log_date"];?></td>
        <td><?php echo $row["log_time"];?></td>

        </tr>
        <?php 
            }
        ?>
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
  
    