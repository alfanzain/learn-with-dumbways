<?php
session_start();

// unset($_SESSION['email']);
// unset($_SESSION['id']);

if (!isset($_SESSION['email'])){
    header("Location: /login.php");
}
?>