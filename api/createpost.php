<?php
    include "config.php";

    if (!isset($_POST['title']) || !isset($_POST['company']) || !isset($_POST['location']) || !isset($_POST['gaji']) 
    || !isset($_POST['content'])) {
        echo '{"status": "Error", "Message": "All Field Required"}';
        exit();
    }

    $title = $_POST['title'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $gaji = $_POST['gaji'];
    $content = $_POST['content'];

    $sql = "INSERT INTO post_vacancy VALUES(NULL, '$title', '$company', '$location', '$gaji', '$content')";

    if (mysqli_query($conn, $sql)) {
        echo '{"Status" : "Success", "Post ID" : '. mysqli_insert_id($conn).'}';
    }else {
        echo '{"Status" : "Failed", "Messages" : '. mysqli_error($conn).'}';
    }


?>