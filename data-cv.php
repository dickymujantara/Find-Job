<?php
    session_start();
    include 'config.php';

    $sql = "SELECT * FROM data_cv";
    $hasil = mysqli_query($conn,$sql);
    $datas = mysqli_fetch_array($hasil);
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
          <i class="fa fa-file-alt"></i>&nbsp; Data CV
        </div>
        <div class="card-body">
            <table class="table table-inbox table-hover">
            <tr>
                <th class="inbox-small-cells">Vacancy</th>
                <th class="inbox-small-cells">Company</th>
                <th class="inbox-small-cells">Location</th>
                <th class="inbox-small-cells">Status CV</th>
                <th class="inbox-small-cells">Action</th>
            </tr>
            <?php
            if (is_array($hasil) || is_object($hasil) ) {
                
                foreach ($hasil as $value) {
                    $data = explode(",", $value['data_combine']);
                    $title = $data[0];
                    $company = $data[1];
                    $location = $data[2];
                    $status = $value['status_cv'];
                ?>
                <tr>
                    <td class="inbox-small-cells"><?= $title ?></td>
                    <td class="inbox-small-cells"><?= $company ?></td>
                    <td class="inbox-small-cells"><?= $location ?></td>
                    <td class="inbox-small-cells">
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
                    </td>
                    <td>
                        <a href="/data-cv-view.php?id=<?=$value['id']?>"><button class="btn btn-light btn-sm">
                        <i class="fa fa-eye"></i></button></a>
                    </td>
                </tr>
                <?php
                }
            }
            ?>
            </table>
        </div>
      </div>
        
      </section>
  </body>
</html>