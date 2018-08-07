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
				includeMenu(4);
		?>
		<!-- MENU MAIN -->
		<div id="menu_main" style="margin-left:1.5in;margin-right:1.95in">
				<a href="expense.php" id="item_selected">New Expense Entry</a>
			<a href="expSearch.php">search expenses</a>
			<a href="searchexp.php">List of all expenses</a>
			<a href="expEdit.php">Edit</a>
			<a href="expDel.php">Delete</a>
		
		
		<div>
		<br><br>
		<?php
		include_once('function.php');
		
		$a=mysqli_query($con,"select * from expenses");
		  $rw=mysqli_num_rows($a);
        if($rw>0)
            {
		echo"<center><table border='1' style= 'background-color:gainsboro;'>";
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
		
		
		?>
		</div>
	
	</body>
</html>