<!DOCTYPE HTML>
<?PHP
	require 'function.php';

?>

<html>
	<?PHP includeHead('Settings | Basic Settings',1) ?>
	
	<body>
		<!-- MENU -->
		<?PHP includeMenu(5); ?>
		
	
		<!-- LEFT SIDE: Basic Settings -->	
		<div class="content_settings">
			
			<br/><br/><br/><br/><p style="color:orange;font-size:30pt">REPORT BUILDER</p>
			</div>
			
			<div style="border:5px solid purple;padding:5px 5px;background:gainsboro;font-size:20pt">
			<center style="font-size:15pt">Generate any report you can think about by using the report builder bellow. </center>
			<center style="font-size:15pt">Eg. SELECT * FROM deposit where date > "2018-02-08" </center><br/><br/>
			<form action="" method="post">
			<table style="font-size:30pt">
			<tr style="font-size:20px">
			<td>SELECT</td>
			<td><input style="font-size:20px"type="text"name="field" required></td>
			<td>FROM</td>
			<td><select style="font-size:15px"name="relation" required><option>contribution</option><option>customer</option>
    <option>deposit</option><option>employee</option>
<option> expenses</option><option>loan</option><option>loanrepayment</option>
<option>withdraw</option></select></td>
  <td>WHERE</td>
  <td><input style="font-size:15px"type="text"name="attribute" required></td>
  <td><select style="font-size:20px"name="operator"><option>=</option><option><</option><option>></option>
<option>>=</option><option><=</option></select></td>
<td><input style="font-size:15px"type="text"name="condition" required></td>
<td><input style="font-size:20px"type="submit" name="report"value="OK"></td>
			</tr>
			
			</table><br/><br/><br/>

</div>
				
			</form>
			
		</div>
		<div><center>
		<?php
		echo"<br/><br/>";
		if(isset($_POST['report'])){
			include_once('function.php');
			               $field=$_POST['field'];
$attribute=$_POST['attribute'];
$operator=$_POST['operator'];
$condition=$_POST['condition'];
			if($_POST["relation"]=="contribution")
{
$a=mysqli_query($con,"SELECT $field  FROM contribution WHERE $attribute $operator $condition");
if(mysqli_num_rows($a)>0)
{
   echo"<table border='1'>";
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='6'><center>CONTRIBUTION REPORT</center></td>";
			echo"</tr>";
			echo"<tr style='background:orange'>";
			echo"<td>contributionId.</td>";
			echo"<td>contribution Amount</td>";
			echo"<td>Date of Contribution</td>";
			echo"<td>Recieved By</td>";
			echo"<td>Total contribution.</td>";
			echo"<td>custNo</td>";
			echo"</tr>";
			while($row=mysqli_fetch_array($a)){
			
			echo"<tr style='background:gainsboro'>";
			echo"<td>".$row['contributionId']."</td>";
			echo"<td>".$row['contributionAmount']."</td>";
			echo"<td>".$row['dateOfContribution']."</td>";
			echo"<td>".$row['receivedBy']."</td>";
			echo"<td>".$row['total']."</td>";
			echo"<td>".$row['custNo']."</td>";
			
			echo"</tr>";
			}
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='6'><center>END OF LIST</center></td>";
			echo"</tr>";
			echo"</table>";
}
else{
echo"<p style='font-size:20pt;color:blue'>No records found. Try Again with correct details. </p>";
}
}
//report about customer
if($_POST["relation"]=="customer")
{
$a=mysqli_query($con,"SELECT $field  FROM customer WHERE $attribute $operator $condition");
if(mysqli_num_rows($a)>0)
{
   echo"<table border='1'>";
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='15'><center>CUSTOMER REPORT</center></td>";
			echo"</tr>";
			echo"<tr style='background:orange'>";
			echo"<td>custNo</td>";
			echo"<td>Name</td>";
			echo"<td>Date of Birth</td>";
			echo"<td>Gender</td>";
			echo"<td>Address</td>";
			echo"<td>Telephone</td>";
			echo"<td>Email</td>";
			echo"<td>Occupupation</td>";
			echo"<td>Marital Status</td>";
			echo"<td>next of Kin</td>";
			echo"<td>RelationShip</td>";
			echo"<td>custSince</td>";
			echo"<td>sickness</td>";
			echo"<td>acount Balance</td>";
			echo"<td>Share Amount</td>";
			echo"</tr>";
			while($row=mysqli_fetch_array($a)){
			
			echo"<tr style='background:gainsboro'>";
			echo"<td>".$row['custNo']."</td>";
			echo"<td>".$row['custName']."</td>";
			echo"<td>".$row['custDob']."</td>";
			echo"<td>".$row['custsexId']."</td>";
			echo"<td>".$row['custAddress']."</td>";
			echo"<td>".$row['custPhone']."</td>";
			echo"<td>".$row['custEmail']."</td>";
			echo"<td>".$row['custOccup']."</td>";
			echo"<td>".$row['custmarriedId']."</td>";
			echo"<td>".$row['custHeir']."</td>";
			echo"<td>".$row['custHeirrel']."</td>";
			echo"<td>".$row['custSince']."</td>";
			echo"<td>".$row['custsickId']."</td>";
			echo"<td>".$row['acountBalance']."</td>";
			echo"<td>".$row['totalShare']."</td>";
			
			echo"</tr>";
			}
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='15'><center>END OF LIST</center></td>";
			echo"</tr>";
			echo"</table>";
}
else{
echo"<p style='font-size:20pt;color:blue'>No records found. Try Again with correct details. </p>";
}
}
//report about deposit
if($_POST["relation"]=="deposit")
{
$a=mysqli_query($con,"SELECT $field  FROM deposit WHERE $attribute $operator $condition");
if(mysqli_num_rows($a)>0)
{
   echo"<table border='1'>";
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='8'><center>DEPOSIT REPORT</center></td>";
			echo"</tr>";
			echo"<tr style='background:orange'>";
			echo"<td>depositId</td>";
			echo"<td>customerName</td>";
			echo"<td>depositAmount</td>";
			echo"<td>date</td>";
			echo"<td>paidBy</td>";
			echo"<td>tellerName</td>";
			echo"<td>balance</td>";
			echo"<td>CustomerNo</td>";
			
			echo"</tr>";
			while($row=mysqli_fetch_array($a)){
			
			echo"<tr style='background:gainsboro'>";
			echo"<td>".$row['depositId']."</td>";
			echo"<td>".$row['customerName']."</td>";
			echo"<td>".$row['depositAmount']."</td>";
			echo"<td>".$row['date']."</td>";
			echo"<td>".$row['paidBy']."</td>";
			echo"<td>".$row['tellerName']."</td>";
			echo"<td>".$row['balance']."</td>";
			echo"<td>".$row['CustNo']."</td>";
			
			echo"</tr>";
			}
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='8'><center>END OF LIST</center></td>";
			echo"</tr>";
			echo"</table>";
}
else{
echo"<p style='font-size:20pt;color:blue'>No records found. Try Again with correct details. </p>";
}
}
//report about employee

if($_POST["relation"]=="employee")
{
$a=mysqli_query($con,"SELECT $field  FROM employee WHERE $attribute $operator $condition");
if(mysqli_num_rows($a)>0)
{
   echo"<table border='1'>";
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='11'><center>EMPLOYEE REPORT</center></td>";
			echo"</tr>";
			echo"<tr style='background:orange'>";
			echo"<td> empId</td>";
			echo"<td>name</td>";
			echo"<td>Salary</td>";
			echo"<td>Address</td>";
			echo"<td>Gender</td>";
			echo"<td>Phone</td>";
			echo"<td>Dob</td>";
			echo"<td>Email</td>";
			echo"<td>Status</td>";
			echo"<td>Start</td>";
			echo"<td>Position</td>";
			
			echo"</tr>";
			while($row=mysqli_fetch_array($a)){
			
			echo"<tr style='background:gainsboro'>";
			echo"<td>".$row['empId']."</td>";
			echo"<td>".$row['name']."</td>";
			echo"<td>".$row['empSalary']."</td>";
			echo"<td>".$row['empAddress']."</td>";
			echo"<td>".$row['empGender']."</td>";
			echo"<td>".$row['empPhone']."</td>";
			echo"<td>".$row['empDob']."</td>";
			echo"<td>".$row['empEmail']."</td>";
			echo"<td>".$row['empStatus']."</td>";
			echo"<td>".$row['empStart']."</td>";
			echo"<td>".$row['empPosition']."</td>";
			
			echo"</tr>";
			}
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='11'><center>END OF LIST</center></td>";
			echo"</tr>";
			echo"</table>";
}
else{
echo"<p style='font-size:20pt;color:blue'>No records found. Try Again with correct details. </p>";
}
}
//report about expenses
if($_POST["relation"]=="expenses")
{
$a=mysqli_query($con,"SELECT $field  FROM expenses WHERE $attribute $operator $condition");
if(mysqli_num_rows($a)>0)
{
   echo"<table border='1'>";
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='5'><center>EXPENSES REPORT</center></td>";
			echo"</tr>";
			echo"<tr style='background:orange'>";
			echo"<td>expenseId</td>";
			echo"<td>expenseType</td>";
			echo"<td>expenseAmount</td>";
			echo"<td>date</td>";
			echo"<td>personResponsible</td>";
			echo"</tr>";
			while($row=mysqli_fetch_array($a)){
			
			echo"<tr style='background:gainsboro'>";
			echo"<td>".$row['expenseId']."</td>";
			echo"<td>".$row['expenseType']."</td>";
			echo"<td>".$row['expenseAmount']."</td>";
			echo"<td>".$row['date']."</td>";
			echo"<td>".$row['personResponsible']."</td>";
			echo"</tr>";
			}
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='5'><center>END OF LIST</center></td>";
			echo"</tr>";
			echo"</table>";
}
else{
echo"<p style='font-size:20pt;color:blue'>No records found. Try Again with correct details. </p>";
}
}
//report about loan
if($_POST["relation"]=="loan")
{
$a=mysqli_query($con,"SELECT $field  FROM loan WHERE $attribute $operator $condition");
if(mysqli_num_rows($a)>0)
{
   echo"<table border='1'>";
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='13'><center>LOAN REPORT</center></td>";
			echo"</tr>";
			echo"<tr style='background:orange'>";
			echo"<td>loanId</td>";
			echo"<td>customerName</td>";
			echo"<td>loanAmount</td>";
			echo"<td>dateOfIssue</td>";
			echo"<td>DateOfFinish</td>";
			echo"<td>DueDate</td>";
			echo"<td>status</td>";
			echo"<td>loansOfficer</td>";
			echo"<td>totalToBePaid</td>";
			echo"<td>monthlyInstalment</td>";
			echo"<td>amountPaid</td>";
			echo"<td>balance</td>";
			echo"<td>CustNo</td>";
			echo"</tr>";
			while($row=mysqli_fetch_array($a)){
			
			echo"<tr style='background:gainsboro'>";
			echo"<td>".$row['loanId']."</td>";
			echo"<td>".$row['customerName']."</td>";
			echo"<td>".$row['loanAmount']."</td>";
			echo"<td>".$row['dateOfIssue']."</td>";
			echo"<td>".$row['DateOfFinish']."</td>";
			echo"<td>".$row['DueDate']."</td>";
			echo"<td>".$row['status']."</td>";
			echo"<td>".$row['loansOfficer']."</td>";
			echo"<td>".$row['totalToBePaid']."</td>";
			echo"<td>".$row['monthlyInstalment']."</td>";
			echo"<td>".$row['amountPaid']."</td>";
			echo"<td>".$row['balance']."</td>";
			echo"<td>".$row['CustNo']."</td>";
			echo"</tr>";
			}
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='13'><center>END OF LIST</center></td>";
			echo"</tr>";
			echo"</table>";
}
else{
echo"<p style='font-size:20pt;color:blue'>No records found. Try Again with correct details. </p>";
}
}
//report about loanrepayment
if($_POST["relation"]=="loanrepayment")
{
$a=mysqli_query($con,"SELECT $field  FROM loanrepayment WHERE $attribute $operator $condition");
if(mysqli_num_rows($a)>0)
{
   echo"<table border='1'>";
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='7'><center>LOAN REPAYMENT REPORT</center></td>";
			echo"</tr>";
			echo"<tr style='background:orange'>";
			echo"<td>repaymentId</td>";
			echo"<td>repaymentAmount</td>";
			echo"<td>repaymentDate</td>";
			echo"<td>receivedBy</td>";
			echo"<td>paidBy</td>";
			echo"<td>custNo</td>";
			echo"<td>LoanId</td>";
			
			echo"</tr>";
			while($row=mysqli_fetch_array($a)){
			
			echo"<tr style='background:gainsboro'>";
			echo"<td>".$row['repaymentId']."</td>";
			echo"<td>".$row['repaymentAmount']."</td>";
			echo"<td>".$row['repaymentDate']."</td>";
			echo"<td>".$row['receivedBy']."</td>";
			echo"<td>".$row['paidBy']."</td>";
			echo"<td>".$row['custNo']."</td>";
			echo"<td>".$row['LoanId']."</td>";
			
			echo"</tr>";
			}
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='7'><center>END OF LIST</center></td>";
			echo"</tr>";
			echo"</table>";
}
else{
echo"<p style='font-size:20pt;color:blue'>No records found. Try Again with correct details. </p>";
}
}
//report about withdraw
if($_POST["relation"]=="withdraw")
{
$a=mysqli_query($con,"SELECT $field  FROM withdraw WHERE $attribute $operator $condition");
if(mysqli_num_rows($a)>0)
{
   echo"<table border='1'>";
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='8'><center>WITHDRAW REPORT</center></td>";
			echo"</tr>";
			echo"<tr style='background:orange'>";
			echo"<td>withdrawId</td>";
			echo"<td>customerName</td>";
			echo"<td>withdrawAmount</td>";
			echo"<td>date</td>";
			echo"<td>tellerName</td>";
			echo"<td>balance</td>";
			echo"<td>mgtFees charged</td>";
			echo"<td>CustNo</td>";
			echo"</tr>";
			while($row=mysqli_fetch_array($a)){
			
			echo"<tr style='background:gainsboro'>";
			echo"<td>".$row['withdrawId']."</td>";
			echo"<td>".$row['customerName']."</td>";
			echo"<td>".$row['withdrawAmount']."</td>";
			echo"<td>".$row['date']."</td>";
			echo"<td>".$row['tellerName']."</td>";
			echo"<td>".$row['balance']."</td>";
			echo"<td>".$row['mgtFees']."</td>";
			echo"<td>".$row['CustNo']."</td>";
			echo"</tr>";
			}
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='8'><center>END OF LIST</center></td>";
			echo"</tr>";
			echo"</table>";
}
else{
echo"<p style='font-size:20pt;color:blue'>No records found. Try Again with correct details. </p>";
}
}

}
	        
		
			
			?>
			</center></div>
		
	</body>
</html>