<?php
include 'functions.php';
$get=$_POST["chatname"];
$sql='SELECT message_group.msg_id AS ID,message_group.msg_sender,CONCAT(employee_info.ei_name," ",employee_info.ei_last_name) AS Sender,message_group.msg_content AS Message,groupchat.group_name AS Group_Name,message_group.msg_date AS Date_Send,message_group.msg_time AS Time_Send,msg_read FROM message_group INNER JOIN employee_info ON (employee_info.ei_id = message_group.msg_sender) INNER JOIN groupchat ON (groupchat.group_id = message_group.msg_groupchat) WHERE (groupchat.group_name="'.$get.'") ORDER BY msg_id ASC';    
$result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
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
                $file_extn=array('doc','docx','ppt','pptx','pub','pubx','pdf','xls','xlsx');
               
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
                            <br> <br><date>'.$row["Date_Send"].'</date>  <time>'.$row["Time_Send"].'</time>
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
            elseif($row["Sender"]=="System Administrator"){
                $message=str_replace($_SESSION["fullname"],"You",$message);
                echo '<div class="chat system">
                <center class="system-cont text-center">'.$message.'</center>
            </div>';
            }
                    else{
                         /* This is for the Recievers log */
                         if(in_array($mensahe,$img_extn)){
                            echo '<div class="rcv-name">'.$row["Sender"].'</div>
                            <div class="chat friend">
                            <p class="message"><a href="../uploads/'.$message.'" data-lightbox="get-img">
                            <img src="../uploads/'.$message.'" class="semi-minified-img">
                            </a></p>
                            
                        </div>';
                         }
                          elseif(in_array($mensahe,$file_extn)){
                            echo '<div class="rcv-name">'.$row["Sender"].'</div>
                            <div class="chat friend">
                           
                            <p class="message"><i class="fas fa-file" style="font-size:3.5vw; position:relative; top:4vh;"></i><a href="download.php?filename='.$message.'" class="file-link">'.$message.'</a>
                            <br> <br><date>'.$row["Date_Send"].'</date>  <time>'.$row["Time_Send"].'</time>
                            </p>
                            
                        </div>';
                          }
                          else{ 
                            echo '<div class="rcv-name">'.$row["Sender"].'</div>
                            <div class="chat friend">
                            

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
                            var aSound = document.createElement('audio');
                                aSound.setAttribute('src', '../sound/apple_pay.mp3');
                                aSound.play();
                                </script> "; 
                        $sql_read ='update message_group set msg_read=1 where msg_groupchat=(select group_id from groupchat where group_name="'.$_SESSION["group_chatname"].'")';
                        $result_read=mysqli_query($connect,$sql_read) or die(mysqli_error($connect));
                    }elseif($row["Sender"]=="System Administrator"){
                    $sql_read ='update message_group set msg_read=1 where msg_groupchat=(select group_id from groupchat where group_name="'.$get.'")';
                    $result_read=mysqli_query($connect,$sql_read) or die(mysqli_error($connect));
                    }
                    else{
                        
                    }   
                }
         }
            
 ?>