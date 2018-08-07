<?PHP
	require 'function.php';
	//checkLogin();
	//connect();
?>
<!DOCTYPE html>
<html>
	<!-- HTML HEAD -->
	<?PHP includeHead('Loan Search',1); ?>
	
	<body>
		<!-- MENU -->
		<?PHP 
				Menu(1);
		?>
		<!-- MENU MAIN -->
		<div id="menu_main">
				<a href="admin.php" id="item_selected">Create New Account</a>
			<a href="passChange.php">Change Passwords </a>
			<a href="accountDel.php">Delete Account</a>
			<a href="viewAccount.php">View Accounts</a>
					
		<div>
		<br><br>
		<?php
		include_once('function.php');
		echo"<center>";
		    $a= mysqli_query($con,"select * from user ");
			$num= mysqli_num_rows($a);
			if($num > 0){
			echo"<table border='1' style= 'font-size:17pts;background-color:gainsboro;'>";
		echo"<tr>";
		echo"<th colspan='5' style='background-color:black;color:white;'><h1>List of Login Accounts.</h1></th>";
		echo"</tr>";
		echo"<tr style= 'background-color:orange'>";
		echo"<td>First Name</td>";
		echo"<td>Last Name</td>";
		echo"<td>Username</td>";
		echo"<td>Password</td>";
		echo"</tr>";
		while($row=mysqli_fetch_array($a)){
		echo"<tr>";
		echo"<td>".$row['firstName']."</td>";
		echo"<td>".$row['lastName']."</td>";
		echo"<td>".$row['username']."</td>";
		$password = md5($row['password']);
		echo"<td>".$password."</td>";
		echo"</tr>";
		}
		echo"</table>";
		}
			
			else{
			echo"<p style='color:red;font-size:20pt'> No login Account is available.</p>";	
			}
		
		
		echo"</center>";
		
		?>
		</div>
	
	</body>
</html>