<?php
    include 'connectioncheck.php';
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meow-itel</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="icon" href="favicon.ico">
</head>
<body>
    <div class="main-container">
        <div class="header">
            <nav class="nav">
                <a href="index.php">
                    <div class="logo">
                        <h1>Meow-itel</h1>
                    </div>
                </a>
                <div>
                    <ul class="nav-links">
                        <?php
                            if (isset($_SESSION["is_authorized"]) && ($_SESSION["is_authorized"] == 1)){
                                echo '<li class="add">';
                                echo '<a href="add.php">Add Post</a>';
                                echo '</li>';
                            }
                        ?>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <?php
                            echo "<li>";
                            if (isset($_SESSION["is_authorized"]) && $_SESSION["is_authorized"] == 1){
                                echo "<a href='profile.php'>Profile</a>";
                            } else {
                                echo "<a href='login.php'>Log in</a>";
                            }
                            echo "</li>";
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="content">
            <div class="main">
                <div class="category-menu">
                    <ul class="category-links">
                        <?php 
                            include 'categorymenu.php';
                        ?>
                    </ul>
                </div>
                <div class="post-block">
                    <div class="line">
                        <div class="block-name">
                            New posts:
                        </div>
                    </div>
                    <?php
                        include 'lastposts.php'; 
                    ?>
                </div>
            </div>
        </div>
        <div class="footer">
            <footer class="footer-h"> 
                <div>
                    <a href="https://github.com/LebedevIurii/zwa">Open source</a>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>