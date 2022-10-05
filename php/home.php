<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PinteTest</title>
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/galleryRoom.css">
    <link rel="stylesheet" type="text/css" href="../css/carousel.css">
    <link rel="stylesheet" type="text/css" href="../css/body.css">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
</head>

<body>
    <div>
        <?php
        include("error404.php");
        include("config.php");
        session_start();
        if (isset($_SESSION['id'])) $_SESSION['location'] = 'home';
        include("./navBar.php"); ?>
    </div>
    <div> <?php include("./carousel.php") ?></div>
    <div id="gallery" class="container-fluid">
        <?php
        $dirname = "../image/users/";
        $dir = glob($dirname . "*" . "/");

        foreach ($dir as $dirid) {
            if (isset($_SESSION['url']) && $dirid == $_SESSION['url']."/" ) {
                continue;
            }
            else include("./gallery.php");
        }
        $con->close();
        ?>
    </div>
    <script src="../js/galleryRoom.js"></script>
    <footer class="copyright">
        <cite>© Copyright 2022. All rights reserved. Made by Cacciola Giorgio and Calza Elisa</cite>
    </footer>
</body>

</html>