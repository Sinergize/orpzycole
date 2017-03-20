
<?php

	include("db/include.php");
	session_start();

?>


<!DOCTYPE html>
<head>

<title>User Login</title>

</head>

<body>

	
    
    	<h1>Welcome</h1>
    
    
    <h3>User Login</h3>
    
    <p>Please enter username and password</p> 
    
    	<?php
			
			$error = array();
			
			if(array_key_exists("login", $_POST)){
			
					
					
					if(empty($_POST["username"])){
						
					$error[] = "Please Enter Your Username";	
					} else {
					$username = mysqli_real_escape_string($db, $_POST["username"]);	
					}
					
					
					if(empty($_POST["password"])){
						
						$error[] = "Please Enter Your Password";
					} else {
					
						$password = mysqli_real_escape_string($db, $_POST["password"]);	
					}
					
					if(empty($error)){
						
			$query = mysqli_query($db, "SELECT * FROM users WHERE username= '".$username."' AND password= '".$password."'")or die(mysqli_error($db));
						
						
						if(mysqli_num_rows($query) == 1){
							
							while($row = mysqli_fetch_array($query)){
								
								$_SESSION["u_id"] = $row["user_id"];
								$_SESSION["fname"] = $row['firstName'];
								header("Location: home.php");
							}
							
						} else {
							
							$invalid = "Invalid Username and/or Password. Please try again";
							header("Location: user_login.php?invalid=$invalid");	
						}
						
						
					} else {
					
						foreach($error as $err){
							
						echo "<p class='error'>*".$err."</p>";	
						}
						
					}
				
			}
		
		if(isset($_GET["invalid"])){
			
				$invalid = $_GET['invalid'];
				echo '<p class="error">*'.$invalid."</p>";	
				
			}
		
		?>
    
    <!-- This Form is for registered users to login -->    
    <form action="" method="post">
    
    <p>Username: <input type="text" name="username"/></p>
    <p>Password: <input type="password" name="password"/></p>
    <input type="submit" name="login" value="Login"/>
	
    </form>
    <p>New? Register Here</p>
    
    
    
    	<?php
			$wrong = array();
			
			if(array_key_exists("register", $_POST)){
				
				if(empty($_POST["firstname"])){
					
					$wrong[] = "Please Enter your Firstname";	
				} else {
				
				$firstname = mysqli_real_escape_string($db, $_POST["firstname"]);	
				}
				
				
				if(empty($_POST["lastname"])){
					
					$wrong[] = "Please Enter your lastname";	
				} else {
				
				$lastname = mysqli_real_escape_string($db, $_POST["lastname"]);	
				}

				if(empty($_POST["sex"])){
					
					$wrong[] = "Please Enter your Gender";	
				} else {
				
				$sex = mysqli_real_escape_string($db, $_POST["sex"]);	
				}

				if(empty($_POST["username"])){
					
					$wrong[] = "Please Enter your Username";	
				} else {
				
				$username = mysqli_real_escape_string($db, $_POST["username"]);	
				}
				
				
				if(empty($_POST["password"])){
					
					$wrong[] = "Please Enter your Password";	
				} else {
				
				$password = mysqli_real_escape_string($db, $_POST["password"]);	
				}
				
				if(empty($wrong)){
			
			$check = mysqli_query($db, "SELECT * FROM users WHERE password = '".$password."'") or die(mysqli_error);
			
				if(mysqli_num_rows($check) == 0){
					$insert = mysqli_query($db, "INSERT INTO users VALUES (NULL,
																	'".$firstname."',
																	'".$lastname."',
																	'".$sex."',
																	'".$username."',
																	'".$password."'
																	)") or die(mysqli_error($db));
						$reg = "You have been registered";
						header("Location:user_login.php?reg=$reg");
					
				} else {
					
					$incorrect = "Password already exists";
					header("Location:user_login.php?incorrect=$incorrect");	
					
				}
					
				} else {
					
					foreach($wrong as $wrongs){
					
						echo '<p class="error">*'.$wrongs.'</p>';	
					}
				}
				
			}
		
		
			if(isset($_GET["incorrect"])){
			$incorrect = $_GET["incorrect"];
			echo '<p class="error">'.$incorrect."</p>";		
			}
		
			if(isset($_GET["reg"])){
			
				$register = $_GET['reg'];
				echo '<p class="error">'.$register."</p>";	
				
			}
		
		?>
    
    <form action="" method="post">
    
    	<p>Firstname: <input type="text" name="firstname" value="<?php if(isset($_POST["firstname"])){echo $_POST["firstname"];} ?>"/></p>
        <p>Lastname: <input type="text" name="lastname" value="<?php if(isset($_POST["lastname"])){echo $_POST["lastname"];} ?>"/></p>
        <p>Gender: Male <input type="radio" name="sex"  value="M" />  
            Female <input type="radio" name="sex" value="F" /></p>
        <p>Username: <input type="text" name="username" value="<?php if(isset($_POST["username"])){echo $_POST["username"];} ?>"/></p>
        <p>Password: <input type="password" name="password"/></p>
        <input type="submit" name="register" value="Register"/>
    
    </form>
</body>
</html>