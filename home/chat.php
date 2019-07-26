<?php include 'functions.php'; 		
$_SESSION["receiver_user"]=$_POST["username"];
?>
<div class="chat-box-index hide-chat">
<div class="close-btn" style="position: relative; left: 55vw; ">
	<i class="fas fa-times"  data-target="display_home" style="cursor:pointer;"></i>
		</div>

    <div class="chat-user">
		<div class="user-name">
			<p class="fullname"><?php echo $_SESSION["receiver_user"]; ?></p>
		</div>
		<div class="user-name">
		<?php
			echo chat_active($connect); 
			?>
		</div>
		
	</div>
	<div class="chatbox">
			
		<div class="chatlogs">
			
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
				
				<textarea class="form-message form-control text-send" name="message-content" id="content"></textarea>
		   </div>
			 <div class="col-md-5">
		   <button class="btn btn-lg btn-default chat-send" name="chat-send" id="send" disabled><i class="far fa-paper-plane"></i></button>
			 </div>
			 </div>
		</div>
	</div>
</div>
