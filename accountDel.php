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
			<form action="accountDel.php" method="post">
			<p class="heading_narrow">Fill the form bellow to delete a user account.</p>
				<table>
				<tr>
				<td>Username:</td>
				<td><input type="text" name="uname" placeholder="Enter username" required/></td>
				
				</tr>
				
				
				<td colspan="3">
				<center>
				<input type="submit" name="del" value="Save" />
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
		if(isset($_POST['del'])){
			//obtaining form variables
			$uname = $_POST['uname'];
			
		echo"<center>";
		    $a= mysqli_query($con," delete from user where username ='$uname' ");
			if($a){
			echo"<p style='color:green;font-size:20pt'> login Account has been deleted successfully.</p>";	
			}
			else{
			echo"<p style='color:red;font-size:20pt'> Error: Failed to delete account.</p>";	
			}
		
		
		echo"</center>";
		}
		?>
		</div>
	
	</body>
</html>