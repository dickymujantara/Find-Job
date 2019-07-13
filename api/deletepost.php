<?php
    include "config.php";

    if (!isset($_POST['id'])) {
        echo '{"status": "Error", "Message": "ID Required"}';
        exit();
    }

    $id = $_POST['id'];

    $sql = "DELETE FROM post_vacancy WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo '{"Status" : "Success"}';
        }else{
            echo '{"Status" : "Error","Messages" : "No Word corresponding ID."}';
        }
    }else {
        echo '{"Status" : "Failed", "Messages" : '. mysqli_error($conn).'}';
    }


?>