<?php
	require_once(dirname(__FILE__).'\..\db\user_repository.php');
	require_once(dirname(__FILE__).'\authentication_manager.php');

	if (isLoggedIn()) {
		header("location: home.php");
		exit;
	}
 
	$username = $password = "";
	$username_err = $password_err = $login_err = "";
 
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		validate();

		if (empty($username_err) && empty($password_err)) {
			authenticate();
		}
	}

	function validate(){
		global $username, $password, $username_err, $password_err;

		if (empty(trim($_POST["username"]))) {
			$username_err = "Please enter username.";
		} else {
			$username = trim($_POST["username"]);
		}
    
		if (empty(trim($_POST["password"]))) {
			$password_err = "Please enter your password.";
		} else {
			$password = trim($_POST["password"]);
		}
	}

	function authenticate(){
		global $username, $password, $login_err;
		$userRepository = new UserRepository();
		$hash = $userRepository->getPasswordHash($username);
            
		if (password_verify($password, $hash)) {
			session_start();
          
			login($username);
          
			header("location: home.php");
		} else {
			$login_err = "The credentials you entered was not valid.";
		}
	}
?>