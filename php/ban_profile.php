<?php
include("error404.php");
include("config.php");
session_start();

$user_id = isset($_GET['id']) ? mysqli_real_escape_string($con, $_GET['id']) : null;
$user_ban = isset($_GET['ban']) ? mysqli_real_escape_string($con, $_GET['ban']) : null;

if (isset($user_id)) {  
    
    if(isset($user_ban) && $user_ban=='si') $stmt = $con->prepare("UPDATE dati_utente SET ban= 1  WHERE ID=?");
    if(isset($user_ban) && $user_ban=='no')$stmt = $con->prepare("UPDATE dati_utente SET ban= 0  WHERE ID=?");
    $stmt->bind_param("s", $user_id);

    if ($stmt->execute()) {
        $stmt->close();
    }
    else error404($con);
}
$con->close();
header('Location: ./adminRoom.php');
exit;
?>