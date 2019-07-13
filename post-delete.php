<?php
    session_start();

    $idpost = $_GET['id'];

    include 'config.php';
    $sql = "DELETE FROM post_vacancy WHERE id = $idpost";
    $delete = mysqli_query($conn,$sql);
    echo "<script>
        document.location.href = 'post.php';
    </script>";

?>