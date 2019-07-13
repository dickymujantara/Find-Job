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
	<title></title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link href="assets/css/stylemessage.css" rel="stylesheet">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" type="text/css" href="assets/css/styledashboard.css">
  <link href="assets/css/simple-sidebar.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets/fontawesome/css/all.css">
  <style>
    #button{
      margin-left: 728px;
    }
  </style>
<script src="assets/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
    #message,#status{
        display:inline-block;
    }
    #status{
        margin-left:820px;
    }
  </style>
</head>
<body>

<!------ Include the above in your HEAD tag ---------->
<div class="d-flex" id="wrapper">
    <div class="border-right" id="sidebar-wrapper" style="background: url(assets/img/bg-dashboard-sidebar.jpg);">
    <a href="dashboard.php"><div class="sidebar-heading border-bottom bg-light"><img src="assets/img/logofindjobbacaan.png"></div></a>
      <div class="list-group list-group-flush" style="opacity: 0.8";>
        <a href="dashboard.php" class="list-group-item list-group-item-action "><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a>
        <a href="message.php" class="list-group-item list-group-item-action active"><i class="fas fa-envelope"></i>&nbsp; Message</a>
        <a href="post.php" class="list-group-item list-group-item-action"><i class="fas fa-clipboard"></i> Post</a>
        <a href="companyprofile.php" class="list-group-item list-group-item-action "><i class="fas fa-user"></i> Profil</a>
        <a href="reset_password.php" class="list-group-item list-group-item-action"><i class="fas fa-cog"></i> Setting</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" class="content-dash" style="background-image: url(assets/img/logo-find-job-dash.png) !important;
  background-repeat: no-repeat;">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link"href="#"><i class="fa fa-bell"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="showAlert()">Logout</a>
            </li>
            <li class="nav-item">
              <a class="user nav-link" href="#"><i class="fas fa-user-circle"></i></a>
            </li>
            <li class="nav-item dropdown">
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
      <div class="col-md-8">
      
      </div>
                      <div class="inbox-body">
                          <div class="card">
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
                                <label for="from">From:</label>
                                <h6><?= $datas['nama'] ?></h6>
                                <div class="card-body">
                                <div id="button">
                                  <?php if ($status != "Waiting") {?>
                                  <?php
                                  }else { ?>
                                    <a href="/accepted-note.php?id=<?= $datas['id']?>"><button class="btn btn-success" type="button"><i class="fa fa-check"></i>&nbsp; Accepted</button></a>
                                    <a href="/proses_reject.php?id=<?= $datas['id']?>"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i>&nbsp; Rejected</button></a>
                                  <?php
                                    } ?>
                                </div>
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
                                            <span>Experiece: </span>
                                            <p><?= $datas['experience']; ?></p>
                                            <span>Photo: </span><br>
                                            <img src="/<?= $datas['photo']; ?>" width='300' height='400'>
                                          </div>
                                    </div>
                                    <br>
                                    <div class="jumbotron">
                                        <h4><?= $data[0] ?></h4>
                                        <h6><?= $data[1] ?></h6>
                                        <i class="fa fa-map-marker-alt"></i>&nbsp; Location: <?= $data[2]?>
                                        <br>
                                        <div style="width: 100%"><iframe width="100%" height="300" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=<?=$data[2]?>&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/map-my-route/">Create a route on google maps</a></iframe></div><br />
                                        <h6>Salary:Rp.<?= $data[3] ?> </h6>
                                        <h5>Description: </h5>
                                        <p><?= $data[4] ?></p>
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-secondary" type="button" onclick="document.location.href = '/message.php'"><i class="fa fa-long-arrow-alt-left"></i>&nbsp; Back</button>
                            </div>
                          </div>
                      </div>
                  </aside>
              </div>
</div>
</body>
</html>