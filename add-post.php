<?php
    $db = mysqli_connect('remotemysql.com', 'XEgCxHe4mC', 'ON0JjIMn1k', 'XEgCxHe4mC'); 
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (isset($_SESSION["is_authorized"]) && ($_SESSION["is_authorized"] != 1)){
        echo '<meta http-equiv="refresh" content="0; URL= /~lebediur/index.php">';
        exit();
    } else{
        $err = [];
        $err_mysql = ""; 
        $path = "";
        $title = "";
        $price = "";
        $discription = "";
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
        }
    }
?>