<?php
include 'db.php';
session_start();
$alert="";
if(isset($_SESSION["fullname"])){
  echo '<script>window.location.href="home";</script>';
}
if(isset($_POST["sq_verification"])){
  $pass=$_POST["sec_ans"];
  $sec_ans=md5($pass);
  if($pass==""){
    $alert='<div class="alert alert-danger">
          <p>Please Complete the Fields</p>
        </div>';
  } else{
  $sql="select * from employee_info where ei_username='".$_SESSION["forgot_username"]."' and ei_security_answer='".$sec_ans."' and ei_user_type=2";
  $result=mysqli_query($connect,$sql);
  $rows=mysqli_fetch_array($result);
  if($rows["ei_security_answer"]==$sec_ans){
   echo '<script>window.location.href="reset_password.php"</script>';
    }
  else{
    $alert='<div class="alert alert-danger">
          <p>Invalid Answer</p>
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
        <?php echo $alert; ?>
    <form action="" method="post">
        <?php
        $sql="select emp_security_question.sq_question from employee_info inner join emp_security_question on(ei_security_question=sq_id) where ei_username='".$_SESSION["forgot_username"]."' and ei_user_type=2";
        $result=mysqli_query($connect,$sql);
        while($row=mysqli_fetch_array($result)){
            ?>
          <label>Secret Question:</label>
        <input type="text" name="sec_quest" class="form-control" value="<?php echo $row["sq_question"];?>" disabled />

        <?php }?>
        <label>Secret Answer:</label>
        <input type="password" name="sec_ans" class="form-control"/>
      <br>
      <center>
        <input type="submit" name="sq_verification" class="btn btn-lg btn-default" value="Submit">
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