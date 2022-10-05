<?php
    $directory_user = $_SESSION['url']."/";
    $target_file = $directory_user.basename($_FILES['add_image']['name']);

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["add_image"]["tmp_name"]);
        if($check == false) {
            echo "File is not an image.";
        }
    }

    if (move_uploaded_file($_FILES["add_image"]["tmp_name"], $target_file)){
        $like=0;

        $new_image= $con->prepare("INSERT INTO images (url, tot_like, user) VALUES ( ?, ?, ?)");
        $new_image->bind_param('sis', $target_file, $like, $_SESSION['id']);
        if ($new_image->execute()) { 
            $new_image->close(); 
        }
        else error404($con);

    }
    else echo "Upload Error.";
?>

