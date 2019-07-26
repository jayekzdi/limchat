<?php
include '../db.php';
session_start();
$alert="";
if(isset($_POST["login"])){
  $username=$_POST["username"];
$pass=$_POST["password"];
$password=md5($pass);
if($username=="" and $password==""){
  $alert='<div class="alert alert-danger">
        <p>Please Complete the Fields</p>
      </div>';
}
elseif($username==""){
$alert='<div class="alert alert-danger">
        <p>Please Enter your Username</p>
      </div>';
}
elseif($password==""){
  $alert='<div class="alert alert-danger">
        <p>Please Enter your Password</p>
      </div>';
}
else{
  $sql="select * from employee_info where ei_username='".$username."' and ei_password='".$password."' and ei_user_type=1";
$result=mysqli_query($connect,$sql);
$rows=mysqli_fetch_array($result);
if($rows["ei_username"]==$username and $rows["ei_password"]==$password){
 echo '<script>window.location.href="../dashboard"</script>';
 $_SESSION["admin"]=$rows["ei_name"]." ".$rows["ei_last_name"];
  }
else{
  $alert='<div class="alert alert-danger">
        <p>Login Failed</p>
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
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" href="../font-awesome/css/all.css">

<style type="text/css">
#back{
  position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('../css/admin.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    
  }
  .well{
    background-color:rgba(255,255,255,0.70);
  }
</style>
  </head>
  <body>
  <div id="back">
    <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="well" style="margin-top:100px;">
        <center>
          <img src="../img/admin_pic.png" width="70%" height="80%" class="image-responsive">
            <p class="lead">Administrator Login</p>
        </center>
    <form action="" method="post">
          <label>Username:</label>
        <div class="input-group">
        <input type="text" name="username" class="form-control">
        <span class="input-group-addon">
          <span class="fas fa-user"></span>
        </span>
      </div>
      <label>Password:</label>
      <div class="input-group">
        <input type="password" name="password" class="form-control" id="password_type" onkeyup="key_up()">
      <span class="input-group-addon" id="display-eye">
     <span><i class="fas fa-key"></i></span>
      </span></div>
      <br/>   
        <?php echo $alert; ?>
      <center>
        <input type="submit" name="login" class="btn btn-lg btn-success" value="LOGIN">
      </center> 
    </form>
      </div>
    </div>
  </div>
  <script src="../js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="../js/jquery.min.js"></script>
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