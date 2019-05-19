<?php
	function isLoggedIn() : bool
	{
		if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
			return true;
		}

		return false;
	}

	function login(string $username)
	{
		$_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
	}
?>