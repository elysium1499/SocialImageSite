<!DOCTYPE html>
<html>

<head>
  <title>Sign-up</title>
</head>

<body>

  <?php
  include("error404.php");
  if (!isset($_POST["email"]) || !isset($_POST["pass"])) {
    echo "Error, variable dont exist";
    header("Refresh:5; url= ./registration_form.php");
    exit;
  }

  include("config.php");

  $email = mysqli_real_escape_string($con, $_POST['email']);

  $query_pass = $con->prepare("SELECT * FROM dati_utente WHERE email=?");
  $query_pass->bind_param("s", $email);

  if ($query_pass->execute() && ($result =  $query_pass->get_result())) {  
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if ($row['ban'] == 0) {
      if (password_verify($_POST['pass'], $row['password'])) {
        
        session_start();
        $_SESSION['id'] = $row['ID'];
        $_SESSION['name'] = $row['nome'];
        $_SESSION['surname'] = $row['cognome'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['url'] = $row['url'];
        $_SESSION['profile'] = $row['profilo'];
        $_SESSION['admin'] = $row['admin'];
  
        $query_pass->close();
        $con->close();
        header('Location: ./home.php');
        exit;
      }
      else{ 
        echo "<script> alert('You have wrong password, try again'); window.location.href='./login_form.php';</script>";
        $query_pass->close();
        $con->close();
        exit;
      }
    }
    else {
      echo "<script> alert('You cannot log in, you are a banned user'); window.location.href='./home.php';</script>";
      $query_pass->close();
      $con->close(); 
      exit;
    }
    
  }
  else error404($con);

  $con->close();
  exit; 
  ?>

</body>

</html>