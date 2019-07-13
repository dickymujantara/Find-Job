<?php
    session_start();
    include 'config.php';
    $title = $_GET['keyword'];
    $location = $_GET['location'];

    $data = array($title,$location);

    if ($title != "") {
        $search = "SELECT * FROM post_vacancy WHERE post_title = '$title'";
    }elseif ($location != "") {
        $search = "SELECT * FROM post_vacancy WHERE location = '$location'";
    }else{
      $search = "SELECT * FROM post_vacancy WHERE location = '$location' , post_title = '$title'";
    }
    
    $hasil = mysqli_query($conn,$search);
    $datas = mysqli_fetch_array($hasil);
    

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="assets/css/stylehome.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/fontawesome/css/all.css">
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
  <script>
    function showAlert(){
      alert('Logout Berhasil');
      document.location.href = 'index.php';
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
        <li class="nav-item"><a class="nav-link" href="#" style="color:white !important;" >Username</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><img src="assets/img/userr.png" width="30"></a></li>
    </ul>
    </div>
  </nav>
    <nav class="navbar navbar2 navbar-light bg-light ">
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
        <input type="text" class="form-control" id="keywordInput" name="title" aria-describedby="keyword" placeholder="Keyword"><br>
        <input type="text" class="form-control" id="keywordInput" name="location" aria-describedby="keyword" placeholder="Filter Lokasi"><br>
        <button type="submit" class="btn btn-info btn-lg btn-block">Search</button>
        </form>
      </div>
    </div>
  </div>
  <section class="col-md-7">
      <div class="card" id="post">
        <div class="card-body">
          <h4><?= $datas[1] ?></h4>
          <h6><?= $datas[3]; ?></h6>
          <i class="fa fa-map-marker-alt"></i>&nbsp; Location: <?= $datas[4];?>
          <br>
          <div style="width: 100%"><iframe width="100%" height="300" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=<?=$datas[4]?>&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/map-my-route/">Create a route on google maps</a></iframe></div><br />
          <h6>Salary:Rp.<?= $datas[7]; ?> </h6>
          <h5>Description: </h5>
          <p><?= $datas[8]; ?></p>
        </div>
        <div class="card-body">
          <a href="home-sent-cv.php/?id=<?=$data['id']?>"><button class="btn btn-primary"><i class="fa fa-file-signature"></i>&nbsp; Send CV</button></a>
        </div>
      </div>
  </section>
  </body>
</html>