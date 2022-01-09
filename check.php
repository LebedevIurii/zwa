<?php
    $db = mysqli_connect('remotemysql.com', 'XEgCxHe4mC', 'ON0JjIMn1k', 'XEgCxHe4mC');
    $err = [];
    
    if (isset($_POST['submit'])) {
        $login = htmlspecialchars($_POST['login']);
        $password = password_hash(htmlspecialchars(trim($_POST['password'])), PASSWORD_DEFAULT);
        $email = htmlspecialchars($_POST['email']);

        if(!preg_match("/^[a-zA-Z0-9]+$/",$login))
        {
            $err[] = "Jmeno musí se skladat jen z abcedy a čisel";
        }
    
        if(strlen($login) < 3 or strlen($login) > 30)
        {
            $err[] = "Jmeno musí mít alespoň 3 symboly";
        }
    
        $query = mysqli_query($db, "SELECT * FROM Users WHERE `login`='".mysqli_real_escape_string($db, $login)."'");

        if(mysqli_num_rows($query) != null)
        {
            $err[] = "Takový úživatel již exzistuje";
        }
        
        if(strlen($password) < 8)
        {
            $err[] = "Heslo musi obsahovat alespon 8 znaku";
        }

        if(count($err) == 0)
        {
            $db -> query("INSERT INTO `Users` (`login`, `password`, `email`) VALUES('$login', '$password', '$email')");
            $db -> close();

            echo '<meta http-equiv="refresh" content="0; URL= /~lebediur/index.php">';
        }
    } else{
        $email = "";
        $login = "";
    }

?>