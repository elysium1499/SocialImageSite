<?php 
$images = glob($dirid . "*.{jpg,JPG,png,PNG,gif,GIF}", GLOB_BRACE);
foreach ($images as $image) {

    $like = $con->prepare("SELECT tot_like FROM images WHERE url=?");
    $like->bind_param("s", $image);

    if ($like->execute() && ($result =  $like->get_result())) {
        $rlike = $result->fetch_array(MYSQLI_ASSOC);
        $like->close();
    }
    else error404($con);
    
    echo '<div class="like">
            <img class="img-responsive" src="' . $image . '" />
	    <br>
            <span>'. $rlike['tot_like'] . '</span>
            <svg class="heart" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" class="svg-inline--fa fa-heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M472.1 270.5l-193.1 199.7c-12.64 13.07-33.27 13.08-45.91 .0107l-193.2-199.7C-16.21 212.5-13.1 116.7 49.04 62.86C103.3 15.88 186.4 24.42 236.3 75.98l19.7 20.27l19.7-20.27c49.95-51.56 132.1-60.1 187.3-13.12C525.1 116.6 528.2 212.5 472.1 270.5z"></path></svg>';
    if(isset($_SESSION['id']))
        echo '<form action="./like.php" method="post">
                <input type="hidden" value="' . $image . '" name="image_url" />
                <input type="hidden" value="' . $_SESSION['id'] . '" name="identifier" />
                <button type="submit">
                    <svg class="add_like" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" class="svg-inline--fa fa-heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M472.1 270.5l-193.1 199.7c-12.64 13.07-33.27 13.08-45.91 .0107l-193.2-199.7C-16.21 212.5-13.1 116.7 49.04 62.86C103.3 15.88 186.4 24.42 236.3 75.98l19.7 20.27l19.7-20.27c49.95-51.56 132.1-60.1 187.3-13.12C525.1 116.6 528.2 212.5 472.1 270.5z"></path></svg>
                </button>
            </form>';
    echo '</div>';
}
?>
