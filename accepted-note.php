<?php
    $id = $_GET['id'];
    include 'config.php';
    $sql = "SELECT FROM data_cv WHERE id = $id ";
    $hasil = mysqli_query($conn,$sql);
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
                      <div class="inbox-body">
                          <div class="card">
                            <div class="card-header">Message View</div>
                            <div class="card-body">
                                <label for="messages">Note:</label>
                                    <form action="/proses_accepted.php" method="post">
                                        <div class="form form-group">
                                            <input type="hidden" name="id" value="<?= $id ?>">
                                            <textarea class="form-control" name="note" id="note" cols="10" rows="5"></textarea>
                                            <br>
                                            <button class="btn btn-secondary" type="button" onclick="document.location.href = '/message.php'"><i class="fa fa-long-arrow-alt-left"></i>&nbsp; Back</button>
                                            <button class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp; Accepted</button>
                                        </div>
                                    </form>
                                </div>
                                <br>
                            </div>
                          </div>
                      </div>
                  </aside>
              </div>
</div>
</body>
</html>