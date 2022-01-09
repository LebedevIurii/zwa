<?php
    include 'add-post.php';
?>

<!DOCTYPE html>
<html lang="cs">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Meow-itel adding post</title>
        <link rel="stylesheet" href="styles/styles.css">
        <link rel="icon" href="favicon.ico">
        <script src="https://kit.fontawesome.com/205095dac4.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="main-container">
            <div class="header">
                <div class="nav">
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
                            <?php
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
                </div>
            </div>
            <div class="content">
                <div class="main">
                    <div class="add-post-field">
                        <div class="form-inner">
                            <form action="add.php" class="ad" method="post" enctype="multipart/form-data">
                                <div class="field">
                                    <label for="ad-name">Název:*</label>
                                    <input type="text" name="title" id="ad-name" pattern="[A-Za-z0-9@.,+_-=\/!#%^$*(^)|~]{1,}" value="<?php if(isset($title)){ echo $title; } ?>" required>
                                </div>
                                <div class="field">
                                    <label for="category">Vybérte categorii:*</label>
                                    <select name="category" id="category">
                                        <option value="">Select a category...</option>
                                        <?php
                                            $db = mysqli_connect('remotemysql.com', 'XEgCxHe4mC', 'ON0JjIMn1k', 'XEgCxHe4mC');
                                            $categories = mysqli_query($db, "SELECT * FROM `Categories` WHERE `isActive`= 1");
                                            while($category = mysqli_fetch_array($categories)){
                                                echo "<option value=".$category['name'].">".$category['name']."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="image-field">
                                    <label for="ad-image">Foto:</label>
                                    <input type="file" name="image" id="ad-image" required>
                                    <?php
                                        if($err != []){
                                            foreach($err as $error)
                                            {
                                              echo $error;
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="field">
                                    <label for="ad-price">Cena:*</label>
                                    <input type="number" name="price" id="ad-price" value="<?php if(isset($price)){ echo $price; } ?>" required>
                                </div>
                                <div class="discription-field field">
                                    <label for="ad-discription">Popis:*</label>
                                    <textarea name="discription" id="ad-discription" cols="120" rows="1" required><?php echo $discription; ?></textarea>
                                </div>
                                <div class="btn field">
                                    <div class="btn-layer"></div>
                                    <label for="submit"></label>
                                    <input type="submit" id="submit" name="submit" value="Zveřejnit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <footer class="footer-h"> 
                    <div>
                        <a href="https://github.com/LebedevIurii/zwa" target="_blank" rel="noopener noreferrer"><i class="fab fa-github-alt fa-2x"></i></a>
                        <a href="dokumentace/dokumentace_lebediur.pdf" target="_blank" rel="noopener noreferrer"><i class="fas fa-question-circle fa-2x"></i></a>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>