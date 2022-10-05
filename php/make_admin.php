<?php
include("error404.php");
session_start();
include("config.php");

$user_id = isset($_GET['id']) ? mysqli_real_escape_string($con, $_GET['id']) : null;
$user_admin = isset($_GET['admin']) ? mysqli_real_escape_string($con, $_GET['admin']) : null;

if (isset($user_id)) {  
    if(isset($user_admin) && $user_admin=='si') $stmt = $con->prepare("UPDATE dati_utente SET admin= 1  WHERE ID=?");
    if(isset($user_admin) && $user_admin=='no') $stmt = $con->prepare("UPDATE dati_utente SET admin= 0  WHERE ID=?");
    $stmt->bind_param("s", $user_id);

    if ($stmt->execute()) {
        $stmt->close();
    }
    else error404($con);
    
    $con->close();
}
header('Location: ./adminRoom.php');
exit;
?>
