<?php

    include 'connectioncheck.php';
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meow-itel post page</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="icon" href="favicon.ico">
    <script src="https://kit.fontawesome.com/205095dac4.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="main-container">
        <div class="header">
            <nav class="nav">
                <!--Nav bar-->
                <a href="index.php">
                    <div class="logo">
                        <h1>Meow-itel</h1>
                    </div>
                </a>
                <div>
                    <ul class="nav-links">
                        <?php
                            /** Check if user authorized to allow him adding posts */
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
                            /** Check if user authorized to show his profile */
                            echo "<li>";
                            if (isset($_SESSION["is_authorized"]) && $_SESSION["is_authorized"] == 1){
                                echo "<a href='profile.php'>Profile</a>";
                                echo "</li>";
                                echo "<li>";
                                echo "<a href='logout.php'>Log out</a>";
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
                    <!-- Category navigation -->
                    <ul class="category-links">
                        <?php
                            /** Request for active categories */
                            include 'categorymenu.php';
                        ?>
                    </ul>
                </div>
                <?php
                    include 'post-information.php';
                ?>
            </div>
        </div>
        <div class="footer">
            <!-- Footer -->
            <footer class="footer-h"> 
                <div>
                    <a href="https://github.com/LebedevIurii/zwa" target="_blank" rel="noopener noreferrer"><i class="fab fa-github-alt fa-2x"></i></a>
                    <a href="#" target="_blank" rel="noopener noreferrer"><i class="fas fa-question-circle fa-2x"></i></a>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>