<?php
include("error404.php");
if (array_key_exists('image_url', $_POST) && array_key_exists('identifier', $_POST)) {
    $filename = $_POST['image_url'];
    $id = $_POST['identifier'];

    include("config.php");

    $exist = $con->prepare("SELECT * FROM do_like WHERE url=? AND id=?");
    $exist->bind_param('si', $filename, $id);
    if ($exist->execute() && ($result =  $exist->get_result())) {
        if ($result->num_rows == 0) {
            $like = $con->prepare("INSERT INTO do_like (url, id) VALUES ( ?, ?)");
            $like->bind_param('si', $filename, $id);
            if ($like->execute()) {
                $exist->close();
                $like->close();
            } else {
                $exist->close();
                error404($con);
            }
        }
        else{
            $like = $con->prepare("DELETE FROM do_like WHERE url=? AND id=?;");
            $like->bind_param('si', $filename, $id);
            if ($like->execute()) {
                $exist->close();
                $like->close();
            } else {
                $exist->close();
                error404($con);
            }
        }
    } else error404($con);

    include("tot_like.php");

    $con->close();
    if(isset($_POST['ID'])) header("Location: show_profile.php?id=" . $_POST['ID'] . "\\");
    else header("Location: home.php");
    exit;
}
