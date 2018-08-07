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
			<form action="passChange.php" method="post">
			<p class="heading_narrow">Fill the form bellow to change the password of the user.</p>
				<table>
				<tr>
				<td>Username:</td>
				<td><input type="text" name="uname" placeholder="Enter username" required/></td>
				
				</tr>
				<tr>
				<td>New Password</td>
				<td><input type="password" name="pass" placeholder="New password" /></td>
				</tr>
				<tr>
				<td>Confirm  new Password:</td>
				<td><input type="password" name="pass1" placeholder="Retype the new password" required/></td>
				</tr>
				
				<td colspan="3">
				<center>
				<input type="submit" name="change" value="Save" />
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
		if(isset($_POST['change'])){
			//obtaining form variables
			$uname = $_POST['uname'];
			$pass = $_POST['pass'];
			$pass1 = $_POST['pass1'];
		echo"<center>";
		if($pass == $pass1){
			//encrypting the password
			$password = stripslashes($pass1);
			$a= mysqli_query($con," update user set password='$password' where username ='$uname' ");
			if($a){
			echo"<p style='color:green;font-size:20pt'> Password has been Updated successfully.</p>";	
			}
			else{
			echo"<p style='color:red;font-size:20pt'> Error: Failed to update the password. please try again</p>";	
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