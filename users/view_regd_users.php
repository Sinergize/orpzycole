<?php

  session_start();

  include("db/include.php");
  
  include "function_view.php";
?>




<?php
	$select = mysqli_query($db, "SELECT * FROM users") or die(mysqli_error($db));		
	
	
?>

	<table border="1">
    <tr>
        	<th>User ID</th><th>Firstname</th><th>Lastname</th><th>Gender</th>
            <th>Username</th>
            
       </tr>
       <?php
  $showusers = showRegdUsers($select);
  echo $showusers;

  ?>
    
	</table>


</body>
</html>