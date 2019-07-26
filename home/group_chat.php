<?php include 'functions.php'; 		
$_SESSION["group_chatname"]=$_POST["username"];
$db_name=strtolower(str_replace(" ","_",$_SESSION["group_chatname"]));
?>
<div class="chat-box-index hide-chat">
		<div class="close-btn" style="position: relative; left: 55vw; ">
			<i class="fas fa-times"  data-target="display_home" style="cursor:pointer;"></i>
		</div>
    <div class="chat-user">
		<div class="user-name">
            <p class="fullname" id="groupname"><?php echo $_SESSION["group_chatname"]; ?></p>
        </div>
    </div>
	<div class="dropdown">
  <button class="btn  btn-sm dropdown-toggle info-btn" type="button" data-toggle="dropdown">
	  <i class="fas fa-info"></i>
</button>
  <ul class="dropdown-menu" id="dropdown_menu">
		<?php
			$sql='select concat(employee_info.ei_name," ",employee_info.ei_last_name) as Member, '.$db_name.'.group_admin from '.$db_name.' inner join employee_info on(ei_id=group_username) where concat(ei_name," ",ei_last_name)="'.$_SESSION["fullname"].'"';
			$result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
				while($row=mysqli_fetch_array($result)){
						echo '<li><a href="#"data-toggle="modal" data-target="#update_groupchat">Edit Group Name</a></li>
						<li><a href="#"data-toggle="modal" data-target="#view_members">View Members</a></li>
						<li><a href="#"data-toggle="modal" data-target="#add_members">Add Group Members</a></li>
						<li><a href="#"data-toggle="modal" data-target="#leave_group">Leave Group</a></li>';
				}
		?>
  </ul>
  </div>

<!-- Modal -->
<div id="update_groupchat" class="modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fas fa-users"></i>Edit Groupchat</h4>
      </div>
      <div class="modal-body">
		  <?php 
		  $sql="select * from groupchat where group_name='".$_SESSION["group_chatname"]."'";
		  $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
		  while($row=mysqli_fetch_array($result)){
		  ?>
		  <input type="hidden" id="group_id" value="<?php echo $row["group_id"];?>">
	  <input type="text" id="groupname_edit" class="form-control" placeholder="<?php echo $row["group_name"];?>">
	  <?php
		  }
		?>
      </div>
      <div class="modal-footer">
	  		<button type="button" class="btn btn-default pull-right" data-dismiss="modal" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-success pull-right" id="update_groupname" data-dismiss="modal" name="update_groupname">Save</button>
      </div>
    </div>

  </div>
</div>

<div id="view_members" class="modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fas fa-users"></i>Members</h4>
      </div>
      <div class="modal-body">
		<p class="lead">Members:</p><hr>
		<?php 
		  	$sql='select concat(employee_info.ei_name," ",employee_info.ei_last_name) as Member,employee_info.ei_image, '.$db_name.'.group_admin from '.$db_name.' inner join employee_info on(ei_id=group_username) order by  ei_last_name asc';
				$result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
					while($row=mysqli_fetch_array($result)){
						if($row["ei_image"]!=""){
							echo '<p><img src="../img/'.$row["ei_image"].'" alt="'.$row["Member"].'" style="width:10%; height:auto;" class="img-circle">'.$row["Member"].'</p>';
						}else{
							echo '<p><span class="fas fa-user-circle" style="font-size:5vh"></span>'.$row["Member"].'</p>';
						}
		  }
		?>
      </div>
    </div>

  </div>
</div>
<!-- Add Members-->
<div id="add_members" class="modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fas fa-users"></i>Add</h4>
      </div>
      <div class="modal-body">
				<input type="text" name="searching_name" id="search_group_user" class="form-control">
				<div id="search_add">
			
				</div>
					<p>Added Users:</p>
				<div id="search_added">
					
				</div>
				<button id="add_user" class="btn btn-sm btn-default">Add</button>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="leave_group" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#ac2925; color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Leave Group <i class="fas fa-users"></i></h4>
        </div>
        <div class="modal-body">
          <p class="lead">Are you sure do you want to the group</p> 
        </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default pull-right" data-dismiss="modal" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger pull-right" id="leave" name="remove_post">Leave Group</button>
      </div>
      
     </div>
  </div>
</div>
  
	<div class="chatbox">
			
		<div class="groupchatlogs">
			
		</div>
		<div class="row">
		<div class="file-temp" id="load-files" hidden></div>	
		<div class="col-md-7">
		<div class="container" id="emojicont" hidden></div>
  </div>
</div>
		<div class="chat-form">
		 <div class="rows">
				<div class="chat-bttn">
				<form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data"> 
				<span class="btn btn-default btn-lg btn-file">
					<i class="far fa-file"></i><input type="file" name="file_array[]" multiple id="get-files">
					</span>
					</form>
				</div>
				<div class="chat-bttn">
				<button class="btn btn-default btn-lg" data-target="emoticons" id="emoji-btn">
					<i class="far fa-smile"></i>
				  </button>
				</div>
			</div>
		 		
				 <div class="row">
			<div class="col-md-7">
				
				<textarea class="form-message form-control text-send" name="message-content" id="group_content"></textarea>
		   </div>
			 <div class="col-md-5">
		   <button class="btn btn-lg btn-default chat-send" name="chat-send" id="groupchat_send" disabled><i class="far fa-paper-plane"></i></button>
			 </div>
			 </div>
		</div>
	</div>
</div>
