<!DOCTYPE html>
<html>

<head>
    <title>SIGN-UP</title>
    <link rel="stylesheet" type="text/css" href="../css/body.css">
    <link rel="stylesheet" type="text/css" href="../css/LoginSignup.css">
</head>

<body>
        <h1 class="title">Registrazione utente</h2>
    <div align=center> 
        <form action="./registration.php" method="post" onsubmit="return registration()">
            <div class="lb-header">
                <a href="login_form.php" id="login-box-link">Log-In</a>
                <a href="#" class="active" id="signup-box-link">Sign-Up</a>
            </div>
            <br>
            <input type="text" id="nome" name="firstname" placeholder="NAME">
            <p style="color: red;" id="err_name"></p>
            <br>
            <input type="text" id="cognome" name="lastname" placeholder="SURNAME">
            <p style="color: red;" id="err_surname"></p>
            <br>
            <input type="email" id="e-mail" name="email" placeholder="EMAIL"> 
            <p style="color: red;" id="err_email"></p>
            <br>
            <input type="password" id="password" name="pass" placeholder="PASSWORD">
            <p style="color: red;" id="err_password"></p>
            <br>
            <input type="password" id="conferma-password" name="confirm" placeholder="CONFIRM PASSWORD">
            <p style="color: red;" id="err_confirm"></p>
            <br>
            <div class="draw">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-plus" class="svg-inline--fa fa-user-plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM616 200h-48v-48C568 138.8 557.3 128 544 128s-24 10.75-24 24v48h-48C458.8 200 448 210.8 448 224s10.75 24 24 24h48v48C520 309.3 530.8 320 544 320s24-10.75 24-24v-48h48C629.3 248 640 237.3 640 224S629.3 200 616 200z"></path></svg>
                <input class="button" type="submit" name="submit" value="SIGN-UP">
            </div>
            <br>
        </form>
    </div>
    <div class="home">
        <a href="./home.php">
            <button type="submit ">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="house" class="svg-inline--fa fa-house" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6H511.8L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5L575.8 255.5z"></path></svg>
            </button>
        </a>
    </div>
    <script src="../js/error.js"></script>
</body>

</html>