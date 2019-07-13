<?php
    $id = $_GET['id'];

    include 'config.php';
    $select = "SELECT * FROM data_cv where id = $id";
    $datas = mysqli_query($conn,$select);
    echo json_encode($datas);
    // $sql = "UPDATE data_cv SET status_cv = 'Rejected' WHERE id = $id ";
    // $data = mysqli_query($conn,$sql);
    // header('location: /message.php');
?>