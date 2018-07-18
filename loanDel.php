<!DOCTYPE HTML>
<?PHP
	require 'function.php';
?>
<html>
	<?PHP includeHead('Settings | Basic Settings',1) ?>
	<body>
		<!-- MENU -->
		<?PHP includeMenu(3); ?>
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
	<!-- LEFT SIDE: Basic Settings -->	
		<div class="content_settings">
			<form action="loanDel.php" method="post">
			<p style="font-size:23pt;color:green">Delete a loan record</p>
			<p>Enter the loanId for the loan record to be deleted.</p>
			<p><input type="number" name="dp" required></p><br>
            <p><input type="submit" name="dpdel" value="Delete The loan Record"></p>
			   </form>
		    </div>
		<div><center>
		<?php
			
		?>
			</center></div>
		<?php
  include_once('function.php');
            if(isset($_POST['dpdel'])){
              $value=$_POST['dp']; 
              $d=mysqli_query($con,"delete from loan where loanId=$value");
              if($d){
               echo"<p style='color:blue;font-size:20pt'>The record with loanId ".$value." is deleted</p>";
           }
		   else {
		   echo"<p style='color:blue;font-size:20pt'>Failed to delete the record.</p>";
		   }
		   }
	   ?>
	</body>
</html>