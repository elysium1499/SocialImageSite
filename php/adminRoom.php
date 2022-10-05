<?php 
include("error404.php");
session_start(); 
?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/body.css">
    <link rel="stylesheet" type="text/css" href="../css/adminRoom.css">
</head>

<body>
    <?php
    if (isset($_SESSION['id'])) $_SESSION['location'] = 'user';
    include("./navBar.php"); ?>
    <div>
        <table>
            <?php
            if(isset($_SESSION['admin']) && $_SESSION['admin']==1){
                include("config.php");
                $stmt = $con->prepare("SELECT * FROM dati_utente");

                if ($stmt->execute() && ($result =  $stmt->get_result())) {
                    if ($result->num_rows == 0) {
                        ?> <p style='color: white; text-align: center;'>No match found!</p> <?php 
                    } else {
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                            if ($row['ID'] != $_SESSION['id']) {
                                $image = $row['profilo'];
                                echo "<span class='user'>
                                        <div class='image'>
                                        <a href=\"show_profile.php?id=" . $row['ID'] . "\">
                                        <img src='" . $image . "' >
                                        <strong>" . $row['nome'] . " " . $row['cognome'] . "</strong>
                                        </a>";
                                echo "<div align='center'><a href=\"delete_profile.php?id=" . $row['ID'] . "\" > <input class='delete' type='button' value='Delete Profile'></a></div>";
                                if ($row['ban'] == 0) echo "<div align='center'><a href=\"ban_profile.php?id=" . $row['ID'] . "&ban=si\" > <input class='ban' type='button' value='BAN Profile'></a></div>";
                                if ($row['ban'] == 1) echo "<div align='center'><a href=\"ban_profile.php?id=" . $row['ID'] . "&ban=no\" > <input class='not-ban' type='button' value='Remove BAN Profile'></a></div>";
                                if ($row['admin'] == 0) echo "<div align='center'><a href=\"make_admin.php?id=" . $row['ID'] . "&admin=si\" > <input class='make-admin' type='button' value='Make administrator'></a></div>";
                                if ($row['admin'] == 1) echo "<div align='center'><a href=\"make_admin.php?id=" . $row['ID'] . "&admin=no\" > <input class='make-admin' type='button' value='Remove administrator'></a></div>";
                                echo "</div></span>";
                            }
                        }
                    }
                    $stmt->close();
                }
                else error404($con);
                $con->close();
            }else { error403($con); } ?>   
        </table>
    </div>
</body>

</html>