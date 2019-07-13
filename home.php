<?php

  session_start();
  include('config.php');

  $name = $_SESSION['user'];

  $sql = "SELECT * FROM post_vacancy ORDER BY id DESC";
  $datas = mysqli_query($conn,$sql)

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/stylehome.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/fontawesome/css/all.css">
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
  <script>
    function showAlert(){
      alert('Logout Berhasil');
      document.location.href = '/proses_logout.php';
    }
  </script>
</head>
  <body style = "background-image: url('assets/img/bg-home-fj.jpg');
    height: 700px;
    background-position: center;
    background-repeat: repeat-y;
    background-size: cover;">
    <nav class="navbar navbar-expand-lg bg-info" >
    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
      <ul class="navbar-nav mr-auto" >
        <li class="nav-item" >
          <a class="nav-link" href="/home.php" style="color:white !important;" >Beranda</a>
        </li>
        <li class="nav-item" >
          <a class="nav-link" href="/data-cv.php" style="color:white !important;" >Data CV</a>
        </li>
        <li class="nav-item">
          <a class="nav-link "onclick="showAlert()" style="color:white;">Logout</a>
        </li>
      </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="nav-item"><a class="nav-link" href="#" style="color:white !important;" ><?= $name ?></a></li>
        <li class="nav-item"><a class="nav-link" href="#"><img src="/assets/img/userr.png" width="30"></a></li>
    </ul>
    </div>
  </nav>
    <nav class="navbar navbar2 bg-light">
      <a class="navbar-brand" href="#">
      <img src="userr.png" width="80" height="30" alt="">
    </a>
    </nav>
  </nav>
    <div class="col-md-3" id="sidebar">
        <div class="card">
          <div class="card-header">
            Pilih Kriteria
          </div>
          <div class="card-body">
            <form action="/search.php" method="GET">
              <input type="text" name="keyword" class="form-control" id="keywordInput" aria-describedby="keyword" placeholder="Search By Post Title"><br>
              <input type="text" name="location" class="form-control" id="keywordInput" aria-describedby="keyword" placeholder="Search By Location"><br>
              <button type="submit" class="btn btn-info btn-lg btn-block" name="search">Search</button>
            </form>
          </div>
        </div>
      </div>
      <section class="col-md-7">
        <?php
          if (is_array($datas) || is_object($datas) ) {
            
            foreach ($datas as $data) {
              $id = $data['id'];
              $title = $data['post_title'];
              $company = $data['company_name'];
              $location = $data['location'];
              $content = $data['post_content'];
              $gaji = $data['gaji'];
              
            ?>
            <div class='card' id='post'>
                <div class='card-body'>
                  <h5 class='card-title'><?=$title?></h5>
                  <h6 class='card-subtitle mb-2 text-muted'><?=$company?></h6>
                  <h6 class='card-subtitle mb-3 text-muted'><i class="fa fa-map-marker-alt"></i>&nbsp; <a href="https://www.google.com/maps/place/<?=$location?>"> 
                    <?=$location?></a></h6>
                  <p class="card-text">Rp.<?= $gaji ?></p>
                  <p class='card-text'><?=$content?></p>
                  <a href='home-post-view.php?id=<?=$id?>' class='card-link' name="id">View More</a>
                </div>
              </div>
              <?php
            }
          }
        ?>
        
      </section>
  </body>
</html>