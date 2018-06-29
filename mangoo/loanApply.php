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
	      <center>
			<form action="loanApply.php" method="post">
				<p class="heading_narrow">Fill the form bellow to apply for a loan.</p>
				<table>
				<tr>
				<td>AccountNo:</td>
				<td><input type="text" name="acc" placeholder="AccountNo." required/></td>
				</tr>
				<tr>
				<td>Amount Applied For:</td>
				<td><input type="number" name="amt" placeholder="Amount" required/></td>
				</tr>
				<tr>
				<td>Securities:</td>
				<td><input type="text" name="sec1" placeholder="security 1" required/></td>
				
				</tr>
				<tr>
				<td></td>
				<td><input type="text" name="sec2" placeholder="security 2" /></td>
				</tr>
				<tr>
				<td>Guarantor 1</td>
				<td>
				<?php
				include_once'function.php';
				$a=mysqli_query($con,"select * from customer");
				echo"<select name='gua1' required>";
				echo"<option>--select--</option>";
				while($row=mysqli_fetch_array($a)){
				echo"<option>".$row['AccountNo']." ".$row['Name']."</option>";
				}
				echo"</select>";
				
				?>
				</td>
				</tr>
				<tr>
				<td>Guarantor 2</td>
				<td>
				<?php
				include_once'function.php';
				$a=mysqli_query($con,"select * from customer");
				echo"<select name='gua2' required>";
				echo"<option>--select--</option>";
				while($row=mysqli_fetch_array($a)){
				echo"<option>".$row['AccountNo']." ".$row['Name']."</option>";
				}
				echo"</select>";
				?>
				</td>
				</tr>
				<tr>
				<td>Spouse:</td>
				<td><input type="text" name="sp" placeholder="Spouse " required/></td>
				</tr>
				<tr>
				<td>
				ApplicationDate:
				</td>
				<td>
				<input type="date" name="appdate" required>
				</td>
				</tr>
				<tr>
				<td>ReceiptNo</td>
				<td><input type="number" name="rec" placeholder="ReceiptNo" required></td>
				</tr>
				<tr>
				<td>Loans Officer</td>
				<td><input type="text" name="lofficer" placeholder="Loans Officer" required></td>
				</tr>
				<tr>
				<td colspan="3">
				<center>
				<input type="submit" name="lapp" value="Finish Application" />
				</center>
				</td>
				</tr>
				</table>
			</form>
			</center>
			
			
		</div>
	<?php
	if(isset($_POST['lapp'])){
	 include_once'function.php';
	 mysqli_query($con,"create table loanApplication(AppId int(20) primary key not null auto_increment,
	 amount int(20),security1 varchar(30),security2 varchar(30),guarantor1 varchar(30),
	 guarantor2 varchar(30),spouse varchar(30),date varchar(10),loansOfficer varchar(30),status varchar(15),AccountNo int(20))");
	 $amt=$_POST['amt'];
	 $sec1=$_POST['sec1'];
	 $sec2=$_POST['sec2'];
	 $gua1=$_POST['gua1'];
	 $gua2=$_POST['gua2'];
	 $sp=$_POST['sp'];
	 $appdate=$_POST['appdate'];
	 $lofficer=$_POST['lofficer'];
	 $acc=$_POST['acc'];
	 $rec=$_POST['rec'];
	 $b=mysqli_query($con,"select * from customer where AccountNo=$acc");
	 $num=mysqli_num_rows($b);
	 $rw=mysqli_fetch_array($b);
	 $name=$rw['Name'];
	 if($num==1){
	 $a=mysqli_query($con,"insert into loanApplication(amount,security1,security2,guarantor1,guarantor2,
	 spouse,date,loansOfficer,status,AccountNo)values('$amt','$sec1','$sec2','$gua1','$gua2',
	 '$sp','$appdate','$lofficer','Pending','$acc')");
	 if($a){
	    $appFee=5000;
	  mysqli_query($con,"insert into income(receiptNo,typeOfIncome,receivedFrom,incomeAmount,date)values('$rec','Loan Application Fee','$name','$appFee','$appdate')");
	 echo"<p style='color:blue;font-size:20pt'>".$name." has successfully applied for a Loan</p>";
	 }
	 }
	 else{
	  echo"<p style='color:blue;font-size:20pt'>Invalid AccountNo. You need to first Register the Customer.</p>";
	 }
	}
	?>
	</body>
</html>