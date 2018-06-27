<!DOCTYPE HTML>
<?PHP	
	require 'function.php';
	
?>

<html>
	<?PHP includeHead('New Employee',0) ?>	
		
		<script src="functions_validate.js"></script>
	</head>
	<body>
		<!-- MENU -->
		 <?PHP 
				includeMenu(7);
         ?>
		<div id="menu_main" style="margin-left:1.5in;margin-right:1.95in">
			<!-- <a href="empl_search.php">Search</a> -->
			<a href="empl_new.php" id="item_selected">New Employee</a>
			<a href="emplo.php">Current Employees</a>
			<a href="empEdit.php">Edit</a>
			<a href="empDel.php">Delete</a>
		</div>
		
		<!-- PAGE HEADING -->
		<p class="heading">New Employee</p> 
		
		<!-- CONTENT -->
		<div class="content_center">
			<form action="function.php" method="post">
				
				<table id ="tb_fields" style="max-width:1000px;">
					<tr>
						<td>Name:</td>
						<td><input type="text" name="empl_name" placeholder="Full Name" tabindex=2 required /></td>
						<td>Monthly Salary:</td>
						<td><input type="number" name="empl_salary" placeholder="<?PHP echo $_SESSION['set_cur']; ?>" tabindex=7 required /></td>
					</tr>
					<tr>
						
						<td>Address:</td>
						<td><input type="text" name="empl_address" placeholder="Place of Residence" tabindex=8  required /></td>
					</tr>
					<tr>
						<td>Gender:</td>
						<td>
							<select name="empl_gender" size="1" tabindex=3 required >
                                <option>-select-</option> <option>Male</option> <option>Female</option>
							</select>
						</td>
						<td>Phone No:</td>
						<td><input type="text" name="empl_phone" tabindex=9 required /></td>
					</tr>
					<tr>
						<td>DoB:</td>
						<td><input type="date"  name="empl_dob" placeholder="DD.MM.YYYY" tabindex=4 required /></td>
						<td>E-Mail:</td>
						<td><input type="email" name="empl_email" placeholder="abc@xyz.com" tabindex=10 /></td>
					</tr>
					<tr>
						<td>Marital Status:</td>
						<td>
							<select name="empl_status" size="1" tabindex=5 required>
							<option>------------------</option> <option>Single</option> <option>Married</option>	
							</select>
						</td>
						<td>Employm. Start:</td>
						<td><input type="date"  name="empl_start"  tabindex=11 required /></td>
					</tr>
					<tr>
						<td>Position:</td>
						<td><input type="text" name="empl_position" placeholder="Job description" tabindex=6 required /></td>
					</tr>
					<tr>
						<td colspan="4" class="center">
							<input type="submit" name="creat" value="Continue" tabindex=12 />
						</td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>