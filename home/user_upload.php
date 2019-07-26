<?php
  if (isset($_FILES['files']) && !empty($_FILES['files'])) {
        if ($_FILES["files"]["error"] > 0) {
            echo "Error: " . $_FILES["files"]["error"] . "<br>";
        } else {
            if (file_exists('../img/' . $_FILES["files"]["name"])) {
                echo 'File already exists : uploads/' . $_FILES["files"]["name"];
            } else {
                move_uploaded_file($_FILES["files"]["tmp_name"], '../img/' . $_FILES["files"]["name"]);
                echo 'File successfully uploaded : uploads/' . $_FILES["files"]["name"] . ' ';
            }
        }
} else {
    echo 'Please choose at least one file';
}
?>