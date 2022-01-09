<?php
    $db = mysqli_connect('remotemysql.com', 'XEgCxHe4mC', 'ON0JjIMn1k', 'XEgCxHe4mC');
    $url = parse_url("{$_SERVER['REQUEST_URI']}", PHP_URL_QUERY);
    parse_str($url, $arguments);
    $post_id = $arguments["post_id"];
    if (isset($post_id)){
        $found_post = mysqli_query($db, "SELECT * FROM `Posts` WHERE `id`='$post_id'");
        if (isset($found_post)){
            $post = mysqli_fetch_array($found_post);
            echo '<div class="post-field">';
            echo '<div class="post-field-item">';
            echo '<div class="title-price">';
            echo '<div class="post-part">';
            echo $post['title'];
            echo '</div>';
            echo '<div class="price post-part">';
            echo '<span>';
            echo 'Cena:';
            echo '</span>';
            echo '<span>';
            echo $post['price'] .',- Kč';
            echo '</span>';
            echo '</div>';
            echo '</div>';
            echo '<div class="post-img">';
            echo '<img src="'.$post['image'].'" alt="Photo">';
            echo '</div>';
            echo '<div class="post-info">';
            echo '<div class="description">';
            echo $post['text'];
            echo '</div>';
            echo '<div class="contact">';
            echo '<div class="name">';
            echo '<span class="manual">Kontakt: </span>';
            echo '<a href="mailto:'.$post['userId'].'?subject='.$post['title'].'">'.$post['userId'].'</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        } else{
            echo '<div class="post-field">';
            echo '<div class="post-part">';
            echo "Error #404, Takovy inzerat neexistuje";
            echo '</div>';
            echo '</div>';
        }
    } else{
        echo '<meta http-equiv="refresh" content="0; URL= /~lebediur/index.php">';
        exit();
    }
?>