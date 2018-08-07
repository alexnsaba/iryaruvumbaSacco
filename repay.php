<?PHP
	require 'function.php';
	?>
<!DOCTYPE html>
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
			
		</div>
					
		<!-- CONTENT: Loan Search -->
		<div class="content_center">
	      <center>
			<form action="repay.php" method="post">
				<p class="heading_narrow">Fill the form bellow to Repay a loan.</p>
				<table>
				<tr>
				<td>Date:</td>
				<td><input type="date" name="rdate"  required/></td>
				</tr>
				<tr>
				<td>PaymentAmount:</td>
				<td><input type="number" name="pamt" placeholder="Amount Repaid" required/></td>
				</tr>
				<tr>
				<td>ReceivedBy:</td>
				<td>
				<?php
				echo"<select name='recv' value='recv' required>";
				require_once 'function.php';
				$rem=mysqli_query($con,"select * from employee");
				while($remp=mysqli_fetch_array($rem)){
				echo"<option>".$remp['name']."</option>";
				}
				echo"</select>";
				?>
				</td>
				
				</tr>
				<tr>
				<td>Paid By</td>
				<td>
				<?php
				include_once'function.php';
				$a=mysqli_query($con,"select * from customer");
				echo"<select name='rpaid' required>";
				while($row=mysqli_fetch_array($a)){
				echo"<option>".$row['Name']."</option>";
				}
				echo"</select>";
				?>
				</td>
				</tr>
				<tr>
				<td>LoanId</td>
				<td>
				<input type="text" name="lid" placeholder="LoanId" />
				</td>
				</tr>
				<tr>
				<td>AccountNo</td>
				<td>
				<input type="text" name="acc" placeholder="AccountNo" />
				</td>
				</tr>
				<tr>
				<td colspan="2"><center><input type="submit" name="rep" value="SAVE" ></center></td>
				</tr>
				</table>
			</form>
			</center>
			
			
		</div>
	<?php
	if(isset($_POST['rep'])){
	 include_once'function.php';
	 $rdate=$_POST['rdate'];
	 $pamt=$_POST['pamt'];
	 $recv=$_POST['recv'];
	 $rpaid=$_POST['rpaid'];
	 $lid=$_POST['lid'];
	 $acc=$_POST['acc'];
	$ra= mysqli_query($con,"Select * from loan where loanId='$lid' and AccountNo='$acc'");
	 $row=mysqli_fetch_array($ra);
	 $amount=$row['approvedAmount'];
	 $interest=($row['balance']*(4/100));
	 $pp=$amount/10;
	 $tbalance=$row['balance']-$pamt+$interest;
	 $num=mysqli_num_rows($ra);
	 if($num==1){
		 if($row['fine']>0){
			 //checking if payment amount is greater than fine
			 if($pamt>=$row['fine']){
				 if($pamt>($interest)){
				 			 echo"<center>";
			 echo "<p style='font-size:18pt'>Interest =  ".number_format($interest)."</p>";
			 echo "<p style='font-size:18pt'>Fine =  ".number_format($row['fine'])."</p>";
			 echo "<p style='font-size:18pt'>Amount Brought =  ".number_format($pamt)."</p>";
			 $total= $pamt-$interest- $row['fine'];
			 echo "<p style='font-size:18pt'>Actual Amount Repaid =  ".$total."</p>";
			 echo"</center>";
				$fine=$row['fine'];
				$lry=mysqli_query($con,"insert into loanRepayment(date,loanAmount,principlePayment,
	  intrest,fine,totalPay,balance,receivedBy,paidBy,AccountNo,loanId)
	  values('$rdate','$amount','$pp','$interest','$fine','$pamt','$tbalance','$recv','$rpaid','$acc','$lid')");
	 //taking Interest to the income table.
	 $nn=$row['Name'];
	 $tmonthly=$row['monthlyInstalment']-$pamt;
	 mysqli_query($con,"insert into income(typeOfIncome,receivedFrom,incomeAmount,date) 
	 values('interest','$nn','$interest','$rdate')");
	 //updating the balance and monthlyInstallment of the loan Table
	 mysqli_query($con,"update loan set balance='$tbalance'"); 
	 mysqli_query($con,"update loan set monthlyInstalment='$tmonthly'");
	mysqli_query($con,"update loan set fine=0 ");	 
	 if($lry){
	   echo"<p style='font-size:20pt;color:blue'>Repayment was successfull.</p>";
	 }
		 
	 else{
	 echo"<p style='font-size:20pt;color:red'>Failed to save data.</p>";
	 } 
			 }
			 else{
			 echo"<p style='font-size:20pt;color:red'>Repayment was Rejected. You are amount should atleast be equal to interest</p>";
		 }
		 }
			 else{
				 echo"<p style='color:red;font-size:19pt'>Repayment was Rejected. Payment Amount 
				 should be greater than the Fine.</p>";
			 }
			 
		 }
		 else{
			 if($pamt>($interest)){
			 echo"<center>";
			 echo "<p style='font-size:18pt'>Interest =  ".number_format($interest)."</p>";
			 echo "<p style='font-size:18pt'>Fine =  ".number_format($row['fine'])."</p>";
			 echo "<p style='font-size:18pt'>Amount Brought =  ".number_format($pamt)."</p>";
			 $total= $pamt-$interest- $row['fine'];
			 echo "<p style='font-size:18pt'>Actual Amount Repaid =  ".$total."</p>";
			 echo"</center>";
			 $fine=$row['fine'];
	  $lry=mysqli_query($con,"insert into loanRepayment(date,loanAmount,principlePayment,
	  intrest,fine,totalPay,balance,receivedBy,paidBy,AccountNo,loanId)
	  values('$rdate','$amount','$pp','$interest','$fine','$pamt','$tbalance','$recv','$rpaid','$acc','$lid')");
	 //taking Interest to the income table.
	 $nn=$row['Name'];
	 $tmonthly=$row['monthlyInstalment']-$pamt;
	 mysqli_query($con,"insert into income(typeOfIncome,receivedFrom,incomeAmount,date) 
	 values('interest','$nn','$interest','$rdate')");
	 //updating the balance and monthlyInstallment of the loan Table
	 mysqli_query($con,"update loan set balance='$tbalance'"); 
	 mysqli_query($con,"update loan set monthlyInstalment='$tmonthly'");
		 
	 if($lry){
	   echo"<p style='font-size:20pt;color:blue'>Repayment was successfull.</p>";
	 }
		 
	 else{
	 echo"<p style='font-size:20pt;color:red'>Failed to save data.</p>";
	 } 
			 
	
		 }
		 else{
			 echo"<p style='font-size:20pt;color:red'>Repayment was Rejected. You are amount should atleast be equal to interest</p>";
		 }
		 }
		 
	
	}
	 else{
	 echo"<p style='font-size:20pt;color:red'>Either LoanId or AccountNo is Invalid.</p>";
	 }
	}
	?>
	</body>
</html>