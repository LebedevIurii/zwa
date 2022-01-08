<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meow-itel post page</title>
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
                        <li class="add">
                            <a href="add.php">Add Post</a>
                        </li>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="#">Themes</a>
                        </li>
                        <li>
                            <a href="login.php">Profile</a>
                        </li>
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
                <div class="post-field">
                    <div class="title-price">
                        <div class="post-part">
                            Canon 400D + příslušenství
                        </div>
                        <div class="price post-part">
                            <span>
                                Cena:
                            </span>
                            <span>
                                3000Kč
                            </span>
                        </div>
                    </div>
                    <div class="post-img">
                        <img src="imgs/Canon400D.jpg" alt="Photo">
                    </div>
                    <div class="post-info">
                        <div class="description">
                            Prodám plně funkční Canon 400D + příslušenství. 4x baterie (2x originální baterie Canon Li-ion , 2x neoriginální baterie), sluneční clona JJC lens hood for 60C, paměťová karta 2GB, objektiv EFS 18-55mm.
                        </div>
                        <div class="contact">
                            <div class="name">
                                <span class="manual">Jmeno:</span>
                                <span class="manual"></span>
                            </div>
                        </div>
                    </div>
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