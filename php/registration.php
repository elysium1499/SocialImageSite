<!DOCTYPE html>
<html>

<head>
    <title>Sign-up</title>
    <link rel="stylesheet" type="text/css" href="../css/body.css">
</head>

<body>

    <?php
    include("error404.php");
    if (!isset($_POST["lastname"]) || !isset($_POST["firstname"]) || !isset($_POST["pass"]) || !isset($_POST["email"])) {
        echo "Error, variable dont exist";
        header("Refresh:5; url=./registration_form.php");
        exit;
    }

    include("config.php");

    $pass = trim($_POST["pass"]);
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);    //non puo' causare problemi di SQL injection, visto che gli hash sono sempre encodati in esadecimale

    $firstname = trim(mysqli_real_escape_string($con, $_POST["firstname"]));
    $lastname = trim(mysqli_real_escape_string($con, $_POST["lastname"]));
    $email = trim(mysqli_real_escape_string($con, $_POST["email"]));

    $check = $con->prepare("SELECT *  FROM dati_utente WHERE email=?");
    $check->bind_param("s", $email);

    if ($check->execute() && ($result=$check->get_result())) {
        if ($result->num_rows > 0) {
            echo "<script>alert('This email has already been registered.'); window.location.href='./registration_form.php';</script>";
            mysqli_close($con);
            exit;
        }
        $check->close();
    }
    else error404($con); 

    $profile_default = "../image/default_profile.png";
    $insert_user = $con->prepare("INSERT INTO dati_utente (nome, cognome, email, password, profilo) VALUES ( ?, ?, ?, ?, ?)");
    $insert_user->bind_param("sssss", $firstname, $lastname, $email, $pass, $profile_default);

    if ($insert_user->execute()) {
        $query =  $con->prepare("SELECT ID FROM dati_utente WHERE email=?");
        $query->bind_param("s", $email);
        if ($query->execute() && ($result = $query->get_result())) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $query->close();

            $url = "../image/users/" . $row['ID'];
            mkdir($url);
            $profile = $url . "/profile";
            mkdir($profile);
            $insert_user->close();
        }
        else{
            $insert_user->close();
            error404($con);
        }   
    }
    else error404($con);

    $insert_url = $con->prepare("UPDATE dati_utente SET url=? WHERE email=?");
    $insert_url->bind_param("ss", $url, $email);
    if ($insert_url->execute()) {
        $insert_url->close();
    }
    else error404($con);

    $con->close();
    header('Location: ./home.php');
    exit;
    ?>

</body>

</html>