<?php
    $db = mysqli_connect('remotemysql.com', 'XEgCxHe4mC', 'ON0JjIMn1k', 'XEgCxHe4mC');
    $url = parse_url("{$_SERVER['REQUEST_URI']}", PHP_URL_QUERY);
    parse_str($url, $arguments);
    if (isset($arguments["email"])){
        $email = $arguments["email"];
        $query = mysqli_query($db, "SELECT * FROM Users WHERE `email`='".mysqli_real_escape_string($db, $email)."'");
        if ($query != false){
            $users = mysqli_fetch_array($query);
            if ($users['email'] != "" && $users['email'] == $email){
                echo true;
            }
        }
        echo false;
    } else {
        echo false;
    }

?>