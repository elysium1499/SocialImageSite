<div class="topnav">
    <ul class="nav">
        <a href="../index.php"><img class="logo-mn" src="../image/logo.png" /></a>

        <ol>
            <div class="btn">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
            </div>

            <div class="search-button">
                <button id="search">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" class="svg-inline--fa fa-magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z">
                        </path>
                    </svg>
                </button>
                <div class="search-popup">
                    <div class="search-bg"></div>
                    <div class="search-form">
                        <div class="form">
                            <form action="./searchBar.php" method="get">
                                <input type="text" id="search" name="search" placeholder="Search...">
                                <label for="search"><i class="fa fa-search"></i></label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-bar hidden">
                <ul>
                    <?php
                    if (!isset($_SESSION['location'])) {
                    ?>
                        <li><a href="./login_form.php">LOG-IN</a></li>
                        <li><a href="./registration_form.php">SIGN-UP</a></li>
                        <li><a href="../contact.html">CONTACT</a></li>
                        <?php
                    } else {
                        if ($_SESSION['location'] == 'home') {
                        ?>
                            <li><a href="./logout.php">LOG-OUT</a></li>
                            <li><a href="./show_profile.php">PROFILE</a></li>
                            <li><a href="../contact.html">CONTACT</a></li>
                            <?php if($_SESSION['admin']==1){?>
                                <li><a href="./adminRoom.php">ADMIN-ROOM</a></li>
                            <?php }
                        }
                        if ($_SESSION['location'] == 'user') {
                            ?>
                            <li><a href="./logout.php">LOG-OUT</a></li>
                            <li><a href="./show_profile.php">PROFILE</a></li>
                            <li><a href="../contact.html">CONTACT</a></li>
                        <?php
                        }
                        if ($_SESSION['location'] == 'profile') {
                        ?>
                            <li><a href="./logout.php">LOG-OUT</a></li>
                            <li><a href="../contact.html">CONTACT</a></li>
                        <?php
                        }
                        if ($_SESSION['location'] == 'edit_profile') {
                        ?>
                            <li><a href="./logout.php">LOG-OUT</a></li>
                            <li><a href="./show_profile.php">PROFILE</a></li>
                            <li><a href="../contact.html">CONTACT</a></li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </ol>
    </ul>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
<script src="../js/navbar.js"></script>
<script src="../js/search.js"></script>