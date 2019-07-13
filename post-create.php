<?php
  session_start();

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


  <script>
    function showAlert(){
      alert('Logout Berhasil');
      document.location.href = 'index.php';
    }
  </script>

</head>

<body>

  <div class="d-flex" id="wrapper">
    <div class="border-right" id="sidebar-wrapper" style="background: url(assets/img/bg-dashboard-sidebar.jpg);">
      <div class="sidebar-heading border-bottom bg-light"><img src="assets/img/logofindjobbacaan.png"></div>
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
    <div id="page-content-wrapper" style="background-image: url(assets/img/logo-find-job-dash.png) !important;
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
        <div class="col-md-8" id="post-create">
          <div class="card">
            <div class="card-header">Create Post Vacancy</div>
            <div class="card-body">
                <form>
                    <div class="form form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title Post" autocomplete="off"><br>
                        <input type="text" class="form-control" id="company" name="company" placeholder="Company Name" autocomplete="off"><br>
                        <input type="text" class="form-control" id="location" name="location" placeholder="Location" autocomplete="off"><br>
                        <input type="text" class="form-control" id="gaji" name="gaji" placeholder="Rp..." autocomplete="off"><br>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control" placeholder="Write Something...."></textarea>
                        <button type="button" class="btn btn-primary" name="post" id="post"><i class="fa fa-share-square"></i> Post</button><br>
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
  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
   <script>
    $(document).ready(function(e) {
        e.preventDefault;
        $('#post').click(function() {
          var getPost = 1;
          var getTitle = $('#title').val();
          var getCompany = $('#company').val();
          var getLocation = $('#location').val();
          var getGaji = $('#gaji').val();
          var getContent = $('#content').val();


          $.post({
            url: '/proses_post.php',
            data: {title : getTitle,
                    company : getCompany,
                    location : getLocation,
                    gaji: getGaji,
                    content : getContent,
                    post: getPost},
            success: function(result){
              console.log(result);
            }
          });

        });
    });
  </script>

</body>
</html>