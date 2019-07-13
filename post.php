<?php
  session_start();

  include('config.php');

  $sql = "SELECT * FROM post_vacancy";
  $datas = mysqli_query($conn,$sql)

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
        <div class="col-md-12" id="overview">
          <div class="card">
            <div class="card-header">Vacancy Post</div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
              <button class="btn btn-primary" id="add-new" onclick = "addNew()"><i class="fa fa-plus"></i> Add New</button>
                  <tr>
                      <th>No.</th>
                      <th>Company Name</th>
                      <th>Location</th>
                      <th>Post Title</th>
                      <th>Post Content</th>
                      <th>Salary</th>
                      <th>Action</th>
                  </tr>
                  
                    <?php
                      if (is_array($datas) || is_object($datas) ) {
                        
                        foreach ($datas as $key => $data) {
                          $key++;
                          $id = $data['id'];
                          $title = $data['post_title'];
                          $company = $data['company_name'];
                          $location = $data['location'];
                          $content = $data['post_content'];
                          $gaji = $data['gaji'];
                          ?>
                          <tr>
                            <td><?=$key?></td>
                            <td><?=$title?></td>
                            <td><?=$location?></td>
                            <td><?=$title?></td>
                            <td><?=$content?></td>
                            <td><?="Rp.".$gaji?></td>
                            <td>
                              <div class='btn-group btn-sm' role='group' aria-label='Basic example'>
                              <a href='post-edit.php?id=<?=$id?>'><button type='button' class='btn btn-info'><i class='fas fa-edit'></i></button></a>
                              <a href='post-delete.php?id=<?=$id?>'><button type='button' class='btn btn-info'><i class='fas fa-trash'></i></button></a>
                              <a href='post-view.php'><button type='button' class='btn btn-info'><i class='fas fa-eye'></i></button></a>
                              </div>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                    ?>
                    
              </table>
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
