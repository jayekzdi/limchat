<?php
include 'db.php';
session_start();
$alert="";
if(isset($_SESSION["fullname"])){
  echo '<script>window.location.href="home";</script>';
}
if(isset($_POST["username_verification"])){
    $username=$_POST["username"];
  if($username==""){
    $alert='<div class="alert alert-danger">
          <p>Please Complete the Fields</p>
        </div>';
  } else{
  $sql="select * from employee_info where ei_username='".$username."' and ei_user_type=2";
  $result=mysqli_query($connect,$sql);
  $rows=mysqli_fetch_array($result);
  if($rows["ei_username"]==$username){
   echo '<script>window.location.href="secret_question.php"</script>';
   $_SESSION["forgot_username"]=$rows["ei_username"];
    }
  else{
    $alert='<div class="alert alert-danger">
          <p>Invalid Username</p>
        </div>';
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="font-awesome/css/all.css">
<style type="text/css">
#back{
  position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('css/background1.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    
  }
  .well{
    background-color:rgba(255,255,255,0.0);
    color:white;
  }
</style>
  </head>
  <body>
  <div id="back">
    <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="well" style="margin-top:100px;">
        <center>
          <h1><i class="fas fa-user-circle"></i> Forgot Password</h1>
        </center>
    <form action="" method="post">
          <label>Enter Your Username:</label>
        <div class="input-group">
        <input type="text" name="username" class="form-control">
        <span class="input-group-addon">
          <span class="fas fa-user"></span>
        </span>
      </div>
      <br>
      <center>
        <input type="submit" name="username_verification" class="btn btn-lg btn-default" value="Submit">
      </center> 
    </form>
      </div>
    </div>
  </div>
  
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script>
    function key_up(){
      var password_type=document.getElementById("password_type");
      if(password_type.value===""){
        document.getElementById("display-eye").innerHTML='<span><i class="fas fa-key"></i></span>';
      }
      else{
      document.getElementById("display-eye").innerHTML='<span onclick="trigger_toggle()" style="cursor:pointer;"><i class="fas fa-eye"></i></span>';
    }
  }
    function trigger_toggle(){
      var password_type=document.getElementById("password_type");
      if(password_type.type ==="password"){
        password_type.type="text";
        document.getElementById("display-eye").innerHTML='<span onclick="trigger_toggle()" style="cursor:pointer;"><i class="fas fa-eye-slash"></i></span>'
      }
      else{
        password_type.type="password";
        document.getElementById("display-eye").innerHTML='<span onclick="trigger_toggle()" style="cursor:pointer;"><i class="fas fa-eye"></i></span>'
      }
    }
  
  </script>
</body>
</html>