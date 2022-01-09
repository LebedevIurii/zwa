<?php
    $db = mysqli_connect('remotemysql.com', 'XEgCxHe4mC', 'ON0JjIMn1k', 'XEgCxHe4mC'); 
    $url = parse_url("{$_SERVER['REQUEST_URI']}", PHP_URL_QUERY);
    if ($url != null){
        parse_str($url, $arguments);
        $page = $arguments["page"];
    } else{
        $page = 1;
    }
    $per_page_record = 9;
    $start_from = ($page-1) * $per_page_record;     

    $query = "SELECT * FROM `Posts` ORDER BY `id` DESC LIMIT $start_from, $per_page_record";
    $posts_result = mysqli_query($db, $query);
    $number = $start_from;
    echo '<div class="items">';
    while ($post_array = mysqli_fetch_array($posts_result)){
        echo "<div class='post'>";
        echo "<div class='img'>";
        // Using an image by Post
        echo "<a href='post.php?post_id=".$post_array['id']."' class='linked-post'><img src=".$post_array['image']." alt='Photo'></a>";
        echo "</div>";
        echo "<span class='title-price'>";
        // Using post's title
        echo "<span>".$post_array['title']."</span>";
        echo "<span class='price'>";
        echo "<span>Price:</span>";
        // Using post's price
        echo "<span>".$post_array['price'].",- Kč</span>";
        echo "</span>";
        echo "</span>";
        echo "<div class='post-text'>";
        // Using post's discryption
        echo "<p>".$post_array['text']."</p>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
    $rs_result = mysqli_query($db,"SELECT * FROM `Posts`");     
    $posts_pages = mysqli_fetch_all($rs_result);
    $total_records = count($posts_pages);
    $total_pages = ceil($total_records / $per_page_record);
    $pagLink = null;

    if($total_pages > 1) {
        echo '<div class="paging">';
        if($page>=2){   
            echo "<a href='index.php?page=".($page-1)."'> < Prev </a>";   
        }       
                
        for ($i=1; $i<=$total_pages; $i++) {
            if ($page == $i){
                echo "<span class='current-page'>"."$i"."</span>";
            }else{
                echo "<a href='index.php?page=".$i."'> ".$i." </a>";     
            }
        } 
    
        if($page<$total_pages){   
            echo "<a href='index.php?page=".($page+1)."'>  Next > </a>";   
        }
        echo '</div>';
    }
?>