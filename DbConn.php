<?php
    //Database connection details
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "kuguru";

    //Database connection
    $DbConn = new mysqli ($host,$username,$password,$db);
    if ($DbConn === false){
        echo "ERROR!";
    }  
?>