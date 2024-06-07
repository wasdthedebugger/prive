<?php

function loggedin_only(){
    if ($_SESSION['loggedin'] !== true){
        header("Location: login.php");
    }
}