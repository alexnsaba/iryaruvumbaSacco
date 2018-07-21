<!DOCTYPE HTML>
<?PHP
	require 'function.php';
	?>

<html>
	<!-- HTML HEAD -->
	<?PHP includeHead('Loan Search',1); ?>
	
	<body>
		<!-- MENU -->
		<?PHP 
				includeMenu(3);
		?>
		<!-- MENU MAIN -->
		<div id="menu_main" style="margin-left:0.2in;margin-right:1.3in">
			<a href="loan_search.php" id="item_selected">Search</a>
			<a href="loanAct.php">Active and cleared Loans</a>
			<a href="loanApply.php">Loan Application</a>
            <a href="giveLoan.php">Approve/Deny Loans</a>
            <a href="repay.php">Loan Repayment</a>
			<a href="loanEdit.php">Edit</a>
			<a href="loanDel.php">Delete</a>
			<a href="fine.php">Compute Fine</a>
		</div>
					
		<!-- CONTENT: Loan Search -->
		<div class="content_center">
	
			<form action="loanSearch.php" method="post">
				<p class="heading_narrow">Search Loan by Number</p>
				<input type="text" name="loan_no" placeholder="LoanId" />
				<input type="submit" name="lsearc" value="Search" />
			</form>
			
			<form action="loanSearch.php" method="post" style="margin-top:4.5em;">
				<p class="heading_narrow">Search Loan by Customer Name</p>
				<input type="text" name="loon" placeholder="name of loan holder">
				<input type="submit" name="statu" value="Search" />
			</form>
			
		</div>
	
	</body>
</html>