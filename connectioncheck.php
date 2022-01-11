<?php
    /** Connect to database */
    $db = mysqli_connect('remotemysql.com', 'XEgCxHe4mC', 'ON0JjIMn1k', 'XEgCxHe4mC'); 
    if (! $db) {  
        echo "Connection failed" . mysqli_connect_error();  
    }  
    /** Starting new session or continue the last one */
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
?> 