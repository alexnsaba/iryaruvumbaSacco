<!DOCTYPE HTML>
<?PHP
	require 'function.php';

?>

<html>
	<?PHP includeHead('Settings | Basic Settings',1) ?>
	
	<body>
		<!-- MENU -->
		<?PHP includeMenu(4); ?>
		<div id="menu_main" style="margin-left:1.5in;margin-right:1.95in">
			<a href="expense.php" id="item_selected">New Expense Entry</a>
			
			<a href="expSearch.php">search expenses</a>
			<a href="searchexp.php">List of all expenses</a>
			<a href="expEdit.php">Edit</a>
			<a href="expDel.php">Delete</a>
			
		</div>
	
		<!-- LEFT SIDE: Basic Settings -->	
		<div class="content_settings">
			<form action="expense.php" method="post">
			
				<p class="heading">select the expense among the list bellow.</p>
				
				<table id="tb_set">
				
					
					<tr>
						<td> The type of expense</td>
						<td><select name="exp" value="exp" required>
							<option>stationary purchases</option>
							<option>Meetings</option>
							<option>salaries</option>
							<option>Transport</option>
							<option>Security</option>
							
							<option>general Repairs</option>
							<option>Field Expenses</option>
							<option>Office & Admin Expenses</option>
							<option>Intrest on savings</option>
							<option>Public relations</option>
							<option>proffessional fees</option>
							<option>marketing & mobilisation</option>
							<option>AGM</option>
							<option>Meetings</option>
							<option>Lunch allowance</option>
							<option>audit fees</option>
							<option>bank charges</option>
							<option>Rent</option>
							<option>Utilities</option>
							<option>NSSF</option>
							<option>Legal Fees</option>
							<option>petty Cash</option>
							<option>investment Expenses</option>
							<option>Capital Expenditures</option>
							</select> </td>
						
					</tr>
					<tr>
						<td> Others</td>
						<td><input type="text" name="otherExp" placeholder="specify" ></td>
					</tr>
					<tr>
					<td>Amount</td> 
						<td><input type="number" name="amtExp" placeholder="enter amount" required></td>
					</tr>
					<tr>
						<td> Date</td>
						<td><input type="date" name="datExp"  required></td>
					</tr>
					
                     <tr>
						<td> Person Responsible</td>
						<td><input type="text" name="respp" placeholder="person responsible" required></td>
					</tr>
					
				</table>
			
				<center><input type="submit" name="saveExp" value="Save"></center>
				
			</form>
			
		</div>
		<div><center>
		<?php
			
		?>
			</center></div>
		

<?php
if(isset($_POST['saveExp'])){
include_once('function.php');
mysqli_query($con,"CREATE TABLE expenses(VoucherNo int(20) primary key not null auto_increment,
expenseType varchar(30),expenseAmount int(30),date varchar(9),personResponsible varchar(30))");
//capturing form data
$amtExp=$_POST['amtExp'];
$datExp=$_POST['datExp'];
$respp=$_POST['respp'];
if(!empty($_POST['otherExp'])){
$expType=$_POST['otherExp'];
}
else{
$expType=$_POST['exp'];
}
//inserting expense details into expenses table
$a=mysqli_query($con,"insert into expenses(expenseType,expenseAmount,date,personResponsible)
 values('$expType','$amtExp','$datExp','$respp')");
 if($a){
 echo"<center style='font-size:24pt;color:blue'>expense details have been saved successfully.</center>";
 }
 else{
 echo"<center style='font-size:24pt;color:green'>Data failed to be saved. please try again..........</center>";
 }
}
?>
	</body>
</html>