<?php
    include 'connectioncheck.php';
    if (isset($_SESSION["is_authorized"]) && ($_SESSION["is_authorized"] == 1)){
        $err = [];
        $err_mysql = ""; 
        $path = "";
        if (isset($_POST['submit'])) {
            $title = htmlspecialchars($_POST['title']);
            $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
            $target_dir = "imgs/";
            $date = date_create();
            $time = strval(date_timestamp_get($date));
            $hash_file = hash("md5", $time);
            $target_file = $hash_file . basename($_FILES['image']['name']);
            if ($target_file != null){
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_dir. $target_file,PATHINFO_EXTENSION));
                if (file_exists("$target_dir"."$target_file")) {
                    $err[] = "Takovy file jiz existuje.";
                    $uploadOk = 0;
                }
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    $err[] = "Pardon, jen JPG, JPEG, PNG & GIF jsou povolena.";
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                    $err[] = "File nemuze byt pridan.";
                } else {
                    if(move_uploaded_file($_FILES['image']['tmp_name'], "$target_dir"."$target_file")){
                        $path = "$target_dir"."$target_file";
                    }
                }
            }
            $price = htmlspecialchars($_POST['price']);
            
            $discription = htmlspecialchars($_POST['discription']);
            $userName = $_SESSION["user_name"];
            if ($err == []){
                $query =  "INSERT INTO `Posts` (`title`, `category`, `price`, `image`, `userId`, `text`) VALUES('$title', '$category', '$price', '$path', '$userName', '$discription')";
                mysqli_query($db, $query);
                $err_mysql = mysqli_error($db);
                mysqli_close($db);
                if ($err_mysql == ""){
                    echo '<meta http-equiv="refresh" content="0; URL= /~lebediur/index.php">';
                    exit();
                } 
            }
        } else{
            $title = "";
            $price = "";
            $discription = "";
        }
    } else{
        echo '<meta http-equiv="refresh" content="0; URL= /~lebediur/index.php">';
        exit();
    }
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
                </nav>
            </div>
            <div class="content">
                <div class="main">
                    <div class="add-post-field">
                        <div class="form-inner">
                            <form action="add.php" class="ad" method="post" enctype="multipart/form-data">
                                <div class="field">
                                    <label for="ad-name">Název:*</label>
                                    <input type="text" name="title" id="ad-name" pattern="[A-Za-z0-9@.,+_-=\/!#%^$*(^)|~]{1,}"value="<?php echo $title; ?>" required>
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
                                    <input type="number" name="price" id="ad-price" value="<?php echo $price; ?>" required>
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
                        <a href="https://github.com/LebedevIurii/zwa">Open source</a>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>