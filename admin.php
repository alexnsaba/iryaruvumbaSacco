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
					
		<!-- CONTENT: Loan Search -->
		<div class="content_center">
	      <center>
			<form action="admin.php" method="post">
			<p class="heading_narrow">Fill the form bellow to Create an Account for the user.</p>
				<table>
				<tr>
				<td>First Name:</td>
				<td><input type="text" name="fname" placeholder="First Name" required/></td>
				</tr>
				<tr>
				<td>Last Name:</td>
				<td><input type="text" name="lname" placeholder="Last name" required/></td>
				</tr>
				<tr>
				<td>Username:</td>
				<td><input type="text" name="uname" placeholder="username" required/></td>
				
				</tr>
				<tr>
				<td>Password</td>
				<td><input type="password" name="pass" placeholder="password" /></td>
				</tr>
				<tr>
				<td>Confirm Password:</td>
				<td><input type="password" name="pass1" placeholder="Retype the password" required/></td>
				</tr>
				
				<td colspan="3">
				<center>
				<input type="submit" name="account" value="Save" />
				</center>
				</td>
				</tr>
				</table>
				
			</form>
			</center>
			</div>
		<div>
		<br><br>
		<?php
		include_once('function.php');
		if(isset($_POST['account'])){
			//obtaining form variables
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$uname = $_POST['uname'];
			$pass = $_POST['pass'];
			$pass1 = $_POST['pass1'];
		echo"<center>";
		if($pass == $pass1){
			//encrypting the password
			$password = stripslashes($pass1);
			$a= mysqli_query($con,"insert into user(firstName,lastName,username,password) 
			values('$fname','$lname','$uname','$password')");
			if($a){
			echo"<p style='color:green;font-size:20pt'> Account has been successfully created.</p>";	
			}
			else{
			echo"<p style='color:red;font-size:20pt'> Error: Failed to create user account. Either username or password already exists.</p>";	
			}
		}
		else{
			echo"<p style='color:red;font-size:20pt'> Error: Your passwords do not match.</p>";
		}
		echo"</center>";
		}
		?>
		</div>
	
	</body>
</html>