<?php 
	session_start();
	
	if (isset($_POST['login'])) {
		$getUsername = $_POST['username'];
		$getPass = $_POST['password'];
		$getCode = sha1($getPass);
		
		// set_cookie($getUsername,$getPasstime, time() + (86400 * 30), "/");

		login($getUsername,$getCode);
	}else{
		echo "<script>
			document.location.href = 'login.php'
		</script>";
	}

	
	

	function login($getUsername,$getCode)
	{
		include('config.php');

		$cekuser = mysqli_query($conn, "SELECT * FROM users WHERE username='$getUsername' OR email = '$username'");

			if (mysqli_num_rows($cekuser) == 1){

				$hasil = mysqli_fetch_assoc($cekuser);

				if ($hasil['password'] == $getCode){

					if($hasil['role'] == 1){
						$_SESSION['user'] = $getUsername;
						$_SESSION['role'] = 'user';
						$_SESSION['login'] = true;

						echo "<script>
						alert('login berhasil as user');
						document.location.href = 'home.php';
						</script>";
					}elseif($hasil['role'] == 2){
						$_SESSION['user'] = $getUsername;
						$_SESSION['role'] = 'company';
						$_SESSION['login'] = true;

						echo "<script>
						alert('login berhasil as Company');
						document.location.href = 'dashboard.php';
						</script>";
					}


				}else{
					echo "<script>
						alert('Password Salah');
					</script>";
				}
			} else {
				echo "<script>
						alert('Username/Password Salah!');
						document.location.href = 'index.php';
						</script>";
			}

	}

 ?>