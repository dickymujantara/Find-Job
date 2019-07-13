<?php
    session_start();
    if (isset($_POST['submit'])) {
        
    //passing value
    $getId = $_POST['idPost'];
    $postTitle = $_POST['post_title'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $gaji = $_POST['gaji'];
    $content = $_POST['content'];

    $dataPosting = array($postTitle,$company,$location,$gaji,$content);
    $combineData = implode(",",$dataPosting);

    //input value
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $messages = $_POST['message'];
    $experience = $_POST['experience'];
    

    $photo = $_FILES['photo'];

    $fileName = $_FILES['photo']['name'];
    $fileTmpName = $_FILES['photo']['tmp_name'];
    $fileSize = $_FILES['photo']['size'];
    $fileError = $_FILES['photo']['error'];
    $fileType = $_FILES['photo']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    // extension allowed
    $allowed = array('jpg','jpeg','png','pdf');

    if (in_array($fileActualExt,$allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 500000) {
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);

                include 'config.php';

                $sql = "INSERT INTO data_cv (data_combine, nama, email, phone, address,messages,
                    experience, photo,status_cv) VALUES ('$combineData', '$nama', '$email', 
                    '$phone', '$address', '$messages','$experience', '$fileDestination','Waiting')";

                $data = mysqli_query($conn,$sql);

                    if ($data === TRUE) {
                        echo "<script>
                                    document.location.href = 'home-post-view.php?id=$getId';
                                </script>";
                    }else{
                        echo "Error: " . $data . "<br>" . $conn->error;
                    }

                    $conn->close();
            }else{
                echo "Your File Is too Big!";
            }
        }else{
            echo "Something error when uploading!";
        }
    }else{
        echo "Image file must be jpg,jpeg,png,pdf";
    }
    // die();
    
    }else {
        header('location:/home');
    }


    

?>