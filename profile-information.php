<?php
    /** Connect to database */
    $db = mysqli_connect('remotemysql.com', 'XEgCxHe4mC', 'ON0JjIMn1k', 'XEgCxHe4mC');
    $email = $_SESSION["user_name"];
    $user_info = mysqli_query($db, "SELECT * FROM `Users` WHERE `email` = '$email'");
    /** Check if user_name is fetched */
    if ($user_info == null){
        /** if no, redirect to main page */
        echo '<meta http-equiv="refresh" content="0; URL= /~lebediur/signup.php">';
        exit();
    } else{
        /** if user exist, finding his profile */
        $profile = mysqli_fetch_array($user_info);
        $last_post = mysqli_query($db, "SELECT * FROM `Posts` WHERE `userId` = '$email' ORDER BY `id` DESC LIMIT 0, 1");
        $post = mysqli_fetch_array($last_post);
        /** Check if profile exist */
        if (isset($profile)){
            /** Profile field */
            echo '<div class="profile-info">';
            echo '<div class="name">';
            echo '<span class="manual">Jmeno: </span>';
            echo '<span class="nickname">'.$profile["login"].'</span>';
            echo '</div>';
            echo '<div class="contact">';
            echo '<span class="manual">E-mailová Adresa: </span>';
            echo '<a href="mailto:">'.$profile["email"].'</a>';
            echo '</div>';
            echo '<div class="users-posts">';
            echo '<div>';
            echo '<div class="manual">';
            echo '<p>Poslední inzeráty:</p>';
            echo '</div>';
            echo '<div class="history-links">';
            echo '<ul>';
            echo '<li>';
            if (isset($post)){
                echo '<a href="post.php?post_id='.$post["id"].'">'.$post["title"].'</a>';
            }
            echo '</li>';
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
?>
