<?php
  session_start();

  $getId = $_GET['id'];
  include 'config.php';
  $sql = "SELECT * FROM post_vacancy WHERE id = $getId ";
  $hasil = mysqli_query($conn,$sql);
  $data = mysqli_fetch_array($hasil);


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Form CV</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="/assets/css/stylehome.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/fontawesome/css/all.css">
	<script type="text/javascript" src="/assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
</head>
<body>
<body style = "background-image: url('/assets/img/bg-home-fj.jpg');
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
        <li class="nav-item"><a class="nav-link" href="#"><img src="/assets/img/userr.png" width="30"></a></li>
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
        <input type="text" class="form-control" id="keywordInput" aria-describedby="keyword" placeholder="Keyword"><br>
        <input type="text" class="form-control" id="keywordInput" aria-describedby="keyword" placeholder="Filter Lokasi"><br>
        <button type="submit" class="btn btn-info btn-lg btn-block">Search</button>
      </div>
    </div>
  </div>
  <section class="col-md-7">
  <form action="/proses_send_cv.php" method="post" enctype="multipart/form-data">
      <div class="card" id="post">
        <div class="card-body">
            <h3>Form CV</h3>
              <div class="form form-group">
              <input type="hidden" name="idPost" value="<?= $data['id'] ?>">
                <input type="hidden" name="post_title" value="<?= $data['post_title'] ?>">
                <input type="hidden" name="company" value="<?= $data['company_name'] ?>">
                <input type="hidden" name="location" value="<?= $data['location'] ?>">
                <input type="hidden" name="gaji" value="<?= $data['gaji'] ?>">
                <input type="hidden" name="content" value="<?= $data['post_content'] ?>">
                <label for="nama">Name:</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Your Fullname" autocomplete="off"><br>
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email" autocomplete="off"><br>
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" autocomplete="off"><br>
                <label for="addrees">Address:</label>
                <textarea name="address" id="address" cols="30" rows="5" class="form-control" placeholder="Enter Your Address"></textarea>
                <br>
                <label for="message">Messages:</label>
                <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Please Write Here..."></textarea>
                <br>
                <label for="experience">Experience:</label>
                <textarea name="experience" id="experience" cols="30" rows="10" class="form-control" placeholder="Enter Your Experience"></textarea>
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control">
              </div>	
            
        </div>
        <div class="card-body">
          <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-paper-plane"></i> Send CV</button>
        </div>
      </div>
      </form>
  </section>
</body>
</html>