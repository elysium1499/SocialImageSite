<?php
    include("error404.php");
    session_start();
    $id=$_SESSION['id'];

    include("config.php");
    if(isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["pass"])){
        $firstname= trim($_POST["firstname"]);
        $lastname= trim($_POST["lastname"]);
        $email= trim($_POST["email"]);
        $pass= trim($_POST["pass"]);

        $modify = $con->prepare("UPDATE dati_utente SET nome= ?, cognome= ?, email= ? WHERE ID=?");
        if($firstname== ""){
            $firstname=$_SESSION['name'];
        }
        if($lastname== ""){
            $lastname=$_SESSION['surname'];
        }
        if($email== ""){
            $email=$_SESSION['email'];
        }

        // se volete farlo possiamo mettere la password old di conferma.
        //controllo se email esiste già
        $email = mysqli_real_escape_string($con, $_REQUEST['email']);
        $check=$con->prepare("SELECT * FROM dati_utente WHERE email=?");
        $check->bind_param("s", $email);
        if ($check->execute()) {
            if( $_SESSION['email'] != $email && ($result =  $check->get_result())){
                if ($result->num_rows > 0) {
                    echo "<script>alert('Email already exists, please try another email.'); window.location.href='./edit_profile.php';</script>";
                    $check->close();
                    $con->close();
                    exit;  
                }
            }
            else $check->close();
        }
        else{
            echo "Error execute query";
            $con->close();
            exit;
        }

        $modify->bind_param("sssi", $firstname, $lastname, $email, $id);
        if ($modify->execute()) {
            $_SESSION['name']= $firstname;
            $_SESSION['surname']=$lastname;
            $_SESSION['email']=$email;
            $modify->close();
        }
        else{
            echo "Error execute query";
            $con->close();
            exit;
        }
        
        //password non può essere null ma può essere vuota
        if($pass!= ""){
            $hash=password_hash($pass, PASSWORD_DEFAULT);
            $pass = mysqli_real_escape_string($con, $hash);
            $insert_password = $con->prepare("UPDATE dati_utente SET password= ? WHERE ID=?");
            $insert_password->bind_param("ss", $pass, $id);
            if ($insert_password->execute()) {
                $insert_password->close();
            }
            else{
                echo "Error execute query";
                $con->close();
                exit;
            }  
        }
    }

    if($_FILES['profile']['error']==0){
        include("./upload_profile.php");
    }
    if($_FILES['add_image']['error']==0){
        include("./upload_image.php");
    } 
    $con->close();
    header('Location: ./show_profile.php');
    exit;
?>