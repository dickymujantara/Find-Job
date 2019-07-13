<?php
  session_start();
  $role = $_SESSION['role'];
  $name = $_SESSION['user'];

  if ($role != "company") {
    header('location: /home.php');
    die();
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

  <!-- Custom styles for this template -->
  <link href="assets/css/simple-sidebar.css" rel="stylesheet">

  <link rel="stylesheet" href="/assets/fontawesome/css/all.css">

  <script>
    function showAlert(){
      alert('Logout Berhasil');
      document.location.href = 'index.php';
    }
  </script>
  <script src="/assets/js/jquery-3.3.1.min.js"></script>
</head>

<body>

  <div class="d-flex" id="wrapper">
    <div class="border-right" id="sidebar-wrapper" style="background: url(assets/img/bg-dashboard-sidebar.jpg);">
    <a href="dashboard.php"><div class="sidebar-heading border-bottom bg-light"><img src="assets/img/logofindjobbacaan.png"></div></a>
      <div class="list-group list-group-flush" style="opacity: 0.8";>
        <a href="dashboard.php" class="list-group-item list-group-item-action active"><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a>
        <a href="message.php" class="list-group-item list-group-item-action"><i class="fas fa-envelope"></i>&nbsp; Message</a>
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
        <br>
        <div class="col-lg-2" id="calendar">
          <div class="card" >
              <div class="card-body bg-info" >
                  <div class='h1 text-light text-right mb-4'>
                      <i class='fa fa-calendar-alt'></i>
                  </div>  
                  <small class='text-light text-uppercase font-weight-bold'>Calendar</small>
                  <div class='text-value text-light' id="date"></div> 
              </div>
          </div>
        </div>
        <div class="col-lg-2" id='time'>
          <div class="card" >
            <div class="card-body bg-info" >
                <div class='h1 text-light text-right mb-4'>
                    <i class='fa fa-clock'></i>
                </div>  
                <small class='text-light text-uppercase font-weight-bold text-light'>Clock</small>
                <div class='text-value text-light' id="clock"></div> 
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
  
    <script>
      function updateClock()
        {
            var currentTime = new Date();
            //get time
            var currentHours = currentTime.getHours ();
            var currentMinutes = currentTime.getMinutes();
            var currentSeconds = currentTime.getSeconds();
            var month = currentTime.getMonth()+1;
            var day = currentTime.getDate();

            
            var output = (day<10 ? '0' : '') + day + '/' 
                        + (month<10 ? '0' : '') + month  + '/' 
                        + currentTime.getFullYear(); 

            var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";
            currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;
            currentHours = ( currentHours == 0 ) ? 12 : currentHours;

            currentHours = ( currentHours < 10 ? "0" : "" ) + currentHours;
            currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
            currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

            var currentTimeString = currentHours + ":" + currentMinutes + " " + timeOfDay;

            $("#clock").html(currentTimeString);
           
            $("#date").html(output);
        }

        $(document).ready(function()
        {
            setInterval('updateClock()', 1000);
        });
    </script>


</body>

</html>
