<?php
function showRegdUsers($r_users){
		$show = "";

		while ($regdusers = mysqli_fetch_array($r_users)){
			$show .= "<tr>";

			$show .= "<td>".$regdusers[0]."</td>";
			$show .= "<td>".$regdusers[1]."</td>";
			$show .= "<td>".$regdusers[2]."</td>";
			$show .= "<td>".$regdusers[3]."</td>";
			$show .= "<td>".$regdusers[4]."</td>";
			

			$show .= "</tr>";
			}
		return $show;
	}





	//function showLink()
	//{
      //$result = "";
      //$result .= "<a href='admin_home.php'>Home</a> ";
//$result .= "<a href='add_customers.php'>Add Customers</a> ";
//$result .= "<a href='view_customers.php'>View Customers</a> ";
//$result .= "<a href='logout.php'>Logout</a> ";

//return $result;
//	}

	?>