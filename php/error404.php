<?php
    function error404($con){
        header("Location: ./error404v2.php");
        $con->close();
        exit();
    }
    function error403($con){
        header("Location: ./error403.php");
        $con->close();
        exit();
    }
?>