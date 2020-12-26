<?php
require_once('../function/redirectIfGuest.php');

$limitSize = 10 * 1024 * 1024;
$extension =  array('png','jpg','jpeg','gif');
 
$fileName = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];
$fileType = pathinfo($fileName, PATHINFO_EXTENSION);
$fileSize = $_FILES['image']['size'];

if($fileSize > $limitSize){
    header("location:\index.php?message=post_failed&error=size_too_big");		
} else {
    if(!in_array($fileType, $extension)){
        header("location:\index.php?message=post_failed&error=extension_unacceptable");		
    }else{
        require_once('../config/database.php');

        $fileName = date('d-m-Y').'-'.$fileName;
        move_uploaded_file($tmp, '../posts/img/' . $fileName);

        $query = $conn->query("INSERT INTO posts_tb VALUES(NULL, '$_POST[content]', '$fileName', '$_SESSION[id]')");

        if (!$query) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }

        header("location:\index.php?message=post_success");
    }
}
?>