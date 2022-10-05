<?php
    $directory_profile = $_SESSION['url']."/profile/";
    $target_file = $directory_profile.basename($_FILES['profile']['name']);

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["profile"]["tmp_name"]);
        if($check == false) {
            echo "File is not an image.";
            exit;
        }
    }

    if($_SESSION['profile']!='../image/default_profile.png') unlink($_SESSION['profile']);

    if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)){
        $email= $_SESSION['email'];
        $new_profile= $con->prepare("UPDATE dati_utente SET profilo= ?  WHERE email=?");
        $new_profile->bind_param("ss", $target_file, $email);         
        if ($new_profile->execute()) {
            $_SESSION['profile']=$target_file;  
            $new_profile->close(); 
        }
        else error404($con);
    }
    else echo "Upload Error.";
?>