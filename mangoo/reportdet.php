<!DOCTYPE HTML>
<?PHP
	require 'function.php';

?>

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
			
			<center>
			      <form method="post" action="reportdet.php">
    
        <p><strong><span style="font-size:18pt">Detailed Monthly Report.</span></strong></p></br>
        <table>
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
            
        </table></br>
		

			
            </form>
			<form method="post" action="report.php">
		
			<p><strong><span style="font-size:18pt">Detailed Annual Report.</span></strong></p>
         <table>
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
			
        </form>
		<div>
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
			  echo"<p style='color:green;font-size:17pt'>SAVINGS</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Deposit</p></br>";
			  //getting monthly deposits
			 $a= mysqli_query($con,"select * from deposit where MONTH(date)='$mon' and YEAR(date)='$yr'");
		      $numa=mysqli_num_rows($a);
			  if($numa>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>Deposit id.</td>";
    echo"<td>Cust Name</td>";
    echo"<td>Amount deposited</td>";
    echo"<td>Date </td>";
             echo"<td>Paid By </td>";
             echo"<td>Teller</td>";
             echo"<td>Account Balance</td>";
            echo"<td>AccountNo.</td>";
              echo"</tr>";
				while($rowd = mysqli_fetch_array($a)){
		echo"<tr>";
        echo"<td>".$rowd['depositId']."</td>";
        echo"<td>".$rowd['Name']."</td>";
        $m= number_format($rowd['depositAmount']);
        echo"<td>".$m."</td>";
         echo"<td>".$rowd['date']."</td>";
        echo"<td>".$rowd['paidBy']."</td>";
        
       echo"<td>".$rowd['tellerName']."</td>";
        ;
        $n= number_format($rowd['balance']);
        echo"<td>".$n."</td>";
        echo"<td>".$rowd['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Deposit record for ".$_POST['selmonth']." ".$yr."</p></br>";  
			  }
			  
			 
			 //getting monthly withdraws
			  echo"<p style='color:blue;font-size:16pt'>Withdrawals</p></br>";
			   $b= mysqli_query($con,"select * from withdraw where MONTH(date)='$mon' and YEAR(date)='$yr'");
		      $numb=mysqli_num_rows($b);
			  if($numb>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>withdrawId</td>";
    echo"<td>Name</td>";
    echo"<td>withdrawAmount</td>";
    echo"<td>Date </td>";
             echo"<td>tellerName</td>";
             echo"<td>Balance</td>";
             echo"<td>mgtFees</td>";
            echo"<td>AccountNo.</td>";
              echo"</tr>";
				while($rowth = mysqli_fetch_array($b)){
		echo"<tr>";
        echo"<td>".$rowth['withdrawId']."</td>";
        echo"<td>".$rowth['Name']."</td>";
        $mth= number_format($rowth['withdrawAmount']);
        echo"<td>".$mth."</td>";
         echo"<td>".$rowth['date']."</td>";
        echo"<td>".$rowth['tellerName']."</td>";
        $nth= number_format($rowth['balance']);
        echo"<td>".$nth."</td>";
		$mgth= number_format($rowth['mgtFees']);
        echo"<td>".$mgth."</td>";
        echo"<td>".$rowth['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Withdraw record for ".$_POST['selmonth']." ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly expenses
			  echo"<p style='color:green;font-size:17pt'>INCOME STATEMENT</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Expenses</p></br>";
			  $c= mysqli_query($con,"select * from expenses where MONTH(date)='$mon' and YEAR(date)='$yr'");
		      $numc=mysqli_num_rows($c);
			  if($numc>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>VoucherNo</td>";
    echo"<td>expenseType</td>";
    echo"<td>expenseAmount</td>";
    echo"<td>Date </td>";
             echo"<td>personResponsible</td>";
             echo"</tr>";
				while($rowxp = mysqli_fetch_array($c)){
		echo"<tr>";
        echo"<td>".$rowxp['VoucherNo']."</td>";
        echo"<td>".$rowxp['expenseType']."</td>";
        $mxp= number_format($rowxp['expenseAmount']);
        echo"<td>".$mxp."</td>";
         echo"<td>".$rowxp['date']."</td>";
        echo"<td>".$rowxp['personResponsible']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no expense record for ".$_POST['selmonth']." ".$yr."</p></br>";  
			  }
			  
			  
			  
			  //getting monthly income
			  echo"<p style='color:blue;font-size:16pt'>Income</p></br>";
			  $d= mysqli_query($con,"select * from income where MONTH(date)='$mon' and YEAR(date)='$yr'");
		      $numd=mysqli_num_rows($d);
			  if($numd>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>incomeId</td>";
    echo"<td>receiptNo</td>";
    echo"<td>typeOfIncome</td>";
    echo"<td>receivedFrom </td>";
    echo"<td>incomeAmount</td>";
    echo"<td>Date</td>";
    echo"</tr>";
	while($rowinc = mysqli_fetch_array($d)){
		echo"<tr>";
        echo"<td>".$rowinc['incomeId']."</td>";
        echo"<td>".$rowinc['receiptNo']."</td>";
        $minc= number_format($rowinc['incomeAmount']);
        echo"<td>".$rowinc['typeOfIncome']."</td>";
        echo"<td>".$rowinc['receivedFrom']."</td>";
		echo"<td>".$minc."</td>";
		echo"<td>".$rowinc['date']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Income record for ".$_POST['selmonth']." ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly shares
			  echo"<p style='color:green;font-size:17pt'>Shares</p></br>";
			  $e= mysqli_query($con,"select * from share where MONTH(date)='$mon' and YEAR(date)='$yr'");
		      $nume=mysqli_num_rows($e);
			  if($nume>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>shareID</td>";
    echo"<td>amountPaid</td>";
    echo"<td>totalAmount</td>";
    echo"<td>numberOfShares </td>";
    echo"<td>totalnumberOfShares</td>";
    echo"<td>AccountNo</td>";
	echo"<td>date</td>";
    echo"<td>teller</td>";
    echo"</tr>";
	while($rowsh = mysqli_fetch_array($e)){
		echo"<tr>";
        echo"<td>".$rowsh['shareID']."</td>";
        echo"<td>".number_format($rowsh['amountPaid'])."</td>";
        $msh= number_format($rowsh['totalAmount']);
        echo"<td>".$msh."</td>";
        echo"<td>".number_format($rowsh['numberOfShares'])."</td>";
		echo"<td>".number_format($rowsh['totalnumberOfShares'])."</td>";
		echo"<td>".$rowsh['AccountNo']."</td>";
		echo"<td>".$rowsh['date']."</td>";
		echo"<td>".$rowsh['teller']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Share record for ".$_POST['selmonth']." ".$yr."</p></br>";  
			  }
			  
			  
			  //getting customers registered in a specific month
			  echo"<p style='color:green;font-size:17pt'>Members Registered</p></br>";
			   $f= mysqli_query($con,"select * from customer where MONTH(custSince)='$mon' and YEAR(custSince)='$yr'");
            $numf=mysqli_num_rows($f);
     		  if($numf>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>Account NO.</td>";
    echo"<td> Name</td>";
    echo"<td>D O B</td>";
    echo"<td>Gender</td>";
             echo"<td>Address</td>";
             echo"<td>Telephone</td>";
             echo"<td>Email</td>";
             echo"<td>Occupation</td>";
             echo"<td>Marital Status</td>";
             echo"<td>Next of Kin</td>";
             echo"<td>Relationship</td>";
            echo"<td>Place of Birth</td>";
            echo"<td>Village</td>";
            echo"<td>Parish</td>";
            echo"<td>Subcounty</td>";
            echo"<td>District</td>";
             echo"<td>Date of joining</td>";
             echo"<td>Account Balance</td>";
    echo"</tr>";
	while($rowcust = mysqli_fetch_array($f)){
		echo"<tr>";
        echo"<td>".$rowcust['AccountNo']."</td>";
        echo"<td>".$rowcust['Name']."</td>";
        echo"<td>".$rowcust['custDob']."</td>";
        
        echo"<td>".$rowcust['custsexId']."</td>";
        echo"<td>".$rowcust['custAddress']."</td>";
        echo"<td>".$rowcust['custPhone']."</td>";
        echo"<td>".$rowcust['custEmail']."</td>";
        echo"<td>".$rowcust['custOccup']."</td>";
        echo"<td>".$rowcust['custmarriedId']."</td>";
        echo"<td>".$rowcust['custHeir']."</td>";
        echo"<td>".$rowcust['custHeirrel']."</td>";
        echo"<td>".$rowcust['placeOfBirth']."</td>";
        echo"<td>".$rowcust['village']."</td>";
        echo"<td>".$rowcust['parish']."</td>";
        echo"<td>".$rowcust['subcounty']."</td>";
        echo"<td>".$rowcust['district']."</td>";
        echo"<td>".$rowcust['custSince']."</td>";
        $blcust=number_format($rowcust['acountBalance']);
        echo"<td>".$blcust."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Member was registered in ".$_POST['selmonth']." ".$yr."</p></br>";  
			  }			
			 
			 
			   //getting monthly loans
			   echo"<p style='color:green;font-size:17pt'>Loans given out</p></br>";
			  $g= mysqli_query($con,"select * from loan where MONTH(dateOfApproval )='$mon' and YEAR(dateOfApproval )='$yr'");
		                 $numg=mysqli_num_rows($g);
     		  if($numg>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>Loan id.</td>";
    echo"<td>Name</td>";
    echo"<td>approvedAmount</td>";
    echo"<td>actualAmount</td>";
	echo"<td>dateOfApproval</td>";
             echo"<td>DueDate</td>";
             echo"<td>status</td>";
             echo"<td>loansOfficer</td>";
            echo"<td>monthlyInstalment</td>";
            echo"<td>balance</td>";
            echo"<td>Period</td>";
			echo"<td>Fine</td>";
            echo"<td>AccountNo</td>";
    echo"</tr>";
	while($rowln = mysqli_fetch_array($g)){
		echo"<tr>";
       echo"<td>".$rowln['loanId']."</td>";
        echo"<td>".$rowln['Name']."</td>";
        $m= number_format($rowln['approvedAmount']);
        echo"<td>".$m."</td>";
        $pn=number_format($rowln['actualAmount']);
         echo"<td>".$pn."</td>";
        echo"<td>".$rowln['dateOfApproval']."</td>";
		echo"<td>".$rowln['DueDate']."</td>";
        echo"<td>".$rowln['status']."</td>";
         echo"<td>".$rowln['loansOfficer']."</td>";
		 $mpt= number_format($rowln['monthlyInstalment']);
        echo"<td>".$mpt."</td>";
        $blc= number_format($rowln['balance']);
        echo"<td>".$blc."</td>";
        echo"<td>".$rowln['period']."</td>";
		$fn= number_format($rowln['fine']);
		echo"<td>".$fn."</td>";
        echo"<td>".$rowln['AccountNo']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no loan was given out in ".$_POST['selmonth']." ".$yr."</p></br>";  
			  }

			 
			  //getting monthly loanRepayment
			  echo"<p style='color:green;font-size:17pt'>Loan Repayment</p></br>";
			  $h= mysqli_query($con,"select * from loanrepayment where MONTH(date)='$mon' and YEAR(date)='$yr'");
		      $numh=mysqli_num_rows($h);
     		  if($numh>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>repaymentId</td>";
    echo"<td> date</td>";
    echo"<td>loanAmount</td>";
    echo"<td>principlePayment</td>";
             echo"<td>Interest</td>";
             echo"<td>fine</td>";
             echo"<td>totalPay</td>";
             echo"<td>balance</td>";
             echo"<td>receivedBy</td>";
             echo"<td>paidBy</td>";
             echo"<td>AccountNo</td>";
            echo"<td>loanId</td>";
            echo"</tr>";
	while($rowrep = mysqli_fetch_array($h)){
		echo"<tr>";
        echo"<td>".$rowrep['repaymentId']."</td>";
        echo"<td>".$rowrep['date']."</td>";
        echo"<td>".number_format($rowrep['loanAmount'])."</td>";
        
        echo"<td>".number_format($rowrep['principlePayment'])."</td>";
        echo"<td>".number_format($rowrep['intrest'])."</td>";
        echo"<td>".number_format($rowrep['fine'])."</td>";
        echo"<td>".number_format($rowrep['totalPay'])."</td>";
        echo"<td>".number_format($rowrep['balance'])."</td>";
        echo"<td>".$rowrep['receivedBy']."</td>";
        echo"<td>".$rowrep['paidBy']."</td>";
        echo"<td>".$rowrep['AccountNo']."</td>";
        echo"<td>".$rowrep['loanId']."</td>";
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Loan Repayment record for ".$_POST['selmonth']." ".$yr."</p></br>";  
			  }			
			 
			  
			  
			echo"<p style='color:blue;font-size:20pt'>END OF MONTHLY REPORT</p>";
		}
			
			?>
		</div>
		</center>
		</body>
</html>