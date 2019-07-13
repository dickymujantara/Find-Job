<?php 
    session_start();
    include 'config.php';

    $id = $_GET['id'];
    $delete = "DELETE FROM data_cv WHERE id = $id";
    
    $hapus = mysqli_query($conn,$delete);

    header("location: /message.php");


?>