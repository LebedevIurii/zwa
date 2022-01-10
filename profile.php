<?php
    include 'connectioncheck.php';
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meow-itel User page</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="icon" href="favicon.ico">
</head>
<body>
    <div class="main-container">
        <div class="header">
            <!--Nav bar-->
            <nav class="nav">
                <a href="index.php">
                    <div class="logo">
                        <h1>Meow-itel</h1>
                    </div>
                </a>
                <div>
                    <ul class="nav-links">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="profile-content">
            <div class="user-field">
                <!-- Profile field -->
                <div class="title profile">
                    Uživatelcký profil
                </div>
                <div class="avatar-image">
                    <img src="imgs/user.png" alt="avatar">
                </div>
                <div class="profile-info">
                    <?php
                        include 'profile-information.php'
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>