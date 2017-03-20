<?php

  session_start();

  include('dbconfig.php');
  include('authentication.php');

  authenticate();

  $admin_id = $_SESSION['admin_id'];
  $admin_name = $_SESSION['admin_name'];
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>users</title>
</head>
<body>

       <?php

	          echo "<p>Admin ID:<strong>$admin_id</strong></p>";
	          echo "<p>Admin Name:<strong>$admin_name</strong></p>";

	    ?>

	    <hr>

    
     <?php
	     
	     $select = mysqli_query($db, "SELECT * FROM users") or die(mysqli_error($db)); 
	 
	 ?>

	   <table border="1px">
	   	      
	   	      <tr><th>Name</th><th>Gender</th><th>Username</th><th>Password</th></tr>
	   	      
	   	      <tr>
       
       <?php while($result = mysqli_fetch_array($select)) { ?>
       
       
       <td><?php echo $result['firstname'].' '.$result['lastname']; ?></td>
       <td><?php echo $result['gender'] ?></td>
       <td><?php echo $result['username'] ?></td>
       <td><?php echo $result['password'] ?></td>
       
       </tr>
       
       <?php } ?>
    




	   </table>

</body>
</html>