<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'maddevel_maddeve');
	
//	include ("db.php");

	// REGISTER USER
//	if (isset($_POST['reg_user'])) {
//		// receive all input values from the form
//		$username = mysqli_real_escape_string($db, $_POST['username']);
//		$email = mysqli_real_escape_string($db, $_POST['email']);
//		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
//		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
//
//		// form validation: ensure that the form is correctly filled
//		if (empty($username)) { array_push($errors, "Username is required"); }
//		if (empty($email)) { array_push($errors, "Email is required"); }
//		if (empty($password_1)) { array_push($errors, "Password is required"); }
//
//		if ($password_1 != $password_2) {
//			array_push($errors, "The two passwords do not match");
//		}
//
//		// register user if there are no errors in the form
//		if (count($errors) == 0) {
//			$password = md5($password_1);//encrypt the password before saving in the database
//			$query = "INSERT INTO users (username, email, password) 
//					  VALUES('$username', '$email', '$password')";
//			mysqli_query($db, $query);
//
//			$_SESSION['username'] = $username;
//			$_SESSION['success'] = "You are now logged in";
//			header('location: index.php');
//		}
//
//	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		$user_user_id=null;
		if (count($errors) == 0) {
			$query = "SELECT * FROM sig_users WHERE user_email='$username' AND user_password='$password'";
			$results = mysqli_query($db, $query);

			while ($res=mysqli_fetch_assoc($results)) {
				
				$user_user_id=$res["user_user_id"];
			}
			if ($user_user_id!=null) {
				
				$_SESSION['user_user_id'] = $user_user_id;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>