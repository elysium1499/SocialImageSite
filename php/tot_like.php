<?php 
    $num=$con->prepare("UPDATE images SET tot_like = (SELECT COUNT(*) FROM do_like WHERE do_like.url = images.url)");
    if($num->execute()) {
        $num->close();     
    }
    else error404($con);
?>