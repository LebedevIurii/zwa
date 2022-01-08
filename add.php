<?php
    include 'connectioncheck.php';
    $err = [];
    $path = "";
    if (isset($_POST['submit'])) {
        $title = htmlspecialchars($_POST['title']);
        $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
        $target_dir = "imgs/";
        $target_file = basename($_FILES['image']['name']);
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
        echo $userName;
        if ($err == []){
            mysqli_query($db, "INSERT INTO `Posts` (`title`, `category`, `price`, `image`, `userId`, `text`) VALUES('$title', '$category', '$price', '$path', '$userName', '$discription')");
            mysqli_close($db);
            echo '<meta http-equiv="refresh" content="0; URL= /~lebediur/index.php">';
        }
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
                            <li>
                                <a href="login.php">Profile</a>
                            </li>
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
                                    <input type="text" name="title" id="ad-name" required>
                                </div>
                                <div class="field">
                                    <label for="category">Vybérte categorii:*</label>
                                    <select name="category" id="category">
                                        <option value="">Select a category...</option>
                                        <option value="Auto">Auto</option>
                                        <option value="Animals">Animals</option>
                                        <option value="Home and Garden">Home and Garden</option>
                                        <option value="Electronics">Electronics</option>
                                        <option value="Buisness & Services">Business & Services</option>
                                        <option value="Fashion & Style">Fashion & Style</option>
                                    </select>
                                </div>
                                <div class="image-field">
                                    <label for="ad-image">Foto:</label>
                                    <input type="file" name="image" id="ad-image">
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
                                    <input type="number" name="price" id="ad-price" required>
                                </div>
                                <div class="discription-field field">
                                    <label for="ad-discription">Popis:*</label>
                                    <textarea name="discription" id="ad-discription" cols="120" rows="1" required></textarea>
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