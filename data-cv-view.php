<?php
    session_start();

    $id = $_GET['id'];

    include 'config.php';

    $sql = "SELECT * FROM data_cv WHERE id = $id";
    $hasil = mysqli_query($conn,$sql);
    $datas = mysqli_fetch_array($hasil);
    $status = $datas['status_cv'];
    $data = explode(",", $datas['data_combine']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Data CV</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/stylehome.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/fontawesome/css/all.css">
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
  <script>
    function showAlert(){
      alert('Logout Berhasil');
      document.location.href = '/index.php';
    }
  </script>
  <style>
    #message,#status{
        display:inline-block;
    }
    #status{
        margin-left:520px;
    }
  </style>
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
      <div class="card" id="post">
                            <div class="card-header">
                            <div id="message">
                                Message View
                            </div>
                            <div id="status">
                                <?php if($status == "Waiting"){?>
                                    <span class="badge badge-secondary">Waiting</span>
                                <?php
                                }elseif($status == "Accepted"){?>
                                    <span class="badge badge-success">Accepted</span>
                                <?php
                                }elseif ($status == "Rejected") {?>
                                    <span class="badge badge-danger">Rejected</span>
                                <?php    
                                }
                                ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <label for="messages">Message:</label>
                                    <p><?= $datas['messages'] ?></p>
                                    <div class="card">
                                          <div class="card-header">
                                            Curriculum Vitae
                                          </div>
                                          <div class="card-body">
                                            <span>Nama: </span>
                                            <p><?= $datas['nama']; ?></p>
                                            <span>Email: </span>
                                            <p><?= $datas['email']; ?></p>
                                            <span>Phone Number: </span>
                                            <p><?= $datas['phone']; ?></p>
                                            <span>Address: </span>
                                            <p><?= $datas['address']; ?></p>
                                            <span>Experience: </span>
                                            <p><?= $datas['experience']; ?></p>
                                            <span>Photo: </span><br>
                                            <img src="/<?= $datas['photo']; ?>" width='300' height='400'>
                                    </div>
                                </div>
                                <br>
                                <?php if ($datas['note'] != "") {?> 
                                <div class="card">
                                    <div class="card-body">
                                           
                                            <span>Note: </span>
                                            <p><?= $datas['note']; ?></p>
                                    
                                        </div>
                                </div>
                                <?php
                                    } ?>
                                <br>
                                <button class="btn btn-secondary" type="button" onclick="document.location.href = '/home.php'"><i class="fa fa-long-arrow-alt-left"></i>&nbsp; Back</button>
                            </div>
                          </div>
      </div>
        
      </section>
  </body>
</html>