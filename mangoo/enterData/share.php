<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="default.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>Leading Software Consultants</title>
</head>
<body>
     <center><h1>Program for saving data only</h1></center>
    
    <div id="sign">
        <h3>click on any of the following sub Menu you want to use.</h3>
<div id='cssmenu'>
<ul>
   <li class='active'><a href='customer.php'><span>customer</span></a></li>
   <li><a href='deposit.php'><span>Deposit</span></a></li>
   <li><a href='expenses.php'><span>expenses</span></a></li>
   <li><a href='income.php'><span>income</span></a></li>
   <li><a href='loan.php'><span>loan</span></a></li>
   <li><a href='loanrepayment.php'><span>loanrepayment</span></a></li>
   <li><a href='share.php'><span>share</span></a></li>
   <li><a href='withdraw.php'><span>withdraw</span></a></li>
</ul>
</div>
    </div>
	<center>
	<form action="share.php" method="post">
				<p class="heading_narrow">Fill the form bellow to Enter share data.</p>
				<table>
				<tr>
				<td>amountPaid:</td>
				<td><input type="number" name="damt"  required/></td>
				</tr>
				<tr>
				<td>totalAmount:</td>
				<td><input type="number" name="ddate"  required/></td>
				
				</tr>
				<tr>
				<td>numberOfShares</td>
				<td><input type="number" name="dpaid"  required/></td>
				</tr>
				<tr>
				<td>totalnumberOfShares</td>
				<td>
				<input type="number" name="teller"  required />
				</td>
				</tr>
				<tr>
				<td>AccountNo</td>
				<td>
				<input type="text" name="date"  required />
				</td>
				</tr>
				<tr>
				<td>date</td>
				<td>
				<input type="date" name="sts"  required />
				</td>
				</tr>
				<tr>
				<td>teller</td>
				<td>
				<input type="text" name="loff"  required />
				</td>
				</tr>
				
				<tr>
				<td colspan="2"><center><input type="submit" name="rep" value="SAVE" ></center></td>
				</tr>
				</table>
			</form>
	</center>
	<center>
	<?php
	require_once'enter.php';
	if(isset($_POST['rep'])){
	$damt=$_POST['damt'];
	$ddate=$_POST['ddate'];
	$dpaid=$_POST['dpaid'];
	$teller=$_POST['teller'];
	$date=$_POST['date'];
	$sts=$_POST['sts'];
	$loff=$_POST['loff'];
	$a=mysqli_query($con,"insert into share(amountPaid,totalAmount,numberOfShares,totalnumberOfShares,AccountNo,date,
	teller)values('$damt','$ddate','$dpaid','$teller','$date','$sts','$loff')");
	 if($a){
	 echo"<p style='font-size:20pt;color:white'>Data saved successfully</p>";
	 }
	 else
	 {
	 echo"<p style='font-size:20pt;color:red>Failed to save data</p>";
	 }
	 }
	?>
	</center>
     <div id="footer"><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<p> <center>Copyright © 2018 Leading Software Consultants.</center></p>
</div>
</body>
<html>
