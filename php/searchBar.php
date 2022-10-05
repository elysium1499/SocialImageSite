<?php session_start(); ?>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="../css/menu.css">
  <link rel="stylesheet" type="text/css" href="../css/body.css">
  <link rel="stylesheet" type="text/css" href="../css/serchBar.css">
</head>

<body>
  <?php
  if (isset($_SESSION['id'])) $_SESSION['location'] = 'user';
  include("./navBar.php"); ?>
  <div>
    <table>
      <?php
      include("config.php");
      $search_content = isset($_GET['search']) ? (trim(mysqli_real_escape_string($con, $_GET['search']))) : null;
      try {
        if (strlen($search_content) != 0) {
          $stmt = $con->prepare("SELECT nome, cognome, ID,profilo FROM dati_utente WHERE CONCAT(dati_utente.nome,' ', dati_utente.cognome) LIKE CONCAT( '%',?,'%')");
          $stmt->bind_param("s", $search_content);
          if ($stmt->execute() && ($result =  $stmt->get_result())) {
            if ($result->num_rows == 0) {
              ?> <p style='color: white; text-align: center;'>No match found!</p> <?php
            } else {
              while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                if (
                  isset($row['nome']) &&
                  isset($row['cognome']) &&
                  isset($row['ID']) &&
                  isset($row['profilo'])
                ) {
                  $image = $row['profilo'];
                  echo "<span class='user'> 
                          <a class='image' href=\"show_profile.php?id=" . $row['ID'] . "\">
                            <img src='" . $image . "' >
                            <strong>" . $row['nome'] . " " . $row['cognome'] . "</strong>
                          </a>
                        </span>";
                }
              }
            }
          }
          $stmt->close();
        } else {
          ?> <p style='color: white; text-align: center;'>No match found!</p> <?php
        }
        $con->close();
      } catch (Exception $e) {
        $con->close();
        die('Caught exception: ' . $e->getMessage());
      }

      ?>
    </table>
  </div>
</body>

</html>