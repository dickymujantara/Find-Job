<?php
    $id = $_POST['id'];
    $status = "Accepted";
    $note = $_POST['note'];

    // echo $id;
    // $select = "SELECT * FROM data_cv where id = $id";
    include 'config.php';
    // $datas = mysqli_query($conn,$select);
    // echo json_encode($datas);
    $sql = "UPDATE data_cv SET status_cv = '$status', note = '$note' WHERE id = $id ";
    $data = mysqli_query($conn,$sql);

    if (mysqli_affected_rows($conn) > 0) {
        // echo "Berhasil";
        header('location: /message.php');
    }else{
        echo "gagal";
    }
?>