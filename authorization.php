<?php

    $db = mysqli_connect('remotemysql.com', 'XEgCxHe4mC', 'ON0JjIMn1k', 'XEgCxHe4mC');
    $error = "";
    /** Waiting clicking on submit buttons */
    if (isset($_POST['submit'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $login_check = mysqli_query($db, "SELECT * FROM `Users` WHERE `email` = '$email'");
        /** Checking if this login exist in database */
        if ($login_check == FALSE){
            $error = "Takovy uzivatel neexistuje. Zkuste znovu.";
        } else {
            $found_user = mysqli_fetch_array($login_check);
            $ps = password_verify($password, $found_user["password"]);
            /** Checking if user may be authorized */
            if ($ps == 1){
                /** Assigning appropriate values to user attributes */
                $_SESSION["user_name"] = $email;
                $_SESSION["is_authorized"] = 1;
                echo '<meta http-equiv="refresh" content="0; URL= /~lebediur/index.php">';
                exit();
            }
        }
    }else{
        $email = "";
    }
?>