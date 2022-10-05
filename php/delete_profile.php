<?php
function rmdir_recursive($dir) {
    $it = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
    $it = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
    foreach($it as $file) {
        if ($file->isDir()) rmdir($file->getPathname());
        else unlink($file->getPathname());
    }
    rmdir($dir);
}

include("error404.php");
include("config.php");
session_start();

$user_id = isset($_GET['id']) ? mysqli_real_escape_string($con, $_GET['id']) : null;
if (isset($user_id)) {   

    $stmt = $con->prepare("SELECT url, profilo FROM dati_utente WHERE ID=?");
    $stmt->bind_param("i", $user_id);
    if ($stmt->execute() && ($result =  $stmt->get_result())) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $stmt->close();
    }
    else error404($con);

    if (is_dir($row['url'])) {
        rmdir_recursive($row['url']);
    }

    $stmt = $con->prepare("DELETE FROM dati_utente WHERE ID=?");
    $stmt->bind_param("i", $user_id);
    if ($stmt->execute()) {
        $stmt->close();
    }
    else error404($con);

    $stmt = $con->prepare("DELETE FROM images WHERE user=?");
    $stmt->bind_param("i", $user_id);
    if ($stmt->execute()) {
        $stmt->close();
    }
    else error404($con);
    
    $stmt = $con->prepare("DELETE FROM do_like WHERE id=? OR url NOT IN (SELECT url FROM images)");
    $stmt->bind_param("i", $user_id);
    if ($stmt->execute()) {
        $stmt->close();
    }
    else error404($con);
}

include("tot_like.php");

$con->close();
header('Location: ./adminRoom.php');
exit;
?>