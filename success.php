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
        <div class="alert alert-success" style="margin-top:100px;">
        <center>
          <h1><i class="fas fa-check"></i> SUCCESS!</h1>
        </center>
        
            <h3>Password Reset</h3>
                <a href=".." class="btn btn-success">Back to Login <i class="fas fa-sign-in-alt"></i></a>
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