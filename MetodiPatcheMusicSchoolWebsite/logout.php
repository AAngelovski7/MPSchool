<?php

session_start();

if(isset($_POST['logOutButton'])){
    unset($_SESSION['username']);
    unset($_SESSION['admin']);
    unset($_SESSION['success']);
    $_SESSION['logout'] = "You logout succesfully";
    header('Location: index.php');
}
?>