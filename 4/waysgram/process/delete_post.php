<?php
require_once('../function/redirectIfGuest.php');
require_once('../config/database.php');

$query = $conn->query("DELETE FROM posts_tb WHERE id = '$_GET[id_post]'");

if (!$query) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

header("location:\index.php?message=post_success");
?>