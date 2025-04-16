<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "DigiShopy";

    $conn = new mysqli($server, $username, $password, $db);

    if($conn->connect_error){
        die("DB Connection Failed: " . $conn->connect_error);
    }
    
?>