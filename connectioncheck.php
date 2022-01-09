<?php
    $db = mysqli_connect('remotemysql.com', 'XEgCxHe4mC', 'ON0JjIMn1k', 'XEgCxHe4mC'); 
    if (! $db) {  
        //"Connection failed" . mysqli_connect_error());  
    }  
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
?> 