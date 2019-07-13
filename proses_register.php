<?php 

	if (isset($_POST['submit'])) {
		
		$getName = $_POST['name'];
		$getUsername = $_POST['username'];
		$getEmail = $_POST['email'];
		$getPassword = $_POST['password'];
		$getRole = $_POST['role'];

		$getCode = sha1($getPassword);

		//insert data user
		register($getName,$getUsername,$getEmail,$getCode,$getRole);

	}

	function register($getName,$getUsername,$getEmail, $getCode, $getRole){

		include('config.php');

		$sql = "INSERT INTO users (name, username,email, password,role)
		VALUES ('$getName', '$getUsername', '$getEmail','$getCode','$getRole')";

		$data = mysqli_query($conn,$sql);

			if ($data === TRUE) {
			    header('location: /home.php');
			} else {
			    echo "Error: " . $data . "<br>" . $conn->error;
			}

		$conn->close();

	}

?>