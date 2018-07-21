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
	<form action="customer.php" method="post">
				<p class="heading_narrow">Fill the form bellow to Enter Customer details.</p>
				<table>
				<tr>
				<td>Name:</td>
				<td><input type="text" name="dname" required /></td>
				</tr>
				<tr>
				<td>Date Of Birth:</td>
				<td><input type="date" name="custDob" required/></td>
				</tr>
				<tr>
				<td>Marital status:</td>
				<td><input type="text" name="stt"  required/></td>
				</tr>
				<tr>
				<td>Address</td>
				<td><input type="text" name="custAddress" required/></td>
				</tr>
				<tr>
				<td>Telephone</td>
				<td>
				<input type="text" name="phone" required/>
				</td>
				</tr>
				<tr>
				<td>Email</td>
				<td>
				<input type="email" name="mail"  />
				</td>
				</tr>
				<td>Occupation</td>
				<td>
				<input type="text" name="occup" required/>
				</td>
				</tr>
				<td>Sex</td>
				<td>
				<input type="text" name="sex" required />
				</td>
				<tr>
				</tr>
				<td>Next of kin</td>
				<td>
				<input type="text" name="nok"  />
				</td>
				<tr>
				</tr>
				<td>Relationship</td>
				<td>
				<input type="text" name="rrsp" required/>
				</td>
				
				<tr>
				</tr>
				<td>Place of Birth</td>
				<td>
				<input type="text" name="pob" required/>
				</td>
				<tr>
				</tr>
				<td>Village</td>
				<td>
				<input type="text" name="vill" required/>
				</td>
			    <tr>
				</tr>
				<td>parish</td>
				<td>
				<input type="text" name="pars" required/>
				</td>
				<tr>
				</tr>
				<td>subcounty</td>
				<td>
				<input type="text" name="sbcty" required/>
				</td>
				<tr>
				</tr>
				<td>District</td>
				<td>
				<input type="text" name="dis" required/>
				</td>
				<tr>
				</tr>
				<td>Member since</td>
				<td>
				<input type="text" name="csince" required/>
				</td>
				<tr>
				</tr>
				<td>Account Balance</td>
				<td>
				<input type="text" name="balance" required/>
				</td>
				<tr>
				<td colspan="2"><center><input type="submit" name="rep" value="SAVE" ></center></td>
				</tr>
				</table>
			</form>
	</center>
	<center>
	<?php
	if(isset($_POST['rep'])){
	require_once'enter.php';
	$dname=$_POST['dname'];
	$custDob=$_POST['custDob'];
	$stt=$_POST['stt'];
	$custAddress=$_POST['custAddress'];
	$phone=$_POST['phone'];
	$mail=$_POST['mail'];
	$occup=$_POST['occup'];
	$sex=$_POST['sex'];
	$nok=$_POST['nok'];
	$rrsp=$_POST['rrsp'];
	$pob=$_POST['pob'];
	$vill=$_POST['vill'];
	$pars=$_POST['pars'];
	$sbcty=$_POST['sbcty'];
	$dis=$_POST['dis'];
	$csince=$_POST['csince'];
	$balance=$_POST['balance'];
	
	$a=mysqli_query($con,"insert into customer(Name,custDob,custsexId,custAddress,custPhone,custEmail,custOccup,
	custmarriedId,custHeir,custHeirrel,placeOfBirth,village,parish,subcounty,district,custSince,acountBalance)
	 values('$dname','$custDob','$stt','$custAddress','$phone','$mail','$occup','$sex',
	 '$nok','$rrsp','$pob','$vill','$pars','$sbcty','$dis','$csince','$balance')");
	 if($a){
	 echo"<p style='font-size:20pt;color:red'>Data saved successfully</p>";
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
