<?php
  session_start();

    // if (isset($_POST['post'])) {
        $title = $_POST['title'];
        $company = $_POST['company'];
        $location = $_POST['location'];
        $content = $_POST['content'];
        $gaji = $_POST['gaji'];
        // $latlong    =   get_lat_long($location);
        // $map        =   explode(' ' ,$latlong);
        // $mapLat     =   $map[0];
        // $mapLong    =   $map[1]; 

        createPost($title,$company,$location,$content,$gaji);

        $result = [$title,$company,$location,$content,$gaji]; 

        echo json_encode($result);

    // }


    function createPost($title,$company,$location,$content,$gaji){
        include('config.php');
        
        //  if ($mapLat = "" || $mapLong = "") {
        //      echo "get location belum dapat";
        //      die();
        //  }else{
            $sql = "INSERT INTO post_vacancy (post_title, company_name,location,post_content,gaji)
            VALUES ('$title', '$company', '$location','$content','$gaji')";
    
            $data = mysqli_query($conn,$sql);
    
                if ($data === TRUE) {
                    echo "<script>
                        document.location.href = 'post.php';
                    </script>";
                } else {
                    echo "Error: " . $data . "<br>" . $conn->error;
                }
    
            $conn->close();    
         }
    
        
    

    function get_lat_long($location){

        $location = str_replace(" ", "+", $location);
    
        $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$location&sensor=false&region=$location");
        $jsonDecode = (array) json_decode($json,true);
    
        $lat = $jsonDecode['results'][0]['geometry']['location']['lat'];
        $long = $jsonDecode['results'][0]['geometry']['location']['lng'];
        $data = $lat." ".$long;
        return $data;
    }

?>