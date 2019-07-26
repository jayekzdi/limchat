<?php
include 'db.php';
session_start();
$alert="";
if(isset($_SESSION["fullname"])){
  echo '<script>window.location.href="home";</script>';
}
if(isset($_POST["reset_pass"])){
    $password=$_POST["password"];
    $pass2=$_POST["password_validation"];
    if($password=="" || $pass2 == ""){
        $alert='<div class="alert alert-danger">
          <p>Please Complete the Fields</p>
        </div>';
    }
    else{
        if($pass2!=$password){
            $alert='<div class="alert alert-danger">
          <p>Password does not match</p>
        </div>';
        }else{
            $encrypted_password=md5($password);
            $sql='UPDATE employee_info set ei_password="'.$encrypted_password.'" WHERE ei_username="'.$_SESSION["forgot_username"].'"';
            $result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
            echo '<script>window.location.href="success.php"</script>';
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
          <h1><i class="fas fa-key"></i> Reset Password</h1>
        </center>
        <?php echo $alert;?>
    <form action="" method="post">

      <label> New Password:</label>
      <div class="input-group">
        <input type="password" name="password" class="form-control" id="password_type" onkeyup="key_up()">
      <span class="input-group-addon" id="display-eye">
     <span><i class="fas fa-key"></i></span>
      </span></div>
      <br/>   
      <label>Confirm Password:</label>
      <div class="input-group">
        <input type="password" name="password_validation" class="form-control" id="password_type1" onkeyup="key_up()">
      <span class="input-group-addon" id="display-eye1">
     <span><i class="fas fa-key"></i></span>
      </span></div>
      <br/>   
      <center>
        <input type="submit" name="reset_pass" class="btn btn-lg btn-default" value="Set Password">
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
    var password_type1=document.getElementById("password_type1");
      if(password_type1.value===""){
        document.getElementById("display-eye1").innerHTML='<span><i class="fas fa-key"></i></span>';
      }
      else{
      document.getElementById("display-eye1").innerHTML='<span onclick="trigger_toggle1()" style="cursor:pointer;"><i class="fas fa-eye"></i></span>';
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
    function trigger_toggle1(){
        var password_type1=document.getElementById("password_type1");
      if(password_type1.type ==="password"){
        password_type1.type="text";
        document.getElementById("display-eye1").innerHTML='<span onclick="trigger_toggle1()" style="cursor:pointer;"><i class="fas fa-eye-slash"></i></span>'
      }
      else{
        password_type1.type="password";
        document.getElementById("display-eye1").innerHTML='<span onclick="trigger_toggle1()" style="cursor:pointer;"><i class="fas fa-eye"></i></span>'
      }
    }
  
  </script>
</body>
</html>