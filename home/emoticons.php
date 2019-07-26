<?php
include 'functions.php';
$sql="select * from emoji";
$result=mysqli_query($connect,$sql);
    while($row=mysqli_fetch_assoc($result)){
        echo '<div class="col-md-2">
        <span class="emoticon-code">
        <a href="#" data-target="'.$row['em_code'].'" class="emoji">
            <img src="../emoticons/'.$row['em_img'].'" class="emoji-mini">
        </a>
        </span>
        </div>';
    }
?>