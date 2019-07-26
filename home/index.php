<?php
include 'functions.php';
if(!isset($_SESSION["fullname"])){
  echo '<script>window.location.href="../";</script>';
}
?>
<!DOCTYPE html>
<html>
  <head>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/lim-design.css">
<link rel="stylesheet" href="../css/bootstrap-datepicker.css" />
<link rel="stylesheet" href="../font-awesome/css/all.css">
   <link rel="stylesheet" type="text/css" href="../css/chat-style.css">
   <link rel="stylesheet" href="../css/lightbox.min.css">
</head>
  <body>
  	<?php include 'navigation.php'; 
  include 'inbox.php';?>
      <div id="chatbox-fluid">
    </div> 
  </div>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
   <script src="../js/lim.jquery.js"></script>
    <script src="../js/lightbox.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
<!-- <script src='fullcalendar/lib/moment.min.js'></script>  -->
<!-- <script src='fullcalendar/fullcalendar.min.js'></script> -->
 </body>
</html>