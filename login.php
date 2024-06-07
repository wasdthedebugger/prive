<?php
session_start();

// declare max file upload size limit
$maxFileSize = 1000000;
ini_set('upload_max_filesize', $maxFileSize);

if(@$_SESSION['loggedin'] === true){
    header("Location: index.php");
}

if(isset($_POST['submit'])){
    $pass = $_POST['pass'];
    if ($pass === 'N1i2k3a4s5#'){
        $_SESSION['loggedin'] = true;
        header("Location: index.php");
    } else {
        echo "wrong password";
    }
}

?>

<form action="#" method="POST">
    <input type="password" name="pass" id="">
    <input type="submit" name="submit" value="login">
</form>