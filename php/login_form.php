<!DOCTYPE html>
<html>

<head>
    <title>LOG-IN</title>
    <link rel="stylesheet" type="text/css" href="../css/body.css">
    <link rel="stylesheet" type="text/css" href="../css/LoginSignup.css">
</head>

<body>
    <main>
        <h1 class="title">Login utente</h2>
            <div align="center" class="bg">
                <form action="login.php" method="post" onsubmit="return login()">
                    <div class="lb-header">
                        <a href="#" class="active" id="login-box-link">Log-In</a>
                        <a href="registration_form.php" id="signup-box-link">Sign-Up</a>
                    </div>
                    <br>
                    <input type="email" id="e-mail" name="email" placeholder="EMAIL">
                    <p style="color: red;" id="err_email"></p>
                    <br>
                    <input type="password" id="password" name="pass" placeholder="PASSWORD">
                    <p style="color: red;" id="err_password"></p>
                    <br>
                    <br>
                    <div class="draw">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="right-to-bracket" class="svg-inline--fa fa-right-to-bracket" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M344.7 238.5l-144.1-136C193.7 95.97 183.4 94.17 174.6 97.95C165.8 101.8 160.1 110.4 160.1 120V192H32.02C14.33 192 0 206.3 0 224v64c0 17.68 14.33 32 32.02 32h128.1v72c0 9.578 5.707 18.25 14.51 22.05c8.803 3.781 19.03 1.984 26-4.594l144.1-136C354.3 264.4 354.3 247.6 344.7 238.5zM416 32h-64c-17.67 0-32 14.33-32 32s14.33 32 32 32h64c17.67 0 32 14.33 32 32v256c0 17.67-14.33 32-32 32h-64c-17.67 0-32 14.33-32 32s14.33 32 32 32h64c53.02 0 96-42.98 96-96V128C512 74.98 469 32 416 32z"></path>
                        </svg>
                        <input class="button" type="submit" name="submit" value="LOG-IN">
                    </div>
                </form>
            </div>
            <div class="home">
                <a href="./home.php">
                    <button type="submit ">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="house" class="svg-inline--fa fa-house" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="currentColor" d="M575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6H511.8L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5L575.8 255.5z"></path>
                        </svg>
                    </button>
                </a>
            </div>
    </main>
    <script src="../js/error.js"></script>
</body>

</html>