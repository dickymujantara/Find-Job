<?php
  session_start();
  if (isset($_GET['id'])) {
    include('config.php');

    $id = $_GET['id'];

    $sql = "SELECT * FROM post_vacancy WHERE id = $id";
    $hasil = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($hasil);
  }else {
    echo "<script>
      document.location.href = 'post.php';
    </script>";
  }
  

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FindJob</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/styledashboard.css">
  <link rel="stylesheet" type="text/css" href="assets/css/stylepost.css">

  <!-- Custom styles for this template -->
  <link href="assets/css/simple-sidebar.css" rel="stylesheet">

  <link rel="stylesheet" href="/assets/fontawesome/css/all.css">

  <script>
    function showAlert(){
      alert('Logout Berhasil');
      document.location.href = 'index.php';
    }
    function addNew(){
      document.location.href = 'post-create.php';
    }
  </script>

</head>

<body>

  <div class="d-flex" id="wrapper">
  <div class="border-right" id="sidebar-wrapper" style="background: url(assets/img/bg-dashboard-sidebar.jpg);">
    <a href="dashboard.php"><div class="sidebar-heading border-bottom bg-light"><img src="assets/img/logofindjobbacaan.png"></div></a>
      <div class="list-group list-group-flush" style="opacity: 0.8";>
        <a href="dashboard.php" class="list-group-item list-group-item-action "><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a>
        <a href="message.php" class="list-group-item list-group-item-action"><i class="fas fa-envelope"></i>&nbsp; Message</a>
        <a href="post.php" class="list-group-item list-group-item-action active"><i class="fas fa-clipboard"></i> Post</a>
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
        <div class="col-md-8" id="overview">
          <div class="card">
            <div class="card-header">Vacancy Post</div>
            <div class="card-body">
              <form action="proses_post_update.php" method="post">
                    <div class="form form-group">
                        <input type="hidden" value="<?= $data['id'] ?>">
                        <input type="text" class="form-control"  name="title" placeholder="Title Post" autocomplete="off" value="<?= $data['post_title'] ?>"><br>
                        <input type="text" class="form-control" name="company" placeholder="Company Name" autocomplete="off" value="<?= $data['company_name'] ?>"><br>
                        <input type="text" class="form-control" name="location" placeholder="Location" autocomplete="off" value="<?= $data['location'] ?>"><br>
                        <input type="text" class="form-control" name="gaji" placeholder="Rp..." autocomplete="off" value="<?= $data['gaji'] ?>"><br>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control" placeholder="Write Something...."><?= $data['post_content'] ?></textarea>
                        <button type="submit" class="btn btn-primary" name="update" id="post"><i class="fa fa-share-square"></i> Update</button><br>
                    </div>	
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
