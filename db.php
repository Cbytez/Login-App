<?php

    $dbs = mysqli_connect("localhost", "Fatality", "Yennefer0974", "Login_App");

    if($dbs){
        echo "Connected to the database successfully";
        echo "<br>";
        echo "Database name: ". mysqli_get_server_info($dbs);
        echo "<br>";
    }else{
        echo "Failed to connect to the database";
        echo "<br>";
        echo "Error: ". mysqli_connect_error();
        echo "<br>";
        exit();
    }

?>