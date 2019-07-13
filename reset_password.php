<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/fontawesome/css/all.css">
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
  <body style="background: url('assets/img/fj.png');
   height: 550px;
   background-color:#898f99 ; /* You must set a specified height */
  background-position: center; /* Center the image */
  background-repeat: no-repeat;
  position: relative; /* Do not repeat the image */
  ">
    <div class="container">
  <div class="card bg-light border border-secondary text-white " style=" background: url('assets/img/landing-bg.jpg');
   height: 350px; /* You must set a specified height */
  background-position: center; /* Center the image */
  background-repeat: no-repeat;width:730px; margin-top: 13%; margin-left: 17%; opacity: 0.85;">
    <div class="card-header">
       <h4 class="text-center">Reset Password</h4>
    </div>
    <div class="card-body">
      <form>
  <div class="form-group">
    <label for="exampleInputpwd">New Password</label>
    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
  </div>
  <button type="button" class="btn btn-secondary" onclick="klik()">Reset Password</button>
</form>
    </div>
  </div>
  </body>
</html>

<script>
  function klik(){
    alert("Password Berhasil Diganti!");
    window.location.replace("/dashboard.php");
  }

</script>