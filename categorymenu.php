<?php
    /** Request for active categories */
    $db = mysqli_connect('remotemysql.com', 'XEgCxHe4mC', 'ON0JjIMn1k', 'XEgCxHe4mC');
    $categories = mysqli_query($db, "SELECT * FROM `Categories` WHERE `isActive`= 1");
    while($category = mysqli_fetch_array($categories)){
        echo "<li>";
        echo '<a href="category.php?id='.$category["id"].'&page=1">'.$category["name"].'</a>';
        echo "</li>";
    }     
?>
