<?php
   session_start();

   include('dbconfig.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin login</title>
</head>
<body>
	
	  <form action="" method="post">
	  	<fieldset>
	  		      <h2>Hello admin, please enter your details below to login</h2>
	  		       <p>Firstname: <input type="text" name="firstname"></p>
	  		       <p>Password: <input type="password" name="password"></p>
	  		       <input type="submit" name="login" value="login">

	  	</fieldset>
	  </form>
</body>
</html>

<?php
  
  if (array_key_exists('login', $_POST)) {

  	  $error = array();

  	  if (empty($_POST['firstname'])) {
  	  	$error[] = "Enter your firstname";
  	  }else{
  	  	$firstname = $_POST['firstname'];
  	  }

  	  if (empty($_POST['password'])) {
  	  	$error[] ="Enter your password";
  	  }else{
  	  	$password = $_POST['password'];
  	  }

  	  if (empty(error)) {

  	  	$query = mysqli_query($db, "SELECT * FROM admin 
  	  		WHERE firstname = '".$firstname."' AND password = '".$password."'") or die(mysqli_error($db));

  	  	if(mysqli_num_rows($query) == 1) {

  	  		while ($admin_info = mysqli_fetch_array($query)) {
  	  			
  	  			$_SESSION['admin_id'] = $admin_info['admin_id'];
  	  			$_SESSION['admin_name'] = $admin_info['firstname'];

  	  			header("Location:view_user.php");
  	  		}
  	  	}else{
  	  		$login_error = "Invalid firstname and/or password";
  	  		header("Location:admin_login.php?login_error=$login_error");
  	  	}
  	  	
  	  }else{
  	  	foreach ($error as $error) {
  	  		echo '<p>'.$error.'</p>';
  	  	}
  	  }
  	
  }
     if (isset($_GET['login_error'])) {
                 	echo $_GET['login_error'];
                 }
  

?>

