<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'S4700104');
    define('DB_PASSWORD', '30politico');
    define('DB_DATABASE', 'S4700104');

    // Start connection
    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    // Check database connection
    if($con->connect_error)
        die("Connection failed: " . $con->connect_error);

?>