<?php
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $company = $_POST['company'];
        $location = $_POST['location'];
        $content = $_POST['content'];
        
        include 'config.php';
    
        $sql = "UPDATE SET post";
    }else {
        echo "<script>
            document.location.href = 'post.php';
        </script>";
    }
    
   
?>