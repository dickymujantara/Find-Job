<?php
    include "config.php";

    if (!isset($_POST['id'])) {
        echo '{"status": "Error", "Message": "ID Required"}';
        exit();
    }

    $id = $_POST['id'];
    $title = $_POST['title'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $gaji = $_POST['gaji'];
    $content = $_POST['content'];

    $sql = "UPDATE post_vacancy SET post_title = '$title', company_name = $company, 
    location = $location, gaji = $gaji, post_content = $content WHERE id = $id";

    // echo $sql;

    if (mysqli_query($conn, $sql)) {
        echo '{"Status" : "Success"}';
    }else {
        echo '{"Status" : "Failed", "Messages" : '. mysqli_error($conn).'}';
    }


?>