<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session only if it's not already active
}


session_destroy();



echo "<script> window.open('login.php?logged_out=You have logged out ..!','_self') </script>";







?>      



