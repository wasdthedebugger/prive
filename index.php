<?php
session_start();
require('functions.php');
loggedin_only();

// store the uploaded file

if (isset($_POST['submit'])){
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // store it in uploads/
        if ($fileError === 0){
            if ($fileSize < 1000000){
                // generate a random number 1 to 20
                $random = rand(1, 20);
                $fileNameNew = $random.$fileName;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                echo "<script>alert('done');</script>";
                header("Location: list.php");
            } else {
                echo "<script>alert('too big daddy');</script>";
            }
        } else {
            echo "There was an error uploading your file!";
        }

}


?>

<form action="#" method="POST" enctype="multipart/form-data">
    <input type="file" name="file" id="">
    <input type="submit" name="submit" value="Upload">
</form>