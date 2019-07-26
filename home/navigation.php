<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target="#navtarget">
				<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
			</button>
			<div class="logo"><i class="fas fa-comments"></i>&nbsp;&nbsp; L. I. M</div>
		</div> <!--nav header-->
			<div class="collapse navbar-collapse" id="navtarget">
				<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="close-btn"><i class="fas fa-home"></i></a></li>
					<li class="dropdown">
	 					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<?php echo $_SESSION["fullname"]; ?> &nbsp; <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
								<li><a href="#" id="post-announcement">Post Announcement <i class="fas fa-bullhorn"></i></a></li>
								<li><a href="#" id="post-event">Post Event <i class="fas fa-calendar pull-right"></i></a></li>
								<li><a href="#" id="edit-account">Edit Account <i class="fas fa-user-edit pull-right"></i></a></li>
								<li><a href="#" id="change-pass">Change Password <i class="fas fa-key"></i></a></li>
								<li><a href="logout.php">Logout <i class="fas fa-sign-out-alt pull-right"></i></a></li>
							</ul>
					</li>
				</ul>
			</div>
	</div>
</nav>


