<?php
session_start();

unset($_SESSION['email']);
unset($_SESSION['id']);

session_destroy();

require_once('../function/redirectIfGuest.php');
?>