<?php
    $db = mysqli_connect('remotemysql.com', 'XEgCxHe4mC', 'ON0JjIMn1k', 'XEgCxHe4mC');
    $url = parse_url("{$_SERVER['REQUEST_URI']}", PHP_URL_QUERY);
    parse_str($url, $arguments);
    $category_id = $arguments["id"];
    $page = $arguments["page"];
    if (!(isset($category_id))) {
        echo '<meta http-equiv="refresh" content="0; URL= /~lebediur/index.php">';
    }
    else {
        $category = mysqli_query($db, "SELECT * FROM `Categories` WHERE `id` = $category_id");
        $per_page_record = 9;
        $start_from = ($page-1) * $per_page_record;     
        $post_category = mysqli_fetch_array($category);
        $post_tag = $post_category["name"];
        echo '<div class="line">';
        echo '<div class="block-name">'.$post_category["name"].'</div>';
        echo '</div>';
        echo '<div class="items">';
        $query = "SELECT * FROM `Posts` WHERE `category`= '$post_tag' ORDER BY `id` DESC LIMIT $start_from, $per_page_record";
        $posts_result = mysqli_query($db, $query);
        $number = $start_from;
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
        echo '</div>';
        $rs_result = mysqli_query($db,"SELECT * FROM `Posts` WHERE `category`= '$post_tag'");     
        $posts_pages = mysqli_fetch_all($rs_result);
        $total_records = count($posts_pages);
        $total_pages = ceil($total_records / $per_page_record);
        $pagLink = null;
    
        if($total_pages > 1) {
            echo '<div class="paging">';
            if($page >= 2){   
                
                echo "<a href='category.php?id=".$category_id."&page=".($page - 1)."'> < Prev </a>";   
            }       
            
            for ($i=1; $i <= $total_pages; $i++) {
                if ($page == $i){
                    echo "<span class='current-page'>"."$i"."</span>";
                }else{
                echo "<a href='category.php?id=".$category_id."&page=".$i."'> ".$i." </a>";     
                }
            }  
            
            if($page < $total_pages){   
                echo "<a href='category.php?id=".$category_id."&page=".($page + 1)."'>  Next > </a>";   
            }
            echo '</div>';
        }
    }

?>