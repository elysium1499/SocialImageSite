<!DOCTYPE html>
<html>

<head>
    <title>EDIT PROFILE</title>
    <link rel="stylesheet" type="text/css" href="../css/edit_profile.css">
    <link rel="stylesheet" type="text/css" href="../css/body.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
</head>

<body>
    <div>
        <?php 
        session_start();
        if (!isset($_SESSION['id'])) header("Location: ./error403.php");

        if (isset($_SESSION['id'])) $_SESSION['location'] = 'edit_profile';
        include("./navBar.php"); ?>
    </div>
    <form action="./update_profile.php" method="POST" enctype="multipart/form-data" onsubmit="return modify()">
        <div class="mod">
            <div class="modprofile">
                <h2 class="title">Edit profile</h2>
                <div class="dati">
                    <span class="text">Change name</span>
                    <input class="input" type="text" id="nome" name="firstname" placeholder="new name" value= "<?php print_r($_SESSION["name"]); ?>" ><br>
                    <span class="text">Change surname</span>
                    <input class="input" type="text" id="cognome" name="lastname" placeholder="new surname" value= "<?php print_r($_SESSION["surname"]); ?>" ><br>
                    <span class="text">Change email</span>
                    <input class="input" type="email" id="e-mail" name="email" placeholder="new email" value= "<?php print_r($_SESSION["email"]); ?>" ><br>
                    <span class="text">Change password</span>
                    <input class="input" type="password" id="password" name="pass" placeholder="new password">

                </div>
            </div>
            <div class="modprofile-img">
                <div class="box">
                    <div>
                        <svg class="icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M105.4 182.6c12.5 12.49 32.76 12.5 45.25 .001L224 109.3V352c0 17.67 14.33 32 32 32c17.67 0 32-14.33 32-32V109.3l73.38 73.38c12.49 12.49 32.75 12.49 45.25-.001c12.49-12.49 12.49-32.75 0-45.25l-128-128C272.4 3.125 264.2 0 256 0S239.6 3.125 233.4 9.375L105.4 137.4C92.88 149.9 92.88 170.1 105.4 182.6zM480 352h-160c0 35.35-28.65 64-64 64s-64-28.65-64-64H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456z"></path>
                        </svg>
                    </div>
                    <div class="upload-image sel">
                        <span>Choose photo profile</span>
                        <input type="file" id="chooseProfile" name="profile" accept="image/png, image/gif, image/jpeg">
                    </div>
                    <div>
                        <p align="center" id="noFile">No file chosen...</p>
                    </div>
                </div>

                <div class="box">
                    <div>
                        <svg class="icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="image" class="svg-inline--fa fa-image" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z"></path>
                        </svg>
                    </div>
                    <div class="upload-image sel">
                        <span>Choose image</span>
                        <input type="file" id="chooseImage" name="add_image" accept="image/png, image/gif, image/jpeg">
                    </div>
                    <p align="center" id="fileNo">No file chosen...</p>
                </div>
            </div>
            
            <br>
            <br>
            <br>
            <div class="profile">
                <button type="submit" id="Not">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-to-square" class="svg-inline--fa fa-pen-to-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M383.1 448H63.1V128h156.1l64-64H63.1C28.65 64 0 92.65 0 128v320c0 35.35 28.65 64 63.1 64h319.1c35.34 0 63.1-28.65 63.1-64l-.0039-220.1l-63.1 63.99V448zM497.9 42.19l-28.13-28.14c-18.75-18.75-49.14-18.75-67.88 0l-38.62 38.63l96.01 96.01l38.62-38.63C516.7 91.33 516.7 60.94 497.9 42.19zM147.3 274.4l-19.04 95.22c-1.678 8.396 5.725 15.8 14.12 14.12l95.23-19.04c4.646-.9297 8.912-3.213 12.26-6.562l186.8-186.8l-96.01-96.01L153.8 262.2C150.5 265.5 148.2 269.8 147.3 274.4z"></path>
                    </svg>
                    <span>Modify</span>
                </button>
            </div>
        </div>
    </form>
    <script type="text/javascript" src="../js/name_image.js"></script>
    <script type="text/javascript" src="../js/check_update.js"></script>
</body>

</html>