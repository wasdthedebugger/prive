<?php
session_start();
require('functions.php');
loggedin_only();

// find all files inside uploads/ directory and list them inside a anchor tag

$files = scandir('uploads/');

for ($i = 2; $i < count($files); $i++){
    echo "<a href='uploads/".$files[$i]."' download>".$files[$i]."</a><br>";
}

