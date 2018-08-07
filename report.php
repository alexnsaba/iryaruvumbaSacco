<?PHP
	require 'function.php';

?>
<!DOCTYPE html>
<html>
	<?PHP includeHead('Settings | Basic Settings',1) ?>
	
	<body>
		<!-- MENU -->
		<?PHP includeMenu(5); ?>
		
	<div id="menu_main" style="margin-left:0.2in;margin-right:1.3in">
			<a href="report.php" id="item_selected">Summarised Report</a>
			<a href="reportdet.php">Detailed report</a>
			
		</div>
		<!-- LEFT SIDE: Basic Settings -->	
		<div class="content_settings">
			
			
			</div>
			
			
			      <form method="post" action="report.php">
    <div class="content_left" style="width:50%; padding-right:5em; ">
        <p><strong><span style="font-size:18pt">Monthly Report.</span></strong></p>
        <table id="tb_fields" style="margin-left:1in">
            <tr>
                <td> Choose a month</td><td><select name="selmonth" required  >
				<option selected>January</option>
				<option>February</option>
				<option>March</option>
				<option>April</option>
				<option>May</option>
				<option>June</option>
				<option>July</option>
				<option>August</option>
				<option>September</option>
				<option>October</option>
				<option>November</option>
				<option>December</option>
				</select></td>
				
                
			</tr>
			<tr>
                <td> Choose a year</td><td><select name="selyear" required  >
				<option>2008</option>
				<option>2009</option>
				<option>2010</option>
				<option>2011</option>
				<option>2012</option>
				<option>2013</option>
				<option>2014</option>
				<option>2015</option>
				<option>2016</option>
				<option>2017</option>
				<option selected>2018</option>
				<option>2019</option>
				<option>2020</option>
				<option>2021</option>
				<option>2022</option>
				<option>2023</option>
				<option>2024</option>
				<option>2025</option>
				<option>2026</option>
				<option>2027</option>
				<option>2028</option>
				<option>2029</option>
				<option>2030</option>
				<option>2031</option>
				<option>2032</option>
				<option>2033</option>
				<option>2034</option>
				<option>2035</option>
				<option>2036</option>
				<option>2037</option>
				<option>2038</option>
				<option>2039</option>
				<option>2040</option>
				</select></td>
				
                
			</tr>
		 <tr>
                <td colspan="4"><center>
                   
                    <input type="submit" name="repsumon" value="Finish Report" style="background:#037881"></center></td>
            </tr>
            
        </table>
		
		<?php
		
		echo"<br/><br/>";
		if(isset($_POST['repsumon'])){
			include_once('function.php');
			//getting a month variable
			if ($_POST['selmonth']=="January"){
				$mon='01';
			}
			if ($_POST['selmonth']=="February"){
				$mon='02';
			}
			if ($_POST['selmonth']=="March"){
				$mon='03';
			}
			if ($_POST['selmonth']=="April"){
				$mon='04';
			}
			if ($_POST['selmonth']=="May"){
				$mon='05';
			}
			if ($_POST['selmonth']=="June"){
				$mon='06';
			}
			if ($_POST['selmonth']=="July"){
				$mon='07';
			}
			if ($_POST['selmonth']=="August"){
				$mon='08';
			}
			if ($_POST['selmonth']=="September"){
				$mon='09';
			}
			if ($_POST['selmonth']=="October"){
				$mon='10';
			}
			if ($_POST['selmonth']=="November"){
				$mon='11';
			}
			if ($_POST['selmonth']=="December"){
				$mon='12';
			}
			//obtaining a year variable
			 $yr=$_POST['selyear'];
			 echo"<p style='color:white;background-color:black;font-size:20pt'>THIS REPORT INCLUDES ALL TRANSACTIONS OF ".$_POST['selmonth']." ".$yr."</p></br>";
			  //getting monthly deposits
			 $a= mysqli_query($con,"select sum(depositAmount) as tdeposit from deposit where MONTH(date)='$mon' and YEAR(date)='$yr'");
		      $rowd = mysqli_fetch_array($a);
			  //getting monthly withdraws
			   $b= mysqli_query($con,"select sum(withdrawAmount) as twithdraw from withdraw where MONTH(date)='$mon' and YEAR(date)='$yr'");
		      $rowwt = mysqli_fetch_array($b);
			  //getting monthly expenses
			  $c= mysqli_query($con,"select sum(expenseAmount) as txp from expenses where MONTH(date)='$mon' and YEAR(date)='$yr'");
		      $rowxp = mysqli_fetch_array($c);
			  //getting monthly income
			  $d= mysqli_query($con,"select sum(incomeAmount) as tinc from income where MONTH(date)='$mon' and YEAR(date)='$yr'");
		      $rowinc = mysqli_fetch_array($d);
			  //getting monthly shares
			  $e= mysqli_query($con,"select sum(amountPaid) as tsh from share where MONTH(date)='$mon' and YEAR(date)='$yr'");
		      $rowsh = mysqli_fetch_array($e);
			  //getting customers registered in a specific month
			   $f= mysqli_query($con,"select * from customer where MONTH(custSince)='$mon' and YEAR(custSince)='$yr'");
		      $rowcust = mysqli_fetch_array($f);
			  $num=mysqli_num_rows($f);
			  //getting monthly loans
			  $g= mysqli_query($con,"select sum(approvedAmount ) as tln from loan where MONTH(dateOfApproval )='$mon' and YEAR(dateOfApproval )='$yr'");
		      $rowln = mysqli_fetch_array($g);
			  //getting monthly loanRepayment
			  $h= mysqli_query($con,"select sum(totalPay) as trep from loanrepayment where MONTH(date)='$mon' and YEAR(date)='$yr'");
		      $rowrep = mysqli_fetch_array($h);
			  echo"<table border='1' style='margin-left:1in'>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SAVINGS</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Deposits</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowd['tdeposit'])."</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Withdrawals</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowwt['twithdraw'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>INCOME STATEMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Expenses</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowxp['txp'])."</td>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Income</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowinc['tinc'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Net Profit</td>";
			  //calculating net profit
			  $net=$rowinc['tinc']-$rowxp['txp'];
			  echo"<td style='font-size:16pt'>".number_format($net)."</td>";
			  echo"</tr>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SHARES</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Share Amount</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowsh['tsh'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>MEMBERS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total members registered</td>";
			  echo"<td style='font-size:16pt'>".number_format( $num)."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOANS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Loan Amount Given out</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowln['tln'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOAN REPAYMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Amount Repaid</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowrep['trep'])."</td>";
			  echo"</tr>";
	        echo"</table></br>";
			echo"<p style='color:blue;font-size:20pt'>END OF MONTHLY REPORT</p>";
		}
			
			?>
			</div>
            </form>
			<form method="post" action="report.php">
		<div class="content_right" style="width:50%; padding-left:5em;"><br/>
			<p><strong><span style="font-size:18pt">Annual Report.</span></strong></p>
         <table id="tb_fields" style="margin-left:1in">
           <tr>
                <td> Choose a year</td><td><select name="selyear" required  >
				<option>2008</option>
				<option>2009</option>
				<option>2010</option>
				<option>2011</option>
				<option>2012</option>
				<option>2013</option>
				<option>2014</option>
				<option>2015</option>
				<option>2016</option>
				<option>2017</option>
				<option selected>2018</option>
				<option>2019</option>
				<option>2020</option>
				<option>2021</option>
				<option>2022</option>
				<option>2023</option>
				<option>2024</option>
				<option>2025</option>
				<option>2026</option>
				<option>2027</option>
				<option>2028</option>
				<option>2029</option>
				<option>2030</option>
				<option>2031</option>
				<option>2032</option>
				<option>2033</option>
				<option>2034</option>
				<option>2035</option>
				<option>2036</option>
				<option>2037</option>
				<option>2038</option>
				<option>2039</option>
				<option>2040</option>
				</select></td>
				</tr>
				<tr>
                <td colspan="4"><center>
                   
                    <input type="submit" name="repsuanu" value="Finish Report" style="background:#037881"></center></td>
            </tr>
			</table>
			<?php
		
		echo"<br/><br/>";
		if(isset($_POST['repsuanu'])){
			include_once('function.php');
			$yr=$_POST['selyear'];
			 echo"<p style='color:white;background-color:black;font-size:20pt'>THIS REPORT INCLUDES ALL TRANSACTIONS OF YEAR ".$yr."</p></br>";
			
			
			echo"<p style='color:blue;font-size:17pt'>January</p></br>";
			//processing january Report
			  //getting monthly deposits
			 $a= mysqli_query($con,"select sum(depositAmount) as tdeposit from deposit where MONTH(date)='01' and YEAR(date)='$yr'");
		      $rowd1 = mysqli_fetch_array($a);
			  //getting monthly withdraws
			   $b= mysqli_query($con,"select sum(withdrawAmount) as twithdraw from withdraw where MONTH(date)='01' and YEAR(date)='$yr'");
		      $rowwt1 = mysqli_fetch_array($b);
			  //getting monthly expenses
			  $c= mysqli_query($con,"select sum(expenseAmount) as txp from expenses where MONTH(date)='01' and YEAR(date)='$yr'");
		      $rowxp1 = mysqli_fetch_array($c);
			  //getting monthly income
			  $d= mysqli_query($con,"select sum(incomeAmount) as tinc from income where MONTH(date)='01' and YEAR(date)='$yr'");
		      $rowinc1 = mysqli_fetch_array($d);
			  //getting monthly shares
			  $e= mysqli_query($con,"select sum(amountPaid) as tsh from share where MONTH(date)='01' and YEAR(date)='$yr'");
		      $rowsh1 = mysqli_fetch_array($e);
			  //getting customers registered in a specific month
			   $f= mysqli_query($con,"select * from customer where MONTH(custSince)='01' and YEAR(custSince)='$yr'");
		      $rowcust1 = mysqli_fetch_array($f);
			  $num1=mysqli_num_rows($f);
			  //getting monthly loans
			  $g= mysqli_query($con,"select sum(approvedAmount ) as tln from loan where MONTH(dateOfApproval )='01' and YEAR(dateOfApproval )='$yr'");
		      $rowln1 = mysqli_fetch_array($g);
			  //getting monthly loanRepayment
			  $h= mysqli_query($con,"select sum(totalPay) as trep from loanrepayment where MONTH(date)='01' and YEAR(date)='$yr'");
		      $rowrep1 = mysqli_fetch_array($h);
			  echo"<table border='1' style='margin-left:1in'>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SAVINGS</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Deposits</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowd1['tdeposit'])."</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Withdrawals</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowwt1['twithdraw'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>INCOME STATEMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Expenses</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowxp1['txp'])."</td>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Income</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowinc1['tinc'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Net Profit</td>";
			  //calculating net profit
			  $net=$rowinc1['tinc']-$rowxp1['txp'];
			  echo"<td style='font-size:16pt'>".number_format($net)."</td>";
			  echo"</tr>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SHARES</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Share Amount</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowsh1['tsh'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>MEMBERS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total members registered</td>";
			  echo"<td style='font-size:16pt'>".number_format( $num1)."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOANS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Loan Amount Given out</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowln1['tln'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOAN REPAYMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Amount Repaid</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowrep1['trep'])."</td>";
			  echo"</tr>";
	        echo"</table></br>";


echo"<p style='color:blue;font-size:17pt'>February</p></br>";
			//processing february Report
			  //getting monthly deposits
			 $a2= mysqli_query($con,"select sum(depositAmount) as tdeposit from deposit where MONTH(date)='02' and YEAR(date)='$yr'");
		      $rowd2 = mysqli_fetch_array($a2);
			  //getting monthly withdraws
			   $b2= mysqli_query($con,"select sum(withdrawAmount) as twithdraw from withdraw where MONTH(date)='02' and YEAR(date)='$yr'");
		      $rowwt2 = mysqli_fetch_array($b2);
			  //getting monthly expenses
			  $c2= mysqli_query($con,"select sum(expenseAmount) as txp from expenses where MONTH(date)='02' and YEAR(date)='$yr'");
		      $rowxp2 = mysqli_fetch_array($c2);
			  //getting monthly income
			  $d2= mysqli_query($con,"select sum(incomeAmount) as tinc from income where MONTH(date)='02' and YEAR(date)='$yr'");
		      $rowinc2 = mysqli_fetch_array($d2);
			  //getting monthly shares
			  $e2= mysqli_query($con,"select sum(amountPaid) as tsh from share where MONTH(date)='02' and YEAR(date)='$yr'");
		      $rowsh2 = mysqli_fetch_array($e2);
			  //getting customers registered in a specific month
			   $f2= mysqli_query($con,"select * from customer where MONTH(custSince)='02' and YEAR(custSince)='$yr'");
		      $rowcust2 = mysqli_fetch_array($f2);
			  $num2=mysqli_num_rows($f2);
			  //getting monthly loans
			  $g2= mysqli_query($con,"select sum(approvedAmount ) as tln from loan where MONTH(dateOfApproval )='02' and YEAR(dateOfApproval )='$yr'");
		      $rowln2 = mysqli_fetch_array($g2);
			  //getting monthly loanRepayment
			  $h2= mysqli_query($con,"select sum(totalPay) as trep from loanrepayment where MONTH(date)='02' and YEAR(date)='$yr'");
		      $rowrep2 = mysqli_fetch_array($h2);
			  echo"<table border='1' style='margin-left:1in'>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SAVINGS</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Deposits</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowd2['tdeposit'])."</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Withdrawals</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowwt2['twithdraw'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>INCOME STATEMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Expenses</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowxp2['txp'])."</td>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Income</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowinc2['tinc'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Net Profit</td>";
			  //calculating net profit
			  $net2=$rowinc2['tinc']-$rowxp2['txp'];
			  echo"<td style='font-size:16pt'>".number_format($net2)."</td>";
			  echo"</tr>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SHARES</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Share Amount</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowsh2['tsh'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>MEMBERS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total members registered</td>";
			  echo"<td style='font-size:16pt'>".number_format( $num2)."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOANS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Loan Amount Given out</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowln2['tln'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOAN REPAYMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Amount Repaid</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowrep2['trep'])."</td>";
			  echo"</tr>";
	        echo"</table></br>";

		
      echo"<p style='color:blue;font-size:17pt'>March</p></br>";
			//processing march Report
			  //getting monthly deposits
			 $a3= mysqli_query($con,"select sum(depositAmount) as tdeposit from deposit where MONTH(date)='03' and YEAR(date)='$yr'");
		      $rowd3 = mysqli_fetch_array($a3);
			  //getting monthly withdraws
			   $b3= mysqli_query($con,"select sum(withdrawAmount) as twithdraw from withdraw where MONTH(date)='03' and YEAR(date)='$yr'");
		      $rowwt3 = mysqli_fetch_array($b3);
			  //getting monthly expenses
			  $c3= mysqli_query($con,"select sum(expenseAmount) as txp from expenses where MONTH(date)='03' and YEAR(date)='$yr'");
		      $rowxp3 = mysqli_fetch_array($c3);
			  //getting monthly income
			  $d3= mysqli_query($con,"select sum(incomeAmount) as tinc from income where MONTH(date)='03' and YEAR(date)='$yr'");
		      $rowinc3 = mysqli_fetch_array($d3);
			  //getting monthly shares
			  $e3= mysqli_query($con,"select sum(amountPaid) as tsh from share where MONTH(date)='03' and YEAR(date)='$yr'");
		      $rowsh3 = mysqli_fetch_array($e3);
			  //getting customers registered in a specific month
			   $f3= mysqli_query($con,"select * from customer where MONTH(custSince)='03' and YEAR(custSince)='$yr'");
		      $rowcust3 = mysqli_fetch_array($f3);
			  $num3=mysqli_num_rows($f3);
			  //getting monthly loans
			  $g3= mysqli_query($con,"select sum(approvedAmount ) as tln from loan where MONTH(dateOfApproval )='03' and YEAR(dateOfApproval )='$yr'");
		      $rowln3 = mysqli_fetch_array($g3);
			  //getting monthly loanRepayment
			  $h3= mysqli_query($con,"select sum(totalPay) as trep from loanrepayment where MONTH(date)='03' and YEAR(date)='$yr'");
		      $rowrep3 = mysqli_fetch_array($h3);
			  echo"<table border='1' style='margin-left:1in'>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SAVINGS</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Deposits</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowd3['tdeposit'])."</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Withdrawals</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowwt3['twithdraw'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>INCOME STATEMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Expenses</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowxp3['txp'])."</td>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Income</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowinc3['tinc'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Net Profit</td>";
			  //calculating net profit
			  $net3=$rowinc3['tinc']-$rowxp3['txp'];
			  echo"<td style='font-size:16pt'>".number_format($net3)."</td>";
			  echo"</tr>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SHARES</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Share Amount</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowsh3['tsh'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>MEMBERS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total members registered</td>";
			  echo"<td style='font-size:16pt'>".number_format( $num3)."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOANS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Loan Amount Given out</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowln3['tln'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOAN REPAYMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Amount Repaid</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowrep3['trep'])."</td>";
			  echo"</tr>";
	          echo"</table></br>";


echo"<p style='color:blue;font-size:17pt'>April</p></br>";
			//processing April Report
			  //getting monthly deposits
			 $a4= mysqli_query($con,"select sum(depositAmount) as tdeposit from deposit where MONTH(date)='04' and YEAR(date)='$yr'");
		      $rowd4 = mysqli_fetch_array($a4);
			  //getting monthly withdraws
			   $b4= mysqli_query($con,"select sum(withdrawAmount) as twithdraw from withdraw where MONTH(date)='04' and YEAR(date)='$yr'");
		      $rowwt4 = mysqli_fetch_array($b4);
			  //getting monthly expenses
			  $c4= mysqli_query($con,"select sum(expenseAmount) as txp from expenses where MONTH(date)='04' and YEAR(date)='$yr'");
		      $rowxp4 = mysqli_fetch_array($c4);
			  //getting monthly income
			  $d4= mysqli_query($con,"select sum(incomeAmount) as tinc from income where MONTH(date)='04' and YEAR(date)='$yr'");
		      $rowinc4 = mysqli_fetch_array($d4);
			  //getting monthly shares
			  $e4= mysqli_query($con,"select sum(amountPaid) as tsh from share where MONTH(date)='04' and YEAR(date)='$yr'");
		      $rowsh4 = mysqli_fetch_array($e4);
			  //getting customers registered in a specific month
			   $f4= mysqli_query($con,"select * from customer where MONTH(custSince)='04' and YEAR(custSince)='$yr'");
		      $rowcust4 = mysqli_fetch_array($f4);
			  $num4=mysqli_num_rows($f4);
			  //getting monthly loans
			  $g4= mysqli_query($con,"select sum(approvedAmount ) as tln from loan where MONTH(dateOfApproval )='04' and YEAR(dateOfApproval )='$yr'");
		      $rowln4 = mysqli_fetch_array($g4);
			  //getting monthly loanRepayment
			  $h4= mysqli_query($con,"select sum(totalPay) as trep from loanrepayment where MONTH(date)='04' and YEAR(date)='$yr'");
		      $rowrep4 = mysqli_fetch_array($h4);
			  echo"<table border='1' style='margin-left:1in'>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SAVINGS</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Deposits</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowd4['tdeposit'])."</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Withdrawals</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowwt4['twithdraw'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>INCOME STATEMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Expenses</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowxp4['txp'])."</td>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Income</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowinc4['tinc'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Net Profit</td>";
			  //calculating net profit
			  $net4=$rowinc4['tinc']-$rowxp4['txp'];
			  echo"<td style='font-size:16pt'>".number_format($net4)."</td>";
			  echo"</tr>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SHARES</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Share Amount</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowsh4['tsh'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>MEMBERS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total members registered</td>";
			  echo"<td style='font-size:16pt'>".number_format( $num4)."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOANS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Loan Amount Given out</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowln4['tln'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOAN REPAYMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Amount Repaid</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowrep4['trep'])."</td>";
			  echo"</tr>";
	        echo"</table></br>";


echo"<p style='color:blue;font-size:17pt'>May</p></br>";
			//processing may Report
			  //getting monthly deposits
			 $a5= mysqli_query($con,"select sum(depositAmount) as tdeposit from deposit where MONTH(date)='05' and YEAR(date)='$yr'");
		      $rowd5 = mysqli_fetch_array($a5);
			  //getting monthly withdraws
			   $b5= mysqli_query($con,"select sum(withdrawAmount) as twithdraw from withdraw where MONTH(date)='05' and YEAR(date)='$yr'");
		      $rowwt5 = mysqli_fetch_array($b5);
			  //getting monthly expenses
			  $c5= mysqli_query($con,"select sum(expenseAmount) as txp from expenses where MONTH(date)='05' and YEAR(date)='$yr'");
		      $rowxp5 = mysqli_fetch_array($c5);
			  //getting monthly income
			  $d5= mysqli_query($con,"select sum(incomeAmount) as tinc from income where MONTH(date)='05' and YEAR(date)='$yr'");
		      $rowinc5 = mysqli_fetch_array($d5);
			  //getting monthly shares
			  $e5= mysqli_query($con,"select sum(amountPaid) as tsh from share where MONTH(date)='05' and YEAR(date)='$yr'");
		      $rowsh5 = mysqli_fetch_array($e5);
			  //getting customers registered in a specific month
			   $f5= mysqli_query($con,"select * from customer where MONTH(custSince)='05' and YEAR(custSince)='$yr'");
		      $rowcust5 = mysqli_fetch_array($f5);
			  $num5=mysqli_num_rows($f5);
			  //getting monthly loans
			  $g5= mysqli_query($con,"select sum(approvedAmount ) as tln from loan where MONTH(dateOfApproval )='05' and YEAR(dateOfApproval )='$yr'");
		      $rowln5 = mysqli_fetch_array($g5);
			  //getting monthly loanRepayment
			  $h5= mysqli_query($con,"select sum(totalPay) as trep from loanrepayment where MONTH(date)='05' and YEAR(date)='$yr'");
		      $rowrep5 = mysqli_fetch_array($h5);
			  echo"<table border='1' style='margin-left:1in'>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SAVINGS</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Deposits</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowd5['tdeposit'])."</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Withdrawals</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowwt5['twithdraw'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>INCOME STATEMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Expenses</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowxp5['txp'])."</td>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Income</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowinc5['tinc'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Net Profit</td>";
			  //calculating net profit
			  $net5=$rowinc5['tinc']-$rowxp5['txp'];
			  echo"<td style='font-size:16pt'>".number_format($net5)."</td>";
			  echo"</tr>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SHARES</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Share Amount</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowsh5['tsh'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>MEMBERS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total members registered</td>";
			  echo"<td style='font-size:16pt'>".number_format( $num5)."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOANS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Loan Amount Given out</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowln5['tln'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOAN REPAYMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Amount Repaid</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowrep5['trep'])."</td>";
			  echo"</tr>";
	        echo"</table></br>";


echo"<p style='color:blue;font-size:17pt'>June</p></br>";
			//processing June Report
			  //getting monthly deposits
			 $a6= mysqli_query($con,"select sum(depositAmount) as tdeposit from deposit where MONTH(date)='06' and YEAR(date)='$yr'");
		      $rowd6 = mysqli_fetch_array($a6);
			  //getting monthly withdraws
			   $b6= mysqli_query($con,"select sum(withdrawAmount) as twithdraw from withdraw where MONTH(date)='06' and YEAR(date)='$yr'");
		      $rowwt6 = mysqli_fetch_array($b6);
			  //getting monthly expenses
			  $c6= mysqli_query($con,"select sum(expenseAmount) as txp from expenses where MONTH(date)='06' and YEAR(date)='$yr'");
		      $rowxp6 = mysqli_fetch_array($c6);
			  //getting monthly income
			  $d6= mysqli_query($con,"select sum(incomeAmount) as tinc from income where MONTH(date)='06' and YEAR(date)='$yr'");
		      $rowinc6 = mysqli_fetch_array($d6);
			  //getting monthly shares
			  $e6= mysqli_query($con,"select sum(amountPaid) as tsh from share where MONTH(date)='06' and YEAR(date)='$yr'");
		      $rowsh6 = mysqli_fetch_array($e6);
			  //getting customers registered in a specific month
			   $f6= mysqli_query($con,"select * from customer where MONTH(custSince)='06' and YEAR(custSince)='$yr'");
		      $rowcust6 = mysqli_fetch_array($f6);
			  $num6=mysqli_num_rows($f6);
			  //getting monthly loans
			  $g6= mysqli_query($con,"select sum(approvedAmount ) as tln from loan where MONTH(dateOfApproval )='06' and YEAR(dateOfApproval )='$yr'");
		      $rowln6 = mysqli_fetch_array($g6);
			  //getting monthly loanRepayment
			  $h6= mysqli_query($con,"select sum(totalPay) as trep from loanrepayment where MONTH(date)='06' and YEAR(date)='$yr'");
		      $rowrep6 = mysqli_fetch_array($h6);
			  echo"<table border='1' style='margin-left:1in'>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SAVINGS</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Deposits</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowd6['tdeposit'])."</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Withdrawals</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowwt6['twithdraw'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>INCOME STATEMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Expenses</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowxp6['txp'])."</td>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Income</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowinc6['tinc'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Net Profit</td>";
			  //calculating net profit
			  $net6=$rowinc6['tinc']-$rowxp6['txp'];
			  echo"<td style='font-size:16pt'>".number_format($net6)."</td>";
			  echo"</tr>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SHARES</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Share Amount</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowsh6['tsh'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>MEMBERS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total members registered</td>";
			  echo"<td style='font-size:16pt'>".number_format( $num6)."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOANS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Loan Amount Given out</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowln6['tln'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOAN REPAYMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Amount Repaid</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowrep6['trep'])."</td>";
			  echo"</tr>";
	        echo"</table></br>";


echo"<p style='color:blue;font-size:17pt'>July</p></br>";
			//processing july Report
			  //getting monthly deposits
			 $a7= mysqli_query($con,"select sum(depositAmount) as tdeposit from deposit where MONTH(date)='07' and YEAR(date)='$yr'");
		      $rowd7 = mysqli_fetch_array($a7);
			  //getting monthly withdraws
			   $b7= mysqli_query($con,"select sum(withdrawAmount) as twithdraw from withdraw where MONTH(date)='07' and YEAR(date)='$yr'");
		      $rowwt7 = mysqli_fetch_array($b7);
			  //getting monthly expenses
			  $c7= mysqli_query($con,"select sum(expenseAmount) as txp from expenses where MONTH(date)='07' and YEAR(date)='$yr'");
		      $rowxp7 = mysqli_fetch_array($c7);
			  //getting monthly income
			  $d7= mysqli_query($con,"select sum(incomeAmount) as tinc from income where MONTH(date)='07' and YEAR(date)='$yr'");
		      $rowinc7 = mysqli_fetch_array($d7);
			  //getting monthly shares
			  $e7= mysqli_query($con,"select sum(amountPaid) as tsh from share where MONTH(date)='07' and YEAR(date)='$yr'");
		      $rowsh7 = mysqli_fetch_array($e7);
			  //getting customers registered in a specific month
			   $f7= mysqli_query($con,"select * from customer where MONTH(custSince)='07' and YEAR(custSince)='$yr'");
		      $rowcust7 = mysqli_fetch_array($f7);
			  $num7=mysqli_num_rows($f7);
			  //getting monthly loans
			  $g7= mysqli_query($con,"select sum(approvedAmount ) as tln from loan where MONTH(dateOfApproval )='07' and YEAR(dateOfApproval )='$yr'");
		      $rowln7 = mysqli_fetch_array($g7);
			  //getting monthly loanRepayment
			  $h7= mysqli_query($con,"select sum(totalPay) as trep from loanrepayment where MONTH(date)='08' and YEAR(date)='$yr'");
		      $rowrep7 = mysqli_fetch_array($h7);
			  echo"<table border='1' style='margin-left:1in'>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SAVINGS</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Deposits</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowd7['tdeposit'])."</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Withdrawals</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowwt7['twithdraw'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>INCOME STATEMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Expenses</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowxp7['txp'])."</td>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Income</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowinc7['tinc'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Net Profit</td>";
			  //calculating net profit
			  $net7=$rowinc7['tinc']-$rowxp7['txp'];
			  echo"<td style='font-size:16pt'>".number_format($net7)."</td>";
			  echo"</tr>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SHARES</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Share Amount</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowsh7['tsh'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>MEMBERS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total members registered</td>";
			  echo"<td style='font-size:16pt'>".number_format( $num7)."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOANS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Loan Amount Given out</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowln7['tln'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOAN REPAYMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Amount Repaid</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowrep7['trep'])."</td>";
			  echo"</tr>";
	        echo"</table></br>";	


		echo"<p style='color:blue;font-size:17pt'>August</p></br>";
			//processing August Report
			  //getting monthly deposits
			 $a8 = mysqli_query($con,"select sum(depositAmount) as tdeposit from deposit where MONTH(date)='08' and YEAR(date)='$yr'");
		      $rowd8 = mysqli_fetch_array($a8);
			  //getting monthly withdraws
			   $b8= mysqli_query($con,"select sum(withdrawAmount) as twithdraw from withdraw where MONTH(date)='08' and YEAR(date)='$yr'");
		      $rowwt8 = mysqli_fetch_array($b8);
			  //getting monthly expenses
			  $c8= mysqli_query($con,"select sum(expenseAmount) as txp from expenses where MONTH(date)='08' and YEAR(date)='$yr'");
		      $rowxp8 = mysqli_fetch_array($c8);
			  //getting monthly income
			  $d8= mysqli_query($con,"select sum(incomeAmount) as tinc from income where MONTH(date)='08' and YEAR(date)='$yr'");
		      $rowinc8 = mysqli_fetch_array($d8);
			  //getting monthly shares
			  $e8= mysqli_query($con,"select sum(amountPaid) as tsh from share where MONTH(date)='08' and YEAR(date)='$yr'");
		      $rowsh8 = mysqli_fetch_array($e8);
			  //getting customers registered in a specific month
			   $f8= mysqli_query($con,"select * from customer where MONTH(custSince)='08' and YEAR(custSince)='$yr'");
		      $rowcust8 = mysqli_fetch_array($f8);
			  $num8=mysqli_num_rows($f8);
			  //getting monthly loans
			  $g8= mysqli_query($con,"select sum(approvedAmount ) as tln from loan where MONTH(dateOfApproval )='08' and YEAR(dateOfApproval )='$yr'");
		      $rowln8 = mysqli_fetch_array($g8);
			  //getting monthly loanRepayment
			  $h8= mysqli_query($con,"select sum(totalPay) as trep from loanrepayment where MONTH(date)='08' and YEAR(date)='$yr'");
		      $rowrep8 = mysqli_fetch_array($h8);
			  echo"<table border='1' style='margin-left:1in'>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SAVINGS</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Deposits</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowd8['tdeposit'])."</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Withdrawals</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowwt8['twithdraw'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>INCOME STATEMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Expenses</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowxp8['txp'])."</td>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Income</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowinc8['tinc'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Net Profit</td>";
			  //calculating net profit
			  $net8=$rowinc8['tinc']-$rowxp8['txp'];
			  echo"<td style='font-size:16pt'>".number_format($net8)."</td>";
			  echo"</tr>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SHARES</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Share Amount</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowsh8['tsh'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>MEMBERS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total members registered</td>";
			  echo"<td style='font-size:16pt'>".number_format( $num8)."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOANS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Loan Amount Given out</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowln8['tln'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOAN REPAYMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Amount Repaid</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowrep8['trep'])."</td>";
			  echo"</tr>";
	        echo"</table></br>";


echo"<p style='color:blue;font-size:17pt'>September</p></br>";
			//processing september Report
			  //getting monthly deposits
			 $a9= mysqli_query($con,"select sum(depositAmount) as tdeposit from deposit where MONTH(date)='09' and YEAR(date)='$yr'");
		      $rowd9 = mysqli_fetch_array($a9);
			  //getting monthly withdraws
			   $b9= mysqli_query($con,"select sum(withdrawAmount) as twithdraw from withdraw where MONTH(date)='09' and YEAR(date)='$yr'");
		      $rowwt9 = mysqli_fetch_array($b9);
			  //getting monthly expenses
			  $c9= mysqli_query($con,"select sum(expenseAmount) as txp from expenses where MONTH(date)='09' and YEAR(date)='$yr'");
		      $rowxp9 = mysqli_fetch_array($c9);
			  //getting monthly income
			  $d9= mysqli_query($con,"select sum(incomeAmount) as tinc from income where MONTH(date)='09' and YEAR(date)='$yr'");
		      $rowinc9 = mysqli_fetch_array($d9);
			  //getting monthly shares
			  $e9= mysqli_query($con,"select sum(amountPaid) as tsh from share where MONTH(date)='09' and YEAR(date)='$yr'");
		      $rowsh9 = mysqli_fetch_array($e9);
			  //getting customers registered in a specific month
			   $f9= mysqli_query($con,"select * from customer where MONTH(custSince)='09' and YEAR(custSince)='$yr'");
		      $rowcust9 = mysqli_fetch_array($f9);
			  $num9=mysqli_num_rows($f9);
			  //getting monthly loans
			  $g9= mysqli_query($con,"select sum(approvedAmount ) as tln from loan where MONTH(dateOfApproval )='09' and YEAR(dateOfApproval )='$yr'");
		      $rowln9 = mysqli_fetch_array($g9);
			  //getting monthly loanRepayment
			  $h9= mysqli_query($con,"select sum(totalPay) as trep from loanrepayment where MONTH(date)='09' and YEAR(date)='$yr'");
		      $rowrep9 = mysqli_fetch_array($h9);
			  echo"<table border='1' style='margin-left:1in'>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SAVINGS</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Deposits</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowd9['tdeposit'])."</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Withdrawals</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowwt9['twithdraw'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>INCOME STATEMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Expenses</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowxp9['txp'])."</td>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Income</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowinc9['tinc'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Net Profit</td>";
			  //calculating net profit
			  $net9=$rowinc9['tinc']-$rowxp9['txp'];
			  echo"<td style='font-size:16pt'>".number_format($net9)."</td>";
			  echo"</tr>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SHARES</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Share Amount</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowsh9['tsh'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>MEMBERS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total members registered</td>";
			  echo"<td style='font-size:16pt'>".number_format( $num9)."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOANS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Loan Amount Given out</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowln9['tln'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOAN REPAYMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Amount Repaid</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowrep9['trep'])."</td>";
			  echo"</tr>";
	        echo"</table></br>";


echo"<p style='color:blue;font-size:17pt'>October</p></br>";
			//processing october Report
			  //getting monthly deposits
			 $a10= mysqli_query($con,"select sum(depositAmount) as tdeposit from deposit where MONTH(date)='10' and YEAR(date)='$yr'");
		      $rowd10= mysqli_fetch_array($a10);
			  //getting monthly withdraws
			   $b10= mysqli_query($con,"select sum(withdrawAmount) as twithdraw from withdraw where MONTH(date)='10' and YEAR(date)='$yr'");
		      $rowwt10 = mysqli_fetch_array($b10);
			  //getting monthly expenses
			  $c10= mysqli_query($con,"select sum(expenseAmount) as txp from expenses where MONTH(date)='10' and YEAR(date)='$yr'");
		      $rowxp10 = mysqli_fetch_array($c10);
			  //getting monthly income
			  $d10= mysqli_query($con,"select sum(incomeAmount) as tinc from income where MONTH(date)='10' and YEAR(date)='$yr'");
		      $rowinc10 = mysqli_fetch_array($d10);
			  //getting monthly shares
			  $e10= mysqli_query($con,"select sum(amountPaid) as tsh from share where MONTH(date)='10' and YEAR(date)='$yr'");
		      $rowsh10 = mysqli_fetch_array($e10);
			  //getting customers registered in a specific month
			   $f10= mysqli_query($con,"select * from customer where MONTH(custSince)='10' and YEAR(custSince)='$yr'");
		      $rowcust10 = mysqli_fetch_array($f10);
			  $num10=mysqli_num_rows($f10);
			  //getting monthly loans
			  $g10= mysqli_query($con,"select sum(approvedAmount ) as tln from loan where MONTH(dateOfApproval )='10' and YEAR(dateOfApproval )='$yr'");
		      $rowln10 = mysqli_fetch_array($g10);
			  //getting monthly loanRepayment
			  $h10= mysqli_query($con,"select sum(totalPay) as trep from loanrepayment where MONTH(date)='10' and YEAR(date)='$yr'");
		      $rowrep10 = mysqli_fetch_array($h10);
			  echo"<table border='1' style='margin-left:1in'>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SAVINGS</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Deposits</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowd10['tdeposit'])."</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Withdrawals</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowwt10['twithdraw'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>INCOME STATEMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Expenses</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowxp10['txp'])."</td>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Income</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowinc10['tinc'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Net Profit</td>";
			  //calculating net profit
			  $net10=$rowinc10['tinc']-$rowxp10['txp'];
			  echo"<td style='font-size:16pt'>".number_format($net10)."</td>";
			  echo"</tr>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SHARES</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Share Amount</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowsh10['tsh'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>MEMBERS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total members registered</td>";
			  echo"<td style='font-size:16pt'>".number_format( $num10)."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOANS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Loan Amount Given out</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowln10['tln'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOAN REPAYMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Amount Repaid</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowrep10['trep'])."</td>";
			  echo"</tr>";
	        echo"</table></br>";


echo"<p style='color:blue;font-size:17pt'>November</p></br>";
			//processing November Report
			  //getting monthly deposits
			 $a11 = mysqli_query($con,"select sum(depositAmount) as tdeposit from deposit where MONTH(date)='11' and YEAR(date)='$yr'");
		      $rowd11 = mysqli_fetch_array($a11);
			  //getting monthly withdraws
			   $b11 = mysqli_query($con,"select sum(withdrawAmount) as twithdraw from withdraw where MONTH(date)='11' and YEAR(date)='$yr'");
		      $rowwt11 = mysqli_fetch_array($b11);
			  //getting monthly expenses
			  $c11= mysqli_query($con,"select sum(expenseAmount) as txp from expenses where MONTH(date)='11' and YEAR(date)='$yr'");
		      $rowxp11 = mysqli_fetch_array($c11);
			  //getting monthly income
			  $d11= mysqli_query($con,"select sum(incomeAmount) as tinc from income where MONTH(date)='11' and YEAR(date)='$yr'");
		      $rowinc11 = mysqli_fetch_array($d11);
			  //getting monthly shares
			  $e11= mysqli_query($con,"select sum(amountPaid) as tsh from share where MONTH(date)='11' and YEAR(date)='$yr'");
		      $rowsh11 = mysqli_fetch_array($e11);
			  //getting customers registered in a specific month
			   $f11= mysqli_query($con,"select * from customer where MONTH(custSince)='11' and YEAR(custSince)='$yr'");
		      $rowcust11 = mysqli_fetch_array($f11);
			  $num11=mysqli_num_rows($f11);
			  //getting monthly loans
			  $g11= mysqli_query($con,"select sum(approvedAmount ) as tln from loan where MONTH(dateOfApproval )='11' and YEAR(dateOfApproval )='$yr'");
		      $rowln11 = mysqli_fetch_array($g11);
			  //getting monthly loanRepayment
			  $h11= mysqli_query($con,"select sum(totalPay) as trep from loanrepayment where MONTH(date)='11' and YEAR(date)='$yr'");
		      $rowrep11 = mysqli_fetch_array($h11);
			  echo"<table border='1' style='margin-left:1in'>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SAVINGS</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Deposits</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowd11['tdeposit'])."</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Withdrawals</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowwt11['twithdraw'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>INCOME STATEMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Expenses</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowxp11['txp'])."</td>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Income</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowinc11['tinc'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Net Profit</td>";
			  //calculating net profit
			  $net11=$rowinc11['tinc']-$rowxp11['txp'];
			  echo"<td style='font-size:16pt'>".number_format($net11)."</td>";
			  echo"</tr>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SHARES</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Share Amount</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowsh11['tsh'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>MEMBERS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total members registered</td>";
			  echo"<td style='font-size:16pt'>".number_format( $num11)."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOANS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Loan Amount Given out</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowln11['tln'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOAN REPAYMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Amount Repaid</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowrep11['trep'])."</td>";
			  echo"</tr>";
	        echo"</table></br>";


echo"<p style='color:blue;font-size:17pt'>December</p></br>";
			//processing december Report
			  //getting monthly deposits
			 $a12= mysqli_query($con,"select sum(depositAmount) as tdeposit from deposit where MONTH(date)='11' and YEAR(date)='$yr'");
		      $rowd12 = mysqli_fetch_array($a12);
			  //getting monthly withdraws
			   $b12= mysqli_query($con,"select sum(withdrawAmount) as twithdraw from withdraw where MONTH(date)='11' and YEAR(date)='$yr'");
		      $rowwt12 = mysqli_fetch_array($b12);
			  //getting monthly expenses
			  $c12= mysqli_query($con,"select sum(expenseAmount) as txp from expenses where MONTH(date)='11' and YEAR(date)='$yr'");
		      $rowxp12 = mysqli_fetch_array($c12);
			  //getting monthly income
			  $d12= mysqli_query($con,"select sum(incomeAmount) as tinc from income where MONTH(date)='11' and YEAR(date)='$yr'");
		      $rowinc12 = mysqli_fetch_array($d12);
			  //getting monthly shares
			  $e12= mysqli_query($con,"select sum(amountPaid) as tsh from share where MONTH(date)='11' and YEAR(date)='$yr'");
		      $rowsh12 = mysqli_fetch_array($e12);
			  //getting customers registered in a specific month
			   $f12= mysqli_query($con,"select * from customer where MONTH(custSince)='11' and YEAR(custSince)='$yr'");
		      $rowcust12 = mysqli_fetch_array($f12);
			  $num12=mysqli_num_rows($f12);
			  //getting monthly loans
			  $g12= mysqli_query($con,"select sum(approvedAmount ) as tln from loan where MONTH(dateOfApproval )='11' and YEAR(dateOfApproval )='$yr'");
		      $rowln12 = mysqli_fetch_array($g12);
			  //getting monthly loanRepayment
			  $h12= mysqli_query($con,"select sum(totalPay) as trep from loanrepayment where MONTH(date)='11' and YEAR(date)='$yr'");
		      $rowrep12 = mysqli_fetch_array($h12);
			  echo"<table border='1' style='margin-left:1in'>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SAVINGS</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Deposits</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowd12['tdeposit'])."</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Withdrawals</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowwt12['twithdraw'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>INCOME STATEMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Expenses</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowxp12['txp'])."</td>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Income</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowinc12['tinc'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Net Profit</td>";
			  //calculating net profit
			  $net12=$rowinc12['tinc']-$rowxp12['txp'];
			  echo"<td style='font-size:16pt'>".number_format($net12)."</td>";
			  echo"</tr>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>SHARES</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Share Amount</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowsh12['tsh'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>MEMBERS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total members registered</td>";
			  echo"<td style='font-size:16pt'>".number_format( $num12)."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOANS</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Loan Amount Given out</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowln12['tln'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>LOAN REPAYMENT</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Total Amount Repaid</td>";
			  echo"<td style='font-size:16pt'>".number_format( $rowrep12['trep'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td colspan='2' style='color:green;font-size:16pt'>GRAND ANNUAL TOTALS</td>";
			  echo"</tr>";
			  //quering annual deposits.
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Annual Total Deposits</td>";
			  $aa= mysqli_query($con,"select sum(depositAmount) as adeposit from deposit where YEAR(date)='$yr'");
		      $rowda= mysqli_fetch_array($aa);
			  echo"<td style='font-size:16pt'>".number_format( $rowda['adeposit'])."</td>";
			  echo"</tr>";
			  //quering annual withdrawals.
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Annual Total Withdrawals</td>";
			  $ba= mysqli_query($con,"select sum(withdrawAmount) as awith from withdraw where YEAR(date)='$yr'");
		      $rowtha= mysqli_fetch_array($ba);
			  echo"<td style='font-size:16pt'>".number_format( $rowtha['awith'])."</td>";
			  echo"</tr>";
			  //quering income statement.
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Annual Total Expenses</td>";
			  $ca= mysqli_query($con,"select sum(expenseAmount) as axp from expenses where YEAR(date)='$yr'");
		      $rowxpa = mysqli_fetch_array($ca);
			  echo"<td style='font-size:16pt'>".number_format( $rowxpa['axp'])."</td>";
			  echo"</tr>";
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Annual Total Income</td>";
			  $da= mysqli_query($con,"select sum(incomeAmount) as ainc from income where YEAR(date)='$yr'");
		      $rowinca = mysqli_fetch_array($da);
			  echo"<td style='font-size:16pt'>".number_format( $rowinca['ainc'])."</td>";
			  echo"</tr>";
			   echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Annual Net Profit</td>";
			  $neta=$rowinca['ainc']-$rowxpa['axp'];
			  echo"<td style='font-size:16pt'>".number_format( $neta)."</td>";
			  echo"</tr>";
			  //querying anual share Amount
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Annual Total share Amount</td>";
			   $ea= mysqli_query($con,"select sum(amountPaid) as ash from share where YEAR(date)='$yr'");
		      $rowsha = mysqli_fetch_array($ea);
			  echo"<td style='font-size:16pt'>".number_format( $rowsha['ash'])."</td>";
			  echo"</tr>";
			  //querying the  annual number of members registered
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Annual number of members Registered</td>";
			   $fa= mysqli_query($con,"select * from customer where YEAR(custSince)='$yr'");
		      $rowcusta = mysqli_fetch_array($fa);
			  $numa=mysqli_num_rows($fa);
			  echo"<td style='font-size:16pt'>".number_format( $numa)."</td>";
			  echo"</tr>";
			  //quering annual loan Amount
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Annual Total Loan Amount Given</td>";
			   $ga= mysqli_query($con,"select sum(approvedAmount ) as aln from loan where YEAR(dateOfApproval )='$yr'");
		      $rowlna = mysqli_fetch_array($ga);
			  echo"<td style='font-size:16pt'>".number_format( $rowlna['aln'])."</td>";
			  echo"</tr>";
			  //quering annual loan amount Repaid
			  echo"<tr>";
			  echo"<td style='color:blue;font-size:16pt'>Annual Loan Amount that was Repaid</td>";
			   $ha= mysqli_query($con,"select sum(totalPay) as arep from loanrepayment where YEAR(date)='$yr'");
		      $rowrepa = mysqli_fetch_array($ha);
			  echo"<td style='font-size:16pt'>".number_format( $rowrepa['arep'])."</td>";
			  echo"</tr>";
	        echo"</table></br>";
			echo"<p style='color:blue;font-size:20pt'>END OF ANNUAL REPORT</p>";
			
		}
		?>
			</div>
        </form>
		</body>
</html>