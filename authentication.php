<?php

$db = mysqli_connect("localhost", "root", "goodness", "orpzycole") or die(mysqli_error());

function authenticate() {

	if (!isset($_SESSION['id']) && !isset($_SESSION['admin_name'])) {
		
		header("Location:admin_login.php");
	}
}



?>