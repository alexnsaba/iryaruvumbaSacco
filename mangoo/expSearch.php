<!DOCTYPE HTML>
<?PHP
	require 'function.php';
	//checkLogin();
	//connect();
?>

<html>
	<!-- HTML HEAD -->
	<?PHP includeHead('Loan Search',1); ?>
	
	<body>
		<!-- MENU -->
		<?PHP 
				includeMenu(4);
		?>
		<!-- MENU MAIN -->
		<div id="menu_main" style="margin-left:1.5in;margin-right:1.95in">
				<a href="expense.php" id="item_selected">New Expense Entry</a>
			<a href="expSearch.php">search expenses</a>
			<a href="searchexp.php">List of all expenses</a>
			<a href="expEdit.php">Edit</a>
			<a href="expDel.php">Delete</a>
					
		<!-- CONTENT: Loan Search -->
		<div class="content_center">
	
			<form action="expSearch.php" method="post">
				<p class="heading_narrow">Search Expense by Number</p>
				<input type="text" name="exp_no" placeholder="expense Number" />
				<input type="submit" name="esearc" value="Search" />
			</form>
			
			<form action="expSearch.php" method="post" style="margin-top:4.5em;">
				<p class="heading_narrow">Search expense by its Type</p>
				<input type="text" name="expst" placeholder="eg.meeting.">
				<input type="submit" name="estatu" value="Search" />
			</form>
			
		</div>
		<div>
		<br><br>
		<?php
		include_once('function.php');
		if(isset($_POST['esearc'])){
		$expn=$_POST['exp_no'];
		$a=mysqli_query($con,"select * from expenses where VoucherNo = '$expn' ");
		  $rw=mysqli_num_rows($a);
        if($rw>0)
            {
		echo"<center><table border='1' style= 'background-color:gainsboro;font-size:22pt;'>";
		echo"<tr>";
		echo"<th colspan='5' style='background-color:black;color:white;'><h1>List of expenses.</h1></th>";
		echo"</tr>";
		echo"<tr style= 'background-color:orange'>";
		echo"<td>VoucherNo</td>";
		echo"<td>expense Type</td>";
		echo"<td>expense Amount</td>";
		echo"<td>date</td>";
		echo"<td>person Responsible</td>";
		echo"</tr>";
		while($row=mysqli_fetch_array($a)){
		echo"<tr>";
		echo"<td>".$row['VoucherNo']."</td>";
		echo"<td>".$row['expenseType']."</td>";
		echo"<td>".$row['expenseAmount']."</td>";
		echo"<td>".$row['date']."</td>";
		echo"<td>".$row['personResponsible']."</td>";
		echo"</tr>";
		}
		echo"<center></table>";
		}
		else{
		echo"<center style='font-size:22pt;'>No expenses record found.</center>";
		}
		
		}
		
		if(isset($_POST['estatu'])){
		$expt=$_POST['expst'];
		$a=mysqli_query($con,"select * from expenses where expenseType= '$expt' ");
		  $rw=mysqli_num_rows($a);
        if($rw>0)
            {
		echo"<center><table border='1' style= 'background-color:gainsboro'>";
		echo"<tr>";
		echo"<th colspan='5' style='background-color:black;color:white'><h1>List of expenses.</h1></th>";
		echo"</tr>";
		echo"<tr style= 'background-color:orange'>";
		echo"<td>VoucherNo</td>";
		echo"<td>expense Type</td>";
		echo"<td>expense Amount</td>";
		echo"<td>date</td>";
		echo"<td>person Responsible</td>";
		echo"</tr>";
		while($row=mysqli_fetch_array($a)){
		echo"<tr>";
		echo"<td>".$row['VoucherNo']."</td>";
		echo"<td>".$row['expenseType']."</td>";
		echo"<td>".$row['expenseAmount']."</td>";
		echo"<td>".$row['date']."</td>";
		echo"<td>".$row['personResponsible']."</td>";
		echo"</tr>";
		}
		echo"<center></table>";
		}
		else{
		echo"<center style='font-size:22pt;'>No expenses record found.</center>";
		}
		
		}
		?>
		</div>
	
	</body>
</html>