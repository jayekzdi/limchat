<?php
include 'functions.php';
if(!isset($_POST["chatname"]) && empty($_POST["chatname"])){
}else{
$_SESSION["reciever_user"]=$_POST["chatname"];
$get=$_SESSION["reciever_user"];
$sql='SELECT message.msg_id AS ID,CONCAT(employee_info.ei_name," ",employee_info.ei_last_name) as Sender,message.msg_content AS Message,concat(name2.ei_name," ",name2.ei_last_name) AS reciever,message.msg_date AS Date_Send,message.msg_time AS Time_Send,message.msg_read FROM message  INNER JOIN employee_info ON (employee_info.ei_id = message.msg_sender) INNER JOIN employee_info name2 ON (name2.ei_id = message.msg_reciever) WHERE ((CONCAT(employee_info.ei_name," ",employee_info.ei_last_name)="'.$_SESSION["fullname"].'") and (CONCAT(name2.ei_name," ",name2.ei_last_name)="'.$get. '") or (CONCAT(employee_info.ei_name," ",employee_info.ei_last_name)="'.$get.'") and (CONCAT(name2.ei_name," ",name2.ei_last_name)="'.$_SESSION["fullname"]. '")) order by msg_id asc';
    $result=mysqli_query($connect,$sql);
        while($row=mysqli_fetch_assoc($result)){
            $message=$row['Message'];
            $mensahe=pathinfo("../uploads/".$message,PATHINFO_EXTENSION);
        $emoji_query='select * from emoji';
        $result1=mysqli_query($connect,$emoji_query);
        while($rows=mysqli_fetch_assoc($result1)){
            $em_code=$rows['em_code'];
            $em_img='<img src="../emoticons/'.$rows['em_img'].'" class="emoji-mini-chat">';
            $message=str_replace($em_code,$em_img,$message);
        }
                $img_extn=array('jpeg','jpg','png','gif','ico');
                $file_extn=array('doc','docx','ppt','pptx','pub','pubx','pdf','xls','xlsx','psd','zip','rar','iso','7z');
            $sql1="select * from emoji";
            if($row["Sender"]== $_SESSION["fullname"]){
            /* This is for the Senders log */
           // if(array_key_exists(1,$mensahe)){
                if(in_array($mensahe,$img_extn)){
                echo '<div class="chat self">
                <p class="message"><a href="../uploads/'.$message.'" data-lightbox="get-img">
                <img src="../uploads/'.$message.'" class="semi-minified-img">
                </a></p>
            </div>';
                }
                else if(in_array($mensahe,$file_extn)){
                echo '<div class="chat self">
                    <p class="message"><i class="fas fa-file" style="font-size:3.5vw; position:relative; top:4vh;"></i><a href="download.php?filename='.$message.'" class="file-link">'.$message.'</a>
                    <br> <br>'.$row["Date_Send"].' '.$row["Time_Send"].'</time>
                    </p>
                </div>';
                }
            else{
            echo '<div class="chat self">
            <p class="message">'.$message.'
            <br> <br><date>'.$row["Date_Send"].'</date><time>'.$row["Time_Send"].'</time>
            </p>
        </div>';
        }
            //else{
               // if(!isset($mensahe[1])){
    }
            else{
                 /* This is for the Recievers log */
                 if(in_array($mensahe,$img_extn)){
                    echo '<div class="chat friend">
                    <p class="message"><a href="../uploads/'.$message.'" data-lightbox="get-img">
                    <img src="../uploads/'.$message.'" class="semi-minified-img">
                    </a></p>
                </div>';
                 }
                  elseif(in_array($mensahe,$file_extn)){
                    echo '<div class="chat friend">
                    <p class="message"><i class="fas fa-file" style="font-size:3.5vw; position:relative; top:4vh;"></i><a href="download.php?filename='.$message.'" class="file-link">'.$message.'</a>
                    <br> <br><date>'.$row["Date_Send"].'</date>  <time>'.$row["Time_Send"].'</time>
                    </p>
                </div>';
                  }
                  else{ 
                    echo '<div class="chat friend">
                <p class="message">'.$message.'
                <br> <br><date>'.$row["Date_Send"].'</date>  <time>'.$row["Time_Send"].'</time>
                </p>
            </div>';
                  }
            }
 
        if($row["msg_read"]!=1)
        {
            if($row["Sender"]!=$_SESSION["fullname"]){
            echo "<script>
            var audio= new Audio('../sound/apple_pay.mp3');
				audio.play();
            </script>";
                echo '<title> New Message</title>';
            $sql_read ='update message set msg_read=1 where ((msg_sender=(select ei_id from employee_info where concat(ei_name," ",ei_last_name)="'.$_SESSION["fullname"].'") or msg_reciever=(select ei_id from employee_info where concat(ei_name," ",ei_last_name)="'.$_SESSION["fullname"].'")) and (msg_sender=(select ei_id from employee_info where concat(ei_name," ",ei_last_name)="'.$get.'") or msg_reciever=(select ei_id from employee_info where concat(ei_name," ",ei_last_name)="'.$get.'")))';
            $result_read=mysqli_query($connect,$sql_read) or die(mysqli_error($connect));
        }else{
            echo '<title></title>';
        }
    }
        

        }
    }
unset($_POST["chatname"]);
 ?>