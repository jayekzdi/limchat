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
					<li class="dropdown">
	 					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<?php echo $_SESSION["admin"]; ?> &nbsp; <span class="caret"></span>
						</a>
							<ul class="dropdown-menu">
								<li><a href="logout.php">Logout</a></li>
							</ul>
					</li>
				</ul>
			</div>
	</div>
</nav>