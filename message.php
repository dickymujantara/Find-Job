<?php
    session_start();

    include 'config.php';

    $sql = "SELECT * FROM data_cv ORDER BY id DESC";
    $hasil = mysqli_query($conn,$sql);
    //$data = mysqli_fetch_array($hasil);
    

   
    
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
<script src="assets/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>

<!------ Include the above in your HEAD tag ---------->
<div class="d-flex" id="wrapper">
    <div class="border-right" id="sidebar-wrapper" style="background: url(assets/img/bg-dashboard-sidebar.jpg);">
    <a href="dashboard.php"><div class="sidebar-heading border-bottom bg-light"><img src="assets/img/logofindjobbacaan.png"></div></a>
      <div class="list-group list-group-flush" style="opacity: 0.8";>
        <a href="/dashboard.php" class="list-group-item list-group-item-action "><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a>
        <a href="/message.php" class="list-group-item list-group-item-action active"><i class="fas fa-envelope"></i>&nbsp; Message</a>
        <a href="/post.php" class="list-group-item list-group-item-action"><i class="fas fa-clipboard"></i> Post</a>
        <a href="/companyprofile.php" class="list-group-item list-group-item-action "><i class="fas fa-user"></i> Profil</a>
        <a href="/reset_password.php" class="list-group-item list-group-item-action"><i class="fas fa-cog"></i> Setting</a>
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
                         <div class="mail-option">
                             <div class="chk-all">
                                 <input type="checkbox" class="mail-checkbox mail-group-checkbox">
                                 <div class="btn-group">
                                     <a data-toggle="dropdown" href="#" class="btn mini all" aria-expanded="false">
                                         All
                                         <i class="fa fa-angle-down "></i>
                                     </a>
                                     <ul class="dropdown-menu">
                                         <li><a href="#"> None</a></li>
                                         <li><a href="#"> Read</a></li>
                                         <li><a href="#"> Unread</a></li>
                                     </ul>
                                 </div>
                             </div>

                             <div class="btn-group">
                                 <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                                     <i class=" fa fa-refresh"></i>
                                 </a>
                             </div>
                             <div class="btn-group hidden-phone">
                                 <a data-toggle="dropdown" href="#" class="btn mini blue" aria-expanded="false">
                                     More
                                     <i class="fa fa-angle-down "></i>
                                 </a>
                                 <ul class="dropdown-menu">
                                     <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                                     <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                                     <li class="divider"></li>
                                     <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                 </ul>
                             </div>
                             <div class="btn-group">
                                 <a data-toggle="dropdown" href="#" class="btn mini blue">
                                     Move to
                                     <i class="fa fa-angle-down "></i>
                                 </a>
                                 <ul class="dropdown-menu">
                                     <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                                     <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                                     <li class="divider"></li>
                                     <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                 </ul>
                             </div>

                             <ul class="unstyled inbox-pagination">
                                 <li><span>1-50 of 234</span></li>
                                 <li>
                                     <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                                 </li>
                                 <li>
                                     <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                                 </li>
                             </ul>
                         </div>
                          <table class="table table-inbox table-hover" id="table-message">
                            <tbody>
                            <tr>
                                <td class="inbox-small-cells">
                                  </td>
                                  <td class="inbox-small-cells"></td>
                                  <td class="view-message  dont-show">From</td>
                                  <td class="view-message ">Address User</td>
                                  <td class="view-message  text-right">Messages</td>
                                  <td class="view-message  text-right"></td>
                                  <td class="view-message  text-right"></td>
                            </tr>
                            <?php if (mysqli_num_rows($hasil) > 0) {?>
                            <?php foreach ($hasil as $value) {?>
                           <tr class="unread">
                                  <td class="inbox-small-cells">
                                      <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                  <td class="view-message  dont-show"><?= $value['nama'] ?></td>
                                  <td class="view-message  dont-show"><?= $value['address'] ?></td>
                                  <td class="view-message  text-right"><?= substr($value['messages'],0,20) ?>...</td></a>
                                  <td class="view-message  text-right">
                                    <a href="/message-view.php?id=<?= $value['id']?>"><i class="fa fa-eye"></i></a>
                                  </td>
                                  <td class="view-message  text-right">
                                    <a href="/message-delete.php?id=<?= $value['id']?>"><i class="fa fa-trash"></i></a>
                                  </td>                                  
                              </tr>
                           <?php } ?>
                            <?php }else{?>
                                <tr>
                                    <td class="inbox-small-cells">No Message</td>
                                    <td class="inbox-small-cells"></td>
                                  <td class="view-message  dont-show"></td>
                                  <td class="view-message  dont-show"></td>
                                  <td class="view-message  text-right"></td>
                                  <td class="view-message  text-right"></td>
                                  <td class="view-message  text-right"></td>
                                </tr>
                            <?php } ?> 
                          </tbody>
                          </table>
                      </div>
                  </aside>
              </div>
</div>
</body>
</html>