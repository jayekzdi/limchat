<?php
include '../db.php';
session_start();
if(!isset($_SESSION["admin"])){
  echo '<script>window.location.href="../admin";</script>';
}
?>
<!DOCTYPE html>
<html>
  <head>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="dttable/css/datatables.css"/>
<link rel="stylesheet" href="../css/bootstrap-datepicker.css" />
<link rel="stylesheet" href="../css/lim-design.css">
<link rel="stylesheet" href="css/admin_dashboard.css">
<link rel="stylesheet" href="../font-awesome/css/all.css">
   <link rel="stylesheet" href="../css/lightbox.min.css">
   
   <style>
  body{
    position: fixed;
	  top: 0;
	  left: 0;
	  width: 100%;
	  height: 100%;
    /*background-image: url('../css/hulugan.jpg');*/
	  background-repeat: no-repeat;
	  background-attachment: fixed;
	  background-size: cover;
  }
   </style>
</head>
  <body>
    <?php include 'navigation.php';
    include 'inbox.php';?>
      <div id="dashboard-fluid">
      
    </div> 
  </div>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="dttable/js/datatables.js"></script>
  <script src="../js/lim.jquery2.js"></script>
  <script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
 </body>
</html>