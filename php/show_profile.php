<?php
include("error404.php");
include("config.php");
session_start();



$user_id = isset($_GET['id']) ? mysqli_real_escape_string($con, $_GET['id']) : null;
if (!isset($user_id) && isset($_SESSION['id'])) {
    $owner  = $_SESSION['id'];
    $row['ID'] = $_SESSION['id'];
}

if (isset($user_id)) {
    if (isset($_SESSION['id'])) $owner = $_SESSION['id'];

    $stmt = $con->prepare("SELECT * FROM dati_utente WHERE ID=?");
    $stmt->bind_param("s", $user_id);

    if ($stmt->execute() && ($result =  $stmt->get_result())) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $stmt->close();
    }
    else error404($con);
}
if(!isset($user_id) && !isset($_SESSION['id'])) error403($con);
?>

<!DOCTYPE html>
<html>

<head>
    <title>PROFILE</title>
    <link rel="stylesheet" type="text/css" href="../css/body.css">
    <link rel="stylesheet" type="text/css" href="../css/profile.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
</head>

<body>
    <div>
        <?php
        if (isset($_SESSION['id'])) $_SESSION['location'] = 'profile';
        include("./navBar.php"); ?>
    </div>
    <div class="container">
        <div class="profile">
            <div class="profile-image">
                <?php
                if (isset($owner) && $owner == $row['ID']) {
                    $image = $_SESSION['profile'];
                } else {
                    $image = $row['profilo'];
                }
                ?>
                <img src='<?php echo $image; ?>' alt="Pug">
            </div>
            <div class="profile-user">
                <span style='font-size:40px; color:#fff'>
                    <?php
                    if (isset($owner) && $owner == $row['ID']) {
                        print_r($_SESSION['name'] . " " . $_SESSION['surname'] . " (id: " . $_SESSION['id'] . ")");
                        print_r("<br><span style='font-size:20px'>" . $_SESSION['email'] . "</span>");
                    } else {
                        print_r($row['nome'] . " " . $row['cognome'] . " (id: " . $row['ID'] . ")");
                        print_r("<br><span style='font-size:20px'>" . $row['email'] . "</span>");
                    }
                    ?>
                </span>
                <?php
                if (isset($owner) && $owner == $row['ID']) { ?>
                    <a href="./edit_profile.php">
                        <button class="profile-edit" type="submit">
                            Edit Profile
                        </button>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="gallery">
            <?php
            if (isset($owner) && $owner == $row['ID']) {
                $s_url = $_SESSION['url'];
                $file = scandir($s_url);
            } else {
                $s_url = $row['url'];
                $file = scandir($s_url);
            }
            if (!$file) {
                echo "Error";
                exit;
            }

            foreach ($file as $f) {
                $imgurl = $s_url . "/" . $f;
                if ($f != '.' && $f != '..' && $f != 'profile') {
                    $like = $con->prepare("SELECT tot_like FROM images WHERE url=?");
                    $like->bind_param("s", $imgurl);

                    if ($like->execute()) {
                        $result =  $like->get_result();
                        $rlike = $result->fetch_array(MYSQLI_ASSOC);
                        $like->close();
                    }else error404($con);

                    echo '<div class="gallery-item" tabindex="0">
                        <div style="text-align: end;">
                        <img src=' . $imgurl . '><br>
                        <div class="num"><span>' 
                            . $rlike['tot_like'] . '</span>
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" class="svg-inline--fa fa-heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M472.1 270.5l-193.1 199.7c-12.64 13.07-33.27 13.08-45.91 .0107l-193.2-199.7C-16.21 212.5-13.1 116.7 49.04 62.86C103.3 15.88 186.4 24.42 236.3 75.98l19.7 20.27l19.7-20.27c49.95-51.56 132.1-60.1 187.3-13.12C525.1 116.6 528.2 212.5 472.1 270.5z"></path></svg>
                        </div>';

                    if (isset($owner) && $owner != $row['ID']) {
                        echo '<form action="./like.php" method="post" style="display: inline;">
                            <input type="hidden" value="' . $imgurl . '" name="image_url" />
                            <input type="hidden" value="' . $_SESSION['id'] . '" name="identifier" />';
                            echo '<input type="hidden" value="' . $row['ID'] . '" name="ID" />';
                            echo '<button type="submit">
                            <svg class="like" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" class="svg-inline--fa fa-heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M472.1 270.5l-193.1 199.7c-12.64 13.07-33.27 13.08-45.91 .0107l-193.2-199.7C-16.21 212.5-13.1 116.7 49.04 62.86C103.3 15.88 186.4 24.42 236.3 75.98l19.7 20.27l19.7-20.27c49.95-51.56 132.1-60.1 187.3-13.12C525.1 116.6 528.2 212.5 472.1 270.5z"></path></svg>
                            </button></form>';
                    }

                    if ((isset($owner) && $owner == $row['ID']) || isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                        if ($_SESSION['admin'] == 1) echo '<input type="hidden" value="' . $row['ID'] . '" name="id" />';
                        echo '<form action="./delete_image.php" method="post" style="display: inline;"> 
                            <input type="hidden" value="' . $imgurl . '" name="delete_file" />
                            <button type="submit">
                            <svg class="trash" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M53.21 467c1.562 24.84 23.02 45 47.9 45h245.8c24.88 0 46.33-20.16 47.9-45L416 128H32L53.21 467zM432 32H320l-11.58-23.16c-2.709-5.42-8.25-8.844-14.31-8.844H153.9c-6.061 0-11.6 3.424-14.31 8.844L128 32H16c-8.836 0-16 7.162-16 16V80c0 8.836 7.164 16 16 16h416c8.838 0 16-7.164 16-16V48C448 39.16 440.8 32 432 32z"></path></svg>
                            </button></form>';
                    }
                    echo "</div>
                          </div>";
                }
            }
            $con->close();
            ?>
        </div>
    </div>
</body>

</html>