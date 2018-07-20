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
			<form method="post" action="reportdet.php">
		
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
		
		
		
		
		//Annual report
		if(isset($_POST['repsuanu'])){
		include_once('function.php');
		//obtaining a year variable
	    $yr=$_POST['selyear'];
		 echo"<p style='color:white;background-color:black;font-size:20pt'>THIS REPORT INCLUDES ALL TRANSACTIONS OF ".$yr."</p></br>";
		echo"<p style='font-size:25pt'>January</p></br>";
		//January report
		
		echo"<p style='color:green;font-size:17pt'>SAVINGS</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Deposit</p></br>";
			  //getting monthly deposits
			 $a1= mysqli_query($con,"select * from deposit where MONTH(date)='01' and YEAR(date)='$yr'");
		      $numa1=mysqli_num_rows($a1);
			  if($numa1>0){
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
				while($rowd1 = mysqli_fetch_array($a1)){
		echo"<tr>";
        echo"<td>".$rowd1['depositId']."</td>";
        echo"<td>".$rowd1['Name']."</td>";
        $m1= number_format($rowd1['depositAmount']);
        echo"<td>".$m1."</td>";
         echo"<td>".$rowd1['date']."</td>";
        echo"<td>".$rowd1['paidBy']."</td>";
        
       echo"<td>".$rowd1['tellerName']."</td>";
        
        $n1= number_format($rowd1['balance']);
        echo"<td>".$n1."</td>";
        echo"<td>".$rowd1['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Deposit record for January ".$yr."</p></br>";  
			  }
			  
			 
			 //getting monthly withdraws
			  echo"<p style='color:blue;font-size:16pt'>Withdrawals</p></br>";
			   $b1= mysqli_query($con,"select * from withdraw where MONTH(date)='01' and YEAR(date)='$yr'");
		      $numb1=mysqli_num_rows($b1);
			  if($numb1>0){
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
				while($rowth1 = mysqli_fetch_array($b1)){
		echo"<tr>";
        echo"<td>".$rowth1['withdrawId']."</td>";
        echo"<td>".$rowth1['Name']."</td>";
        $mth1= number_format($rowth1['withdrawAmount']);
        echo"<td>".$mth1."</td>";
         echo"<td>".$rowth1['date']."</td>";
        echo"<td>".$rowth1['tellerName']."</td>";
        $nth1= number_format($rowth1['balance']);
        echo"<td>".$nth1."</td>";
		$mgth1= number_format($rowth1['mgtFees']);
        echo"<td>".$mgth1."</td>";
        echo"<td>".$rowth1['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Withdraw record for January ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly expenses
			  echo"<p style='color:green;font-size:17pt'>INCOME STATEMENT</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Expenses</p></br>";
			  $c1= mysqli_query($con,"select * from expenses where MONTH(date)='01' and YEAR(date)='$yr'");
		      $numc1=mysqli_num_rows($c1);
			  if($numc1>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>VoucherNo</td>";
    echo"<td>expenseType</td>";
    echo"<td>expenseAmount</td>";
    echo"<td>Date </td>";
             echo"<td>personResponsible</td>";
             echo"</tr>";
				while($rowxp1 = mysqli_fetch_array($c1)){
		echo"<tr>";
        echo"<td>".$rowxp1['VoucherNo']."</td>";
        echo"<td>".$rowxp1['expenseType']."</td>";
        $mxp1= number_format($rowxp1['expenseAmount']);
        echo"<td>".$mxp1."</td>";
         echo"<td>".$rowxp1['date']."</td>";
        echo"<td>".$rowxp1['personResponsible']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no expense record for January ".$yr."</p></br>";  
			  }
			  
			  
			  
			  //getting monthly income
			  echo"<p style='color:blue;font-size:16pt'>Income</p></br>";
			  $d1= mysqli_query($con,"select * from income where MONTH(date)='01' and YEAR(date)='$yr'");
		      $numd1=mysqli_num_rows($d1);
			  if($numd1>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>incomeId</td>";
    echo"<td>receiptNo</td>";
    echo"<td>typeOfIncome</td>";
    echo"<td>receivedFrom </td>";
    echo"<td>incomeAmount</td>";
    echo"<td>Date</td>";
    echo"</tr>";
	while($rowinc1 = mysqli_fetch_array($d1)){
		echo"<tr>";
        echo"<td>".$rowinc1['incomeId']."</td>";
        echo"<td>".$rowinc1['receiptNo']."</td>";
        $minc1= number_format($rowinc1['incomeAmount']);
        echo"<td>".$rowinc1['typeOfIncome']."</td>";
        echo"<td>".$rowinc1['receivedFrom']."</td>";
		echo"<td>".$minc1."</td>";
		echo"<td>".$rowinc1['date']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Income record for January ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly shares
			  echo"<p style='color:green;font-size:17pt'>Shares</p></br>";
			  $e1= mysqli_query($con,"select * from share where MONTH(date)='01' and YEAR(date)='$yr'");
		      $nume1=mysqli_num_rows($e1);
			  if($nume1>0){
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
	while($rowsh1 = mysqli_fetch_array($e1)){
		echo"<tr>";
        echo"<td>".$rowsh1['shareID']."</td>";
        echo"<td>".number_format($rowsh1['amountPaid'])."</td>";
        $msh1= number_format($rowsh1['totalAmount']);
        echo"<td>".$msh1."</td>";
        echo"<td>".number_format($rowsh1['numberOfShares'])."</td>";
		echo"<td>".number_format($rowsh1['totalnumberOfShares'])."</td>";
		echo"<td>".$rowsh1['AccountNo']."</td>";
		echo"<td>".$rowsh1['date']."</td>";
		echo"<td>".$rowsh1['teller']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
		echo"<p style='color:red;font-size:15pt'>no Share record for January ".$yr."</p></br>";  
			  }
			  
			  
			  //getting customers registered in a specific month
			  echo"<p style='color:green;font-size:17pt'>Members Registered</p></br>";
			   $f1= mysqli_query($con,"select * from customer where MONTH(custSince)='01' and YEAR(custSince)='$yr'");
            $numf1=mysqli_num_rows($f1);
     		  if($numf1>0){
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
	while($rowcust1 = mysqli_fetch_array($f1)){
		echo"<tr>";
        echo"<td>".$rowcust1['AccountNo']."</td>";
        echo"<td>".$rowcust1['Name']."</td>";
        echo"<td>".$rowcust1['custDob']."</td>";
        
        echo"<td>".$rowcust1['custsexId']."</td>";
        echo"<td>".$rowcust1['custAddress']."</td>";
        echo"<td>".$rowcust1['custPhone']."</td>";
        echo"<td>".$rowcust1['custEmail']."</td>";
        echo"<td>".$rowcust1['custOccup']."</td>";
        echo"<td>".$rowcust1['custmarriedId']."</td>";
        echo"<td>".$rowcust1['custHeir']."</td>";
        echo"<td>".$rowcust1['custHeirrel']."</td>";
        echo"<td>".$rowcust1['placeOfBirth']."</td>";
        echo"<td>".$rowcust1['village']."</td>";
        echo"<td>".$rowcust1['parish']."</td>";
        echo"<td>".$rowcust1['subcounty']."</td>";
        echo"<td>".$rowcust1['district']."</td>";
        echo"<td>".$rowcust1['custSince']."</td>";
        $blcust1=number_format($rowcust1['acountBalance']);
        echo"<td>".$blcust1."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Member was registered in January ".$yr."</p></br>";  
			  }			
			 
			 
			   //getting monthly loans
			   echo"<p style='color:green;font-size:17pt'>Loans given out</p></br>";
			  $g1= mysqli_query($con,"select * from loan where MONTH(dateOfApproval )='01' and YEAR(dateOfApproval )='$yr'");
		      $numg1=mysqli_num_rows($g1);
     		  if($numg1>0){
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
	while($rowln1 = mysqli_fetch_array($g1)){
		echo"<tr>";
       echo"<td>".$rowln1['loanId']."</td>";
        echo"<td>".$rowln1['Name']."</td>";
        $m1= number_format($rowln1['approvedAmount']);
        echo"<td>".$m1."</td>";
        $pn1=number_format($rowln1['actualAmount']);
         echo"<td>".$pn1."</td>";
        echo"<td>".$rowln1['dateOfApproval']."</td>";
		echo"<td>".$rowln1['DueDate']."</td>";
        echo"<td>".$rowln1['status']."</td>";
         echo"<td>".$rowln1['loansOfficer']."</td>";
		 $mpt1= number_format($rowln1['monthlyInstalment']);
        echo"<td>".$mpt1."</td>";
        $blc1= number_format($rowln1['balance']);
        echo"<td>".$blc1."</td>";
        echo"<td>".$rowln1['period']."</td>";
		$fn1= number_format($rowln1['fine']);
		echo"<td>".$fn1."</td>";
        echo"<td>".$rowln1['AccountNo']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no loan was given out in January".$yr."</p></br>";  
			  }

			 
			  //getting monthly loanRepayment
			  echo"<p style='color:green;font-size:17pt'>Loan Repayment</p></br>";
			  $h1= mysqli_query($con,"select * from loanrepayment where MONTH(date)='01' and YEAR(date)='$yr'");
		      $numh1=mysqli_num_rows($h1);
     		  if($numh1>0){
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
	while($rowrep1 = mysqli_fetch_array($h1)){
		echo"<tr>";
        echo"<td>".$rowrep1['repaymentId']."</td>";
        echo"<td>".$rowrep1['date']."</td>";
        echo"<td>".number_format($rowrep1['loanAmount'])."</td>";
        
        echo"<td>".number_format($rowrep1['principlePayment'])."</td>";
        echo"<td>".number_format($rowrep1['intrest'])."</td>";
        echo"<td>".number_format($rowrep1['fine'])."</td>";
        echo"<td>".number_format($rowrep1['totalPay'])."</td>";
        echo"<td>".number_format($rowrep1['balance'])."</td>";
        echo"<td>".$rowrep1['receivedBy']."</td>";
        echo"<td>".$rowrep1['paidBy']."</td>";
        echo"<td>".$rowrep1['AccountNo']."</td>";
        echo"<td>".$rowrep1['loanId']."</td>";
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Loan Repayment record for January ".$yr."</p></br>";  
			  }			
			 
		echo"<p style='font-size:25pt'>February</p></br>";
		//February report
		
		
		
		echo"<p style='color:green;font-size:17pt'>SAVINGS</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Deposit</p></br>";
			  //getting monthly deposits
			 $a2= mysqli_query($con,"select * from deposit where MONTH(date)='02' and YEAR(date)='$yr'");
		      $numa2=mysqli_num_rows($a2);
			  if($numa2>0){
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
				while($rowd2 = mysqli_fetch_array($a2)){
		echo"<tr>";
        echo"<td>".$rowd2['depositId']."</td>";
        echo"<td>".$rowd2['Name']."</td>";
        $m2= number_format($rowd2['depositAmount']);
        echo"<td>".$m2."</td>";
         echo"<td>".$rowd2['date']."</td>";
        echo"<td>".$rowd2['paidBy']."</td>";
        
       echo"<td>".$rowd2['tellerName']."</td>";
        
        $n2= number_format($rowd2['balance']);
        echo"<td>".$n2."</td>";
        echo"<td>".$rowd2['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Deposit record for February ".$yr."</p></br>";  
			  }
			  
			 
			 //getting monthly withdraws
			  echo"<p style='color:blue;font-size:16pt'>Withdrawals</p></br>";
			   $b2= mysqli_query($con,"select * from withdraw where MONTH(date)='02' and YEAR(date)='$yr'");
		      $numb2=mysqli_num_rows($b2);
			  if($numb2>0){
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
				while($rowth2 = mysqli_fetch_array($b2)){
		echo"<tr>";
        echo"<td>".$rowth2['withdrawId']."</td>";
        echo"<td>".$rowth2['Name']."</td>";
        $mth2= number_format($rowth2['withdrawAmount']);
        echo"<td>".$mth2."</td>";
         echo"<td>".$rowth2['date']."</td>";
        echo"<td>".$rowth2['tellerName']."</td>";
        $nth2= number_format($rowth2['balance']);
        echo"<td>".$nth2."</td>";
		$mgth2= number_format($rowth2['mgtFees']);
        echo"<td>".$mgth2."</td>";
        echo"<td>".$rowth2['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Withdraw record for February ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly expenses
			  echo"<p style='color:green;font-size:17pt'>INCOME STATEMENT</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Expenses</p></br>";
			  $c2= mysqli_query($con,"select * from expenses where MONTH(date)='02' and YEAR(date)='$yr'");
		      $numc2=mysqli_num_rows($c2);
			  if($numc2>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>VoucherNo</td>";
    echo"<td>expenseType</td>";
    echo"<td>expenseAmount</td>";
    echo"<td>Date </td>";
             echo"<td>personResponsible</td>";
             echo"</tr>";
				while($rowxp2 = mysqli_fetch_array($c2)){
		echo"<tr>";
        echo"<td>".$rowxp2['VoucherNo']."</td>";
        echo"<td>".$rowxp2['expenseType']."</td>";
        $mxp2= number_format($rowxp2['expenseAmount']);
        echo"<td>".$mxp2."</td>";
         echo"<td>".$rowxp2['date']."</td>";
        echo"<td>".$rowxp2['personResponsible']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no expense record for February ".$yr."</p></br>";  
			  }
			  
			  
			  
			  //getting monthly income
			  echo"<p style='color:blue;font-size:16pt'>Income</p></br>";
			  $d2= mysqli_query($con,"select * from income where MONTH(date)='02' and YEAR(date)='$yr'");
		      $numd2=mysqli_num_rows($d2);
			  if($numd2>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>incomeId</td>";
    echo"<td>receiptNo</td>";
    echo"<td>typeOfIncome</td>";
    echo"<td>receivedFrom </td>";
    echo"<td>incomeAmount</td>";
    echo"<td>Date</td>";
    echo"</tr>";
	while($rowinc2 = mysqli_fetch_array($d2)){
		echo"<tr>";
        echo"<td>".$rowinc2['incomeId']."</td>";
        echo"<td>".$rowinc2['receiptNo']."</td>";
        $minc2= number_format($rowinc2['incomeAmount']);
        echo"<td>".$rowinc2['typeOfIncome']."</td>";
        echo"<td>".$rowinc2['receivedFrom']."</td>";
		echo"<td>".$minc2."</td>";
		echo"<td>".$rowinc2['date']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Income record for February ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly shares
			  echo"<p style='color:green;font-size:17pt'>Shares</p></br>";
			  $e2= mysqli_query($con,"select * from share where MONTH(date)='02' and YEAR(date)='$yr'");
		      $nume2=mysqli_num_rows($e2);
			  if($nume2>0){
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
	while($rowsh2 = mysqli_fetch_array($e2)){
		echo"<tr>";
        echo"<td>".$rowsh2['shareID']."</td>";
        echo"<td>".number_format($rowsh2['amountPaid'])."</td>";
        $msh2= number_format($rowsh2['totalAmount']);
        echo"<td>".$msh2."</td>";
        echo"<td>".number_format($rowsh2['numberOfShares'])."</td>";
		echo"<td>".number_format($rowsh2['totalnumberOfShares'])."</td>";
		echo"<td>".$rowsh2['AccountNo']."</td>";
		echo"<td>".$rowsh2['date']."</td>";
		echo"<td>".$rowsh2['teller']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
		echo"<p style='color:red;font-size:15pt'>no Share record for February ".$yr."</p></br>";  
			  }
			  
			  
			  //getting customers registered in a specific month
			  echo"<p style='color:green;font-size:17pt'>Members Registered</p></br>";
			   $f2= mysqli_query($con,"select * from customer where MONTH(custSince)='02' and YEAR(custSince)='$yr'");
            $numf2=mysqli_num_rows($f2);
     		  if($numf2>0){
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
	while($rowcust2 = mysqli_fetch_array($f2)){
		echo"<tr>";
        echo"<td>".$rowcust2['AccountNo']."</td>";
        echo"<td>".$rowcust2['Name']."</td>";
        echo"<td>".$rowcust2['custDob']."</td>";
        
        echo"<td>".$rowcust2['custsexId']."</td>";
        echo"<td>".$rowcust2['custAddress']."</td>";
        echo"<td>".$rowcust2['custPhone']."</td>";
        echo"<td>".$rowcust2['custEmail']."</td>";
        echo"<td>".$rowcust2['custOccup']."</td>";
        echo"<td>".$rowcust2['custmarriedId']."</td>";
        echo"<td>".$rowcust2['custHeir']."</td>";
        echo"<td>".$rowcust2['custHeirrel']."</td>";
        echo"<td>".$rowcust2['placeOfBirth']."</td>";
        echo"<td>".$rowcust2['village']."</td>";
        echo"<td>".$rowcust2['parish']."</td>";
        echo"<td>".$rowcust2['subcounty']."</td>";
        echo"<td>".$rowcust2['district']."</td>";
        echo"<td>".$rowcust2['custSince']."</td>";
        $blcust2=number_format($rowcust2['acountBalance']);
        echo"<td>".$blcust2."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Member was registered in February ".$yr."</p></br>";  
			  }			
			 
			 
			   //getting monthly loans
			   echo"<p style='color:green;font-size:17pt'>Loans given out</p></br>";
			  $g2= mysqli_query($con,"select * from loan where MONTH(dateOfApproval )='02' and YEAR(dateOfApproval )='$yr'");
		      $numg2=mysqli_num_rows($g2);
     		  if($numg2>0){
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
	while($rowln2 = mysqli_fetch_array($g2)){
		echo"<tr>";
       echo"<td>".$rowln2['loanId']."</td>";
        echo"<td>".$rowln2['Name']."</td>";
        $m2= number_format($rowln2['approvedAmount']);
        echo"<td>".$m2."</td>";
        $pn2=number_format($rowln2['actualAmount']);
         echo"<td>".$pn2."</td>";
        echo"<td>".$rowln2['dateOfApproval']."</td>";
		echo"<td>".$rowln2['DueDate']."</td>";
        echo"<td>".$rowln2['status']."</td>";
         echo"<td>".$rowln2['loansOfficer']."</td>";
		 $mpt2= number_format($rowln2['monthlyInstalment']);
        echo"<td>".$mpt2."</td>";
        $blc2= number_format($rowln2['balance']);
        echo"<td>".$blc2."</td>";
        echo"<td>".$rowln2['period']."</td>";
		$fn2= number_format($rowln2['fine']);
		echo"<td>".$fn2."</td>";
        echo"<td>".$rowln2['AccountNo']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no loan was given out in February ".$yr."</p></br>";  
			  }

			 
			  //getting monthly loanRepayment
			  echo"<p style='color:green;font-size:17pt'>Loan Repayment</p></br>";
			  $h2= mysqli_query($con,"select * from loanrepayment where MONTH(date)='02' and YEAR(date)='$yr'");
		      $numh2=mysqli_num_rows($h2);
     		  if($numh2>0){
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
	while($rowrep2 = mysqli_fetch_array($h2)){
		echo"<tr>";
        echo"<td>".$rowrep2['repaymentId']."</td>";
        echo"<td>".$rowrep2['date']."</td>";
        echo"<td>".number_format($rowrep2['loanAmount'])."</td>";
        
        echo"<td>".number_format($rowrep2['principlePayment'])."</td>";
        echo"<td>".number_format($rowrep2['intrest'])."</td>";
        echo"<td>".number_format($rowrep2['fine'])."</td>";
        echo"<td>".number_format($rowrep2['totalPay'])."</td>";
        echo"<td>".number_format($rowrep2['balance'])."</td>";
        echo"<td>".$rowrep2['receivedBy']."</td>";
        echo"<td>".$rowrep2['paidBy']."</td>";
        echo"<td>".$rowrep2['AccountNo']."</td>";
        echo"<td>".$rowrep2['loanId']."</td>";
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Loan Repayment record for February ".$yr."</p></br>";  
			  }			
			 
		echo"<p style='font-size:25pt'>March</p></br>";
		//March report
		
		
		echo"<p style='color:green;font-size:17pt'>SAVINGS</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Deposit</p></br>";
			  //getting monthly deposits
			 $a3= mysqli_query($con,"select * from deposit where MONTH(date)='03' and YEAR(date)='$yr'");
		      $numa3=mysqli_num_rows($a3);
			  if($numa3>0){
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
				while($rowd3 = mysqli_fetch_array($a3)){
		echo"<tr>";
        echo"<td>".$rowd3['depositId']."</td>";
        echo"<td>".$rowd3['Name']."</td>";
        $m3= number_format($rowd3['depositAmount']);
        echo"<td>".$m3."</td>";
         echo"<td>".$rowd3['date']."</td>";
        echo"<td>".$rowd3['paidBy']."</td>";
        
       echo"<td>".$rowd3['tellerName']."</td>";
        
        $n3= number_format($rowd3['balance']);
        echo"<td>".$n3."</td>";
        echo"<td>".$rowd3['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Deposit record for March ".$yr."</p></br>";  
			  }
			  
			 
			 //getting monthly withdraws
			  echo"<p style='color:blue;font-size:16pt'>Withdrawals</p></br>";
			   $b3= mysqli_query($con,"select * from withdraw where MONTH(date)='03' and YEAR(date)='$yr'");
		      $numb3=mysqli_num_rows($b3);
			  if($numb3>0){
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
				while($rowth3 = mysqli_fetch_array($b3)){
		echo"<tr>";
        echo"<td>".$rowth3['withdrawId']."</td>";
        echo"<td>".$rowth3['Name']."</td>";
        $mth3= number_format($rowth3['withdrawAmount']);
        echo"<td>".$mth3."</td>";
         echo"<td>".$rowth3['date']."</td>";
        echo"<td>".$rowth3['tellerName']."</td>";
        $nth3= number_format($rowth3['balance']);
        echo"<td>".$nth3."</td>";
		$mgth3= number_format($rowth3['mgtFees']);
        echo"<td>".$mgth3."</td>";
        echo"<td>".$rowth3['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Withdraw record for March ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly expenses
			  echo"<p style='color:green;font-size:17pt'>INCOME STATEMENT</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Expenses</p></br>";
			  $c3= mysqli_query($con,"select * from expenses where MONTH(date)='03' and YEAR(date)='$yr'");
		      $numc3=mysqli_num_rows($c3);
			  if($numc3>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>VoucherNo</td>";
    echo"<td>expenseType</td>";
    echo"<td>expenseAmount</td>";
    echo"<td>Date </td>";
             echo"<td>personResponsible</td>";
             echo"</tr>";
				while($rowxp3 = mysqli_fetch_array($c3)){
		echo"<tr>";
        echo"<td>".$rowxp3['VoucherNo']."</td>";
        echo"<td>".$rowxp3['expenseType']."</td>";
        $mxp3= number_format($rowxp3['expenseAmount']);
        echo"<td>".$mxp3."</td>";
         echo"<td>".$rowxp3['date']."</td>";
        echo"<td>".$rowxp3['personResponsible']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no expense record for March ".$yr."</p></br>";  
			  }
			  
			  
			  
			  //getting monthly income
			  echo"<p style='color:blue;font-size:16pt'>Income</p></br>";
			  $d3= mysqli_query($con,"select * from income where MONTH(date)='03' and YEAR(date)='$yr'");
		      $numd3=mysqli_num_rows($d3);
			  if($numd3>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>incomeId</td>";
    echo"<td>receiptNo</td>";
    echo"<td>typeOfIncome</td>";
    echo"<td>receivedFrom </td>";
    echo"<td>incomeAmount</td>";
    echo"<td>Date</td>";
    echo"</tr>";
	while($rowinc3 = mysqli_fetch_array($d3)){
		echo"<tr>";
        echo"<td>".$rowinc3['incomeId']."</td>";
        echo"<td>".$rowinc3['receiptNo']."</td>";
        $minc3= number_format($rowinc3['incomeAmount']);
        echo"<td>".$rowinc3['typeOfIncome']."</td>";
        echo"<td>".$rowinc3['receivedFrom']."</td>";
		echo"<td>".$minc3."</td>";
		echo"<td>".$rowinc3['date']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Income record for March ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly shares
			  echo"<p style='color:green;font-size:17pt'>Shares</p></br>";
			  $e3= mysqli_query($con,"select * from share where MONTH(date)='03' and YEAR(date)='$yr'");
		      $nume3=mysqli_num_rows($e3);
			  if($nume3>0){
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
	while($rowsh3 = mysqli_fetch_array($e3)){
		echo"<tr>";
        echo"<td>".$rowsh3['shareID']."</td>";
        echo"<td>".number_format($rowsh3['amountPaid'])."</td>";
        $msh3= number_format($rowsh3['totalAmount']);
        echo"<td>".$msh3."</td>";
        echo"<td>".number_format($rowsh3['numberOfShares'])."</td>";
		echo"<td>".number_format($rowsh3['totalnumberOfShares'])."</td>";
		echo"<td>".$rowsh3['AccountNo']."</td>";
		echo"<td>".$rowsh3['date']."</td>";
		echo"<td>".$rowsh3['teller']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
		echo"<p style='color:red;font-size:15pt'>no Share record for March ".$yr."</p></br>";  
			  }
			  
			  
			  //getting customers registered in a specific month
			  echo"<p style='color:green;font-size:17pt'>Members Registered</p></br>";
			   $f3= mysqli_query($con,"select * from customer where MONTH(custSince)='03' and YEAR(custSince)='$yr'");
            $numf3=mysqli_num_rows($f3);
     		  if($numf3>0){
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
	while($rowcust3 = mysqli_fetch_array($f3)){
		echo"<tr>";
        echo"<td>".$rowcust3['AccountNo']."</td>";
        echo"<td>".$rowcust3['Name']."</td>";
        echo"<td>".$rowcust3['custDob']."</td>";
        
        echo"<td>".$rowcust3['custsexId']."</td>";
        echo"<td>".$rowcust3['custAddress']."</td>";
        echo"<td>".$rowcust3['custPhone']."</td>";
        echo"<td>".$rowcust3['custEmail']."</td>";
        echo"<td>".$rowcust3['custOccup']."</td>";
        echo"<td>".$rowcust3['custmarriedId']."</td>";
        echo"<td>".$rowcust3['custHeir']."</td>";
        echo"<td>".$rowcust3['custHeirrel']."</td>";
        echo"<td>".$rowcust3['placeOfBirth']."</td>";
        echo"<td>".$rowcust3['village']."</td>";
        echo"<td>".$rowcust3['parish']."</td>";
        echo"<td>".$rowcust3['subcounty']."</td>";
        echo"<td>".$rowcust3['district']."</td>";
        echo"<td>".$rowcust3['custSince']."</td>";
        $blcust3=number_format($rowcust3['acountBalance']);
        echo"<td>".$blcust3."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Member was registered in March ".$yr."</p></br>";  
			  }			
			 
			 
			   //getting monthly loans
			   echo"<p style='color:green;font-size:17pt'>Loans given out</p></br>";
			  $g3= mysqli_query($con,"select * from loan where MONTH(dateOfApproval )='03' and YEAR(dateOfApproval )='$yr'");
		      $numg3=mysqli_num_rows($g3);
     		  if($numg3>0){
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
	while($rowln3 = mysqli_fetch_array($g3)){
		echo"<tr>";
       echo"<td>".$rowln3['loanId']."</td>";
        echo"<td>".$rowln3['Name']."</td>";
        $m3= number_format($rowln3['approvedAmount']);
        echo"<td>".$m3."</td>";
        $pn3=number_format($rowln3['actualAmount']);
         echo"<td>".$pn3."</td>";
        echo"<td>".$rowln3['dateOfApproval']."</td>";
		echo"<td>".$rowln3['DueDate']."</td>";
        echo"<td>".$rowln3['status']."</td>";
         echo"<td>".$rowln3['loansOfficer']."</td>";
		 $mpt3= number_format($rowln3['monthlyInstalment']);
        echo"<td>".$mpt3."</td>";
        $blc3= number_format($rowln3['balance']);
        echo"<td>".$blc3."</td>";
        echo"<td>".$rowln3['period']."</td>";
		$fn3= number_format($rowln3['fine']);
		echo"<td>".$fn3."</td>";
        echo"<td>".$rowln3['AccountNo']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no loan was given out in March ".$yr."</p></br>";  
			  }

			 
			  //getting monthly loanRepayment
			  echo"<p style='color:green;font-size:17pt'>Loan Repayment</p></br>";
			  $h3= mysqli_query($con,"select * from loanrepayment where MONTH(date)='03' and YEAR(date)='$yr'");
		      $numh3=mysqli_num_rows($h3);
     		  if($numh3>0){
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
	while($rowrep3 = mysqli_fetch_array($h3)){
		echo"<tr>";
        echo"<td>".$rowrep3['repaymentId']."</td>";
        echo"<td>".$rowrep3['date']."</td>";
        echo"<td>".number_format($rowrep3['loanAmount'])."</td>";
        
        echo"<td>".number_format($rowrep3['principlePayment'])."</td>";
        echo"<td>".number_format($rowrep3['intrest'])."</td>";
        echo"<td>".number_format($rowrep3['fine'])."</td>";
        echo"<td>".number_format($rowrep3['totalPay'])."</td>";
        echo"<td>".number_format($rowrep3['balance'])."</td>";
        echo"<td>".$rowrep3['receivedBy']."</td>";
        echo"<td>".$rowrep3['paidBy']."</td>";
        echo"<td>".$rowrep3['AccountNo']."</td>";
        echo"<td>".$rowrep3['loanId']."</td>";
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Loan Repayment record for March ".$yr."</p></br>";  
			  }			
			 
		echo"<p style='font-size:25pt'>April</p></br>";
		//April report
		
		
		echo"<p style='color:green;font-size:17pt'>SAVINGS</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Deposit</p></br>";
			  //getting monthly deposits
			 $a4= mysqli_query($con,"select * from deposit where MONTH(date)='04' and YEAR(date)='$yr'");
		      $numa4=mysqli_num_rows($a4);
			  if($numa4>0){
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
				while($rowd4 = mysqli_fetch_array($a4)){
		echo"<tr>";
        echo"<td>".$rowd4['depositId']."</td>";
        echo"<td>".$rowd4['Name']."</td>";
        $m4= number_format($rowd4['depositAmount']);
        echo"<td>".$m4."</td>";
         echo"<td>".$rowd4['date']."</td>";
        echo"<td>".$rowd4['paidBy']."</td>";
        
       echo"<td>".$rowd4['tellerName']."</td>";
        
        $n4= number_format($rowd4['balance']);
        echo"<td>".$n4."</td>";
        echo"<td>".$rowd4['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Deposit record for April ".$yr."</p></br>";  
			  }
			  
			 
			 //getting monthly withdraws
			  echo"<p style='color:blue;font-size:16pt'>Withdrawals</p></br>";
			   $b4= mysqli_query($con,"select * from withdraw where MONTH(date)='04' and YEAR(date)='$yr'");
		      $numb4=mysqli_num_rows($b4);
			  if($numb4>0){
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
				while($rowth4 = mysqli_fetch_array($b4)){
		echo"<tr>";
        echo"<td>".$rowth4['withdrawId']."</td>";
        echo"<td>".$rowth4['Name']."</td>";
        $mth4= number_format($rowth4['withdrawAmount']);
        echo"<td>".$mth4."</td>";
         echo"<td>".$rowth4['date']."</td>";
        echo"<td>".$rowth4['tellerName']."</td>";
        $nth4= number_format($rowth4['balance']);
        echo"<td>".$nth4."</td>";
		$mgth4= number_format($rowth4['mgtFees']);
        echo"<td>".$mgth4."</td>";
        echo"<td>".$rowth4['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Withdraw record for April ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly expenses
			  echo"<p style='color:green;font-size:17pt'>INCOME STATEMENT</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Expenses</p></br>";
			  $c4= mysqli_query($con,"select * from expenses where MONTH(date)='04' and YEAR(date)='$yr'");
		      $numc4=mysqli_num_rows($c4);
			  if($numc4>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>VoucherNo</td>";
    echo"<td>expenseType</td>";
    echo"<td>expenseAmount</td>";
    echo"<td>Date </td>";
             echo"<td>personResponsible</td>";
             echo"</tr>";
				while($rowxp4 = mysqli_fetch_array($c4)){
		echo"<tr>";
        echo"<td>".$rowxp4['VoucherNo']."</td>";
        echo"<td>".$rowxp4['expenseType']."</td>";
        $mxp4= number_format($rowxp4['expenseAmount']);
        echo"<td>".$mxp4."</td>";
         echo"<td>".$rowxp4['date']."</td>";
        echo"<td>".$rowxp4['personResponsible']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no expense record for April ".$yr."</p></br>";  
			  }
			  
			  
			  
			  //getting monthly income
			  echo"<p style='color:blue;font-size:16pt'>Income</p></br>";
			  $d4= mysqli_query($con,"select * from income where MONTH(date)='04' and YEAR(date)='$yr'");
		      $numd4=mysqli_num_rows($d4);
			  if($numd4>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>incomeId</td>";
    echo"<td>receiptNo</td>";
    echo"<td>typeOfIncome</td>";
    echo"<td>receivedFrom </td>";
    echo"<td>incomeAmount</td>";
    echo"<td>Date</td>";
    echo"</tr>";
	while($rowinc4 = mysqli_fetch_array($d4)){
		echo"<tr>";
        echo"<td>".$rowinc4['incomeId']."</td>";
        echo"<td>".$rowinc4['receiptNo']."</td>";
        $minc4= number_format($rowinc4['incomeAmount']);
        echo"<td>".$rowinc4['typeOfIncome']."</td>";
        echo"<td>".$rowinc4['receivedFrom']."</td>";
		echo"<td>".$minc4."</td>";
		echo"<td>".$rowinc4['date']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Income record for April ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly shares
			  echo"<p style='color:green;font-size:17pt'>Shares</p></br>";
			  $e4= mysqli_query($con,"select * from share where MONTH(date)='04' and YEAR(date)='$yr'");
		      $nume4=mysqli_num_rows($e4);
			  if($nume4>0){
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
	while($rowsh4 = mysqli_fetch_array($e4)){
		echo"<tr>";
        echo"<td>".$rowsh4['shareID']."</td>";
        echo"<td>".number_format($rowsh4['amountPaid'])."</td>";
        $msh4= number_format($rowsh4['totalAmount']);
        echo"<td>".$msh4."</td>";
        echo"<td>".number_format($rowsh4['numberOfShares'])."</td>";
		echo"<td>".number_format($rowsh4['totalnumberOfShares'])."</td>";
		echo"<td>".$rowsh4['AccountNo']."</td>";
		echo"<td>".$rowsh4['date']."</td>";
		echo"<td>".$rowsh4['teller']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
		echo"<p style='color:red;font-size:15pt'>no Share record for April ".$yr."</p></br>";  
			  }
			  
			  
			  //getting customers registered in a specific month
			  echo"<p style='color:green;font-size:17pt'>Members Registered</p></br>";
			   $f4= mysqli_query($con,"select * from customer where MONTH(custSince)='04' and YEAR(custSince)='$yr'");
            $numf4=mysqli_num_rows($f4);
     		  if($numf4>0){
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
	while($rowcust4 = mysqli_fetch_array($f4)){
		echo"<tr>";
        echo"<td>".$rowcust4['AccountNo']."</td>";
        echo"<td>".$rowcust4['Name']."</td>";
        echo"<td>".$rowcust4['custDob']."</td>";
        
        echo"<td>".$rowcust4['custsexId']."</td>";
        echo"<td>".$rowcust4['custAddress']."</td>";
        echo"<td>".$rowcust4['custPhone']."</td>";
        echo"<td>".$rowcust4['custEmail']."</td>";
        echo"<td>".$rowcust4['custOccup']."</td>";
        echo"<td>".$rowcust4['custmarriedId']."</td>";
        echo"<td>".$rowcust4['custHeir']."</td>";
        echo"<td>".$rowcust4['custHeirrel']."</td>";
        echo"<td>".$rowcust4['placeOfBirth']."</td>";
        echo"<td>".$rowcust4['village']."</td>";
        echo"<td>".$rowcust4['parish']."</td>";
        echo"<td>".$rowcust4['subcounty']."</td>";
        echo"<td>".$rowcust4['district']."</td>";
        echo"<td>".$rowcust4['custSince']."</td>";
        $blcust4=number_format($rowcust4['acountBalance']);
        echo"<td>".$blcust4."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Member was registered in April ".$yr."</p></br>";  
			  }			
			 
			 
			   //getting monthly loans
			   echo"<p style='color:green;font-size:17pt'>Loans given out</p></br>";
			  $g4= mysqli_query($con,"select * from loan where MONTH(dateOfApproval )='04' and YEAR(dateOfApproval )='$yr'");
		      $numg4=mysqli_num_rows($g4);
     		  if($numg4>0){
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
	while($rowln4 = mysqli_fetch_array($g4)){
		echo"<tr>";
       echo"<td>".$rowln4['loanId']."</td>";
        echo"<td>".$rowln4['Name']."</td>";
        $m4= number_format($rowln4['approvedAmount']);
        echo"<td>".$m4."</td>";
        $pn4=number_format($rowln4['actualAmount']);
         echo"<td>".$pn4."</td>";
        echo"<td>".$rowln4['dateOfApproval']."</td>";
		echo"<td>".$rowln4['DueDate']."</td>";
        echo"<td>".$rowln4['status']."</td>";
         echo"<td>".$rowln4['loansOfficer']."</td>";
		 $mpt4= number_format($rowln4['monthlyInstalment']);
        echo"<td>".$mpt4."</td>";
        $blc4= number_format($rowln4['balance']);
        echo"<td>".$blc4."</td>";
        echo"<td>".$rowln4['period']."</td>";
		$fn4= number_format($rowln4['fine']);
		echo"<td>".$fn4."</td>";
        echo"<td>".$rowln4['AccountNo']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no loan was given out in April ".$yr."</p></br>";  
			  }

			 
			  //getting monthly loanRepayment
			  echo"<p style='color:green;font-size:17pt'>Loan Repayment</p></br>";
			  $h4= mysqli_query($con,"select * from loanrepayment where MONTH(date)='04' and YEAR(date)='$yr'");
		      $numh4=mysqli_num_rows($h4);
     		  if($numh4>0){
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
	while($rowrep4 = mysqli_fetch_array($h4)){
		echo"<tr>";
        echo"<td>".$rowrep4['repaymentId']."</td>";
        echo"<td>".$rowrep4['date']."</td>";
        echo"<td>".number_format($rowrep4['loanAmount'])."</td>";
        
        echo"<td>".number_format($rowrep4['principlePayment'])."</td>";
        echo"<td>".number_format($rowrep4['intrest'])."</td>";
        echo"<td>".number_format($rowrep4['fine'])."</td>";
        echo"<td>".number_format($rowrep4['totalPay'])."</td>";
        echo"<td>".number_format($rowrep4['balance'])."</td>";
        echo"<td>".$rowrep4['receivedBy']."</td>";
        echo"<td>".$rowrep4['paidBy']."</td>";
        echo"<td>".$rowrep4['AccountNo']."</td>";
        echo"<td>".$rowrep4['loanId']."</td>";
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Loan Repayment record for April ".$yr."</p></br>";  
			  }			
			 
		echo"<p style='font-size:25pt'>May</p></br>";
		//May report
		
		echo"<p style='color:green;font-size:17pt'>SAVINGS</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Deposit</p></br>";
			  //getting monthly deposits
			 $a5= mysqli_query($con,"select * from deposit where MONTH(date)='05' and YEAR(date)='$yr'");
		      $numa5=mysqli_num_rows($a5);
			  if($numa5>0){
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
				while($rowd5 = mysqli_fetch_array($a5)){
		echo"<tr>";
        echo"<td>".$rowd5['depositId']."</td>";
        echo"<td>".$rowd5['Name']."</td>";
        $m5= number_format($rowd5['depositAmount']);
        echo"<td>".$m5."</td>";
         echo"<td>".$rowd5['date']."</td>";
        echo"<td>".$rowd5['paidBy']."</td>";
        
       echo"<td>".$rowd5['tellerName']."</td>";
        
        $n5= number_format($rowd5['balance']);
        echo"<td>".$n5."</td>";
        echo"<td>".$rowd5['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Deposit record for May ".$yr."</p></br>";  
			  }
			  
			 
			 //getting monthly withdraws
			  echo"<p style='color:blue;font-size:16pt'>Withdrawals</p></br>";
			   $b5= mysqli_query($con,"select * from withdraw where MONTH(date)='05' and YEAR(date)='$yr'");
		      $numb5=mysqli_num_rows($b5);
			  if($numb5>0){
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
				while($rowth5 = mysqli_fetch_array($b5)){
		echo"<tr>";
        echo"<td>".$rowth5['withdrawId']."</td>";
        echo"<td>".$rowth5['Name']."</td>";
        $mth5= number_format($rowth5['withdrawAmount']);
        echo"<td>".$mth5."</td>";
         echo"<td>".$rowth5['date']."</td>";
        echo"<td>".$rowth5['tellerName']."</td>";
        $nth5= number_format($rowth5['balance']);
        echo"<td>".$nth5."</td>";
		$mgth5= number_format($rowth5['mgtFees']);
        echo"<td>".$mgth5."</td>";
        echo"<td>".$rowth5['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Withdraw record for May ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly expenses
			  echo"<p style='color:green;font-size:17pt'>INCOME STATEMENT</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Expenses</p></br>";
			  $c5= mysqli_query($con,"select * from expenses where MONTH(date)='05' and YEAR(date)='$yr'");
		      $numc5=mysqli_num_rows($c5);
			  if($numc5>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>VoucherNo</td>";
    echo"<td>expenseType</td>";
    echo"<td>expenseAmount</td>";
    echo"<td>Date </td>";
             echo"<td>personResponsible</td>";
             echo"</tr>";
				while($rowxp5 = mysqli_fetch_array($c5)){
		echo"<tr>";
        echo"<td>".$rowxp5['VoucherNo']."</td>";
        echo"<td>".$rowxp5['expenseType']."</td>";
        $mxp5= number_format($rowxp5['expenseAmount']);
        echo"<td>".$mxp5."</td>";
         echo"<td>".$rowxp5['date']."</td>";
        echo"<td>".$rowxp5['personResponsible']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no expense record for May ".$yr."</p></br>";  
			  }
			  
			  
			  
			  //getting monthly income
			  echo"<p style='color:blue;font-size:16pt'>Income</p></br>";
			  $d5= mysqli_query($con,"select * from income where MONTH(date)='05' and YEAR(date)='$yr'");
		      $numd5=mysqli_num_rows($d5);
			  if($numd5>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>incomeId</td>";
    echo"<td>receiptNo</td>";
    echo"<td>typeOfIncome</td>";
    echo"<td>receivedFrom </td>";
    echo"<td>incomeAmount</td>";
    echo"<td>Date</td>";
    echo"</tr>";
	while($rowinc5 = mysqli_fetch_array($d5)){
		echo"<tr>";
        echo"<td>".$rowinc5['incomeId']."</td>";
        echo"<td>".$rowinc5['receiptNo']."</td>";
        $minc5= number_format($rowinc5['incomeAmount']);
        echo"<td>".$rowinc5['typeOfIncome']."</td>";
        echo"<td>".$rowinc5['receivedFrom']."</td>";
		echo"<td>".$minc5."</td>";
		echo"<td>".$rowinc5['date']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Income record for May ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly shares
			  echo"<p style='color:green;font-size:17pt'>Shares</p></br>";
			  $e5= mysqli_query($con,"select * from share where MONTH(date)='05' and YEAR(date)='$yr'");
		      $nume5=mysqli_num_rows($e5);
			  if($nume5>0){
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
	while($rowsh5 = mysqli_fetch_array($e5)){
		echo"<tr>";
        echo"<td>".$rowsh5['shareID']."</td>";
        echo"<td>".number_format($rowsh5['amountPaid'])."</td>";
        $msh5= number_format($rowsh5['totalAmount']);
        echo"<td>".$msh5."</td>";
        echo"<td>".number_format($rowsh5['numberOfShares'])."</td>";
		echo"<td>".number_format($rowsh5['totalnumberOfShares'])."</td>";
		echo"<td>".$rowsh5['AccountNo']."</td>";
		echo"<td>".$rowsh5['date']."</td>";
		echo"<td>".$rowsh5['teller']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
		echo"<p style='color:red;font-size:15pt'>no Share record for May ".$yr."</p></br>";  
			  }
			  
			  
			  //getting customers registered in a specific month
			  echo"<p style='color:green;font-size:17pt'>Members Registered</p></br>";
			   $f5= mysqli_query($con,"select * from customer where MONTH(custSince)='05' and YEAR(custSince)='$yr'");
            $numf5=mysqli_num_rows($f5);
     		  if($numf5>0){
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
	while($rowcust5 = mysqli_fetch_array($f5)){
		echo"<tr>";
        echo"<td>".$rowcust5['AccountNo']."</td>";
        echo"<td>".$rowcust5['Name']."</td>";
        echo"<td>".$rowcust5['custDob']."</td>";
        
        echo"<td>".$rowcust5['custsexId']."</td>";
        echo"<td>".$rowcust5['custAddress']."</td>";
        echo"<td>".$rowcust5['custPhone']."</td>";
        echo"<td>".$rowcust5['custEmail']."</td>";
        echo"<td>".$rowcust5['custOccup']."</td>";
        echo"<td>".$rowcust5['custmarriedId']."</td>";
        echo"<td>".$rowcust5['custHeir']."</td>";
        echo"<td>".$rowcust5['custHeirrel']."</td>";
        echo"<td>".$rowcust5['placeOfBirth']."</td>";
        echo"<td>".$rowcust5['village']."</td>";
        echo"<td>".$rowcust5['parish']."</td>";
        echo"<td>".$rowcust5['subcounty']."</td>";
        echo"<td>".$rowcust5['district']."</td>";
        echo"<td>".$rowcust5['custSince']."</td>";
        $blcust5=number_format($rowcust5['acountBalance']);
        echo"<td>".$blcust5."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Member was registered in May ".$yr."</p></br>";  
			  }			
			 
			 
			   //getting monthly loans
			   echo"<p style='color:green;font-size:17pt'>Loans given out</p></br>";
			  $g5= mysqli_query($con,"select * from loan where MONTH(dateOfApproval )='05' and YEAR(dateOfApproval )='$yr'");
		      $numg5=mysqli_num_rows($g5);
     		  if($numg5>0){
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
	while($rowln5 = mysqli_fetch_array($g5)){
		echo"<tr>";
       echo"<td>".$rowln5['loanId']."</td>";
        echo"<td>".$rowln5['Name']."</td>";
        $m5= number_format($rowln5['approvedAmount']);
        echo"<td>".$m5."</td>";
        $pn5=number_format($rowln5['actualAmount']);
         echo"<td>".$pn5."</td>";
        echo"<td>".$rowln5['dateOfApproval']."</td>";
		echo"<td>".$rowln5['DueDate']."</td>";
        echo"<td>".$rowln5['status']."</td>";
         echo"<td>".$rowln5['loansOfficer']."</td>";
		 $mpt5= number_format($rowln5['monthlyInstalment']);
        echo"<td>".$mpt5."</td>";
        $blc5= number_format($rowln5['balance']);
        echo"<td>".$blc5."</td>";
        echo"<td>".$rowln5['period']."</td>";
		$fn5= number_format($rowln5['fine']);
		echo"<td>".$fn5."</td>";
        echo"<td>".$rowln5['AccountNo']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no loan was given out in May ".$yr."</p></br>";  
			  }

			 
			  //getting monthly loanRepayment
			  echo"<p style='color:green;font-size:17pt'>Loan Repayment</p></br>";
			  $h5= mysqli_query($con,"select * from loanrepayment where MONTH(date)='05' and YEAR(date)='$yr'");
		      $numh5=mysqli_num_rows($h5);
     		  if($numh5>0){
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
	while($rowrep5 = mysqli_fetch_array($h5)){
		echo"<tr>";
        echo"<td>".$rowrep5['repaymentId']."</td>";
        echo"<td>".$rowrep5['date']."</td>";
        echo"<td>".number_format($rowrep5['loanAmount'])."</td>";
        
        echo"<td>".number_format($rowrep5['principlePayment'])."</td>";
        echo"<td>".number_format($rowrep5['intrest'])."</td>";
        echo"<td>".number_format($rowrep5['fine'])."</td>";
        echo"<td>".number_format($rowrep5['totalPay'])."</td>";
        echo"<td>".number_format($rowrep5['balance'])."</td>";
        echo"<td>".$rowrep5['receivedBy']."</td>";
        echo"<td>".$rowrep5['paidBy']."</td>";
        echo"<td>".$rowrep5['AccountNo']."</td>";
        echo"<td>".$rowrep5['loanId']."</td>";
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Loan Repayment record for May ".$yr."</p></br>";  
			  }			
			 
		echo"<p style='font-size:25pt'>June</p></br>";
		
		
		
		//June report
		echo"<p style='color:green;font-size:17pt'>SAVINGS</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Deposit</p></br>";
			  //getting monthly deposits
			 $a6= mysqli_query($con,"select * from deposit where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numa6=mysqli_num_rows($a6);
			  if($numa6>0){
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
				while($rowd6 = mysqli_fetch_array($a6)){
		echo"<tr>";
        echo"<td>".$rowd6['depositId']."</td>";
        echo"<td>".$rowd6['Name']."</td>";
        $m6= number_format($rowd6['depositAmount']);
        echo"<td>".$m6."</td>";
         echo"<td>".$rowd6['date']."</td>";
        echo"<td>".$rowd6['paidBy']."</td>";
        
       echo"<td>".$rowd6['tellerName']."</td>";
        
        $n6= number_format($rowd6['balance']);
        echo"<td>".$n6."</td>";
        echo"<td>".$rowd6['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Deposit record for June ".$yr."</p></br>";  
			  }
			  
			 
			 //getting monthly withdraws
			  echo"<p style='color:blue;font-size:16pt'>Withdrawals</p></br>";
			   $b6= mysqli_query($con,"select * from withdraw where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numb6=mysqli_num_rows($b6);
			  if($numb6>0){
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
				while($rowth6 = mysqli_fetch_array($b6)){
		echo"<tr>";
        echo"<td>".$rowth6['withdrawId']."</td>";
        echo"<td>".$rowth6['Name']."</td>";
        $mth6= number_format($rowth6['withdrawAmount']);
        echo"<td>".$mth6."</td>";
         echo"<td>".$rowth6['date']."</td>";
        echo"<td>".$rowth6['tellerName']."</td>";
        $nth6= number_format($rowth6['balance']);
        echo"<td>".$nth6."</td>";
		$mgth6= number_format($rowth6['mgtFees']);
        echo"<td>".$mgth6."</td>";
        echo"<td>".$rowth6['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Withdraw record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly expenses
			  echo"<p style='color:green;font-size:17pt'>INCOME STATEMENT</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Expenses</p></br>";
			  $c6= mysqli_query($con,"select * from expenses where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numc6=mysqli_num_rows($c6);
			  if($numc6>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>VoucherNo</td>";
    echo"<td>expenseType</td>";
    echo"<td>expenseAmount</td>";
    echo"<td>Date </td>";
             echo"<td>personResponsible</td>";
             echo"</tr>";
				while($rowxp6 = mysqli_fetch_array($c6)){
		echo"<tr>";
        echo"<td>".$rowxp6['VoucherNo']."</td>";
        echo"<td>".$rowxp6['expenseType']."</td>";
        $mxp6= number_format($rowxp6['expenseAmount']);
        echo"<td>".$mxp6."</td>";
         echo"<td>".$rowxp6['date']."</td>";
        echo"<td>".$rowxp6['personResponsible']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no expense record for June ".$yr."</p></br>";  
			  }
			  
			  
			  
			  //getting monthly income
			  echo"<p style='color:blue;font-size:16pt'>Income</p></br>";
			  $d6= mysqli_query($con,"select * from income where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numd6=mysqli_num_rows($d6);
			  if($numd6>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>incomeId</td>";
    echo"<td>receiptNo</td>";
    echo"<td>typeOfIncome</td>";
    echo"<td>receivedFrom </td>";
    echo"<td>incomeAmount</td>";
    echo"<td>Date</td>";
    echo"</tr>";
	while($rowinc6 = mysqli_fetch_array($d6)){
		echo"<tr>";
        echo"<td>".$rowinc6['incomeId']."</td>";
        echo"<td>".$rowinc6['receiptNo']."</td>";
        $minc6= number_format($rowinc6['incomeAmount']);
        echo"<td>".$rowinc6['typeOfIncome']."</td>";
        echo"<td>".$rowinc6['receivedFrom']."</td>";
		echo"<td>".$minc6."</td>";
		echo"<td>".$rowinc6['date']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Income record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly shares
			  echo"<p style='color:green;font-size:17pt'>Shares</p></br>";
			  $e6= mysqli_query($con,"select * from share where MONTH(date)='06' and YEAR(date)='$yr'");
		      $nume6=mysqli_num_rows($e6);
			  if($nume6>0){
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
	while($rowsh6 = mysqli_fetch_array($e6)){
		echo"<tr>";
        echo"<td>".$rowsh6['shareID']."</td>";
        echo"<td>".number_format($rowsh6['amountPaid'])."</td>";
        $msh6= number_format($rowsh6['totalAmount']);
        echo"<td>".$msh6."</td>";
        echo"<td>".number_format($rowsh6['numberOfShares'])."</td>";
		echo"<td>".number_format($rowsh6['totalnumberOfShares'])."</td>";
		echo"<td>".$rowsh6['AccountNo']."</td>";
		echo"<td>".$rowsh6['date']."</td>";
		echo"<td>".$rowsh6['teller']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
		echo"<p style='color:red;font-size:15pt'>no Share record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting customers registered in a specific month
			  echo"<p style='color:green;font-size:17pt'>Members Registered</p></br>";
			   $f6= mysqli_query($con,"select * from customer where MONTH(custSince)='06' and YEAR(custSince)='$yr'");
            $numf6=mysqli_num_rows($f6);
     		  if($numf6>0){
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
	while($rowcust6 = mysqli_fetch_array($f6)){
		echo"<tr>";
        echo"<td>".$rowcust6['AccountNo']."</td>";
        echo"<td>".$rowcust6['Name']."</td>";
        echo"<td>".$rowcust6['custDob']."</td>";
        
        echo"<td>".$rowcust6['custsexId']."</td>";
        echo"<td>".$rowcust6['custAddress']."</td>";
        echo"<td>".$rowcust6['custPhone']."</td>";
        echo"<td>".$rowcust6['custEmail']."</td>";
        echo"<td>".$rowcust6['custOccup']."</td>";
        echo"<td>".$rowcust6['custmarriedId']."</td>";
        echo"<td>".$rowcust6['custHeir']."</td>";
        echo"<td>".$rowcust6['custHeirrel']."</td>";
        echo"<td>".$rowcust6['placeOfBirth']."</td>";
        echo"<td>".$rowcust6['village']."</td>";
        echo"<td>".$rowcust6['parish']."</td>";
        echo"<td>".$rowcust6['subcounty']."</td>";
        echo"<td>".$rowcust6['district']."</td>";
        echo"<td>".$rowcust6['custSince']."</td>";
        $blcust6=number_format($rowcust6['acountBalance']);
        echo"<td>".$blcust6."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Member was registered in June ".$yr."</p></br>";  
			  }			
			 
			 
			   //getting monthly loans
			   echo"<p style='color:green;font-size:17pt'>Loans given out</p></br>";
			  $g6= mysqli_query($con,"select * from loan where MONTH(dateOfApproval )='06' and YEAR(dateOfApproval )='$yr'");
		      $numg6=mysqli_num_rows($g6);
     		  if($numg6>0){
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
	while($rowln6 = mysqli_fetch_array($g6)){
		echo"<tr>";
       echo"<td>".$rowln6['loanId']."</td>";
        echo"<td>".$rowln6['Name']."</td>";
        $m6= number_format($rowln6['approvedAmount']);
        echo"<td>".$m6."</td>";
        $pn6=number_format($rowln6['actualAmount']);
         echo"<td>".$pn6."</td>";
        echo"<td>".$rowln6['dateOfApproval']."</td>";
		echo"<td>".$rowln6['DueDate']."</td>";
        echo"<td>".$rowln6['status']."</td>";
         echo"<td>".$rowln6['loansOfficer']."</td>";
		 $mpt6= number_format($rowln6['monthlyInstalment']);
        echo"<td>".$mpt6."</td>";
        $blc6= number_format($rowln6['balance']);
        echo"<td>".$blc6."</td>";
        echo"<td>".$rowln6['period']."</td>";
		$fn6= number_format($rowln6['fine']);
		echo"<td>".$fn6."</td>";
        echo"<td>".$rowln6['AccountNo']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no loan was given out in June".$yr."</p></br>";  
			  }

			 
			  //getting monthly loanRepayment
			  echo"<p style='color:green;font-size:17pt'>Loan Repayment</p></br>";
			  $h6= mysqli_query($con,"select * from loanrepayment where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numh6=mysqli_num_rows($h6);
     		  if($numh6>0){
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
	while($rowrep6 = mysqli_fetch_array($h6)){
		echo"<tr>";
        echo"<td>".$rowrep6['repaymentId']."</td>";
        echo"<td>".$rowrep6['date']."</td>";
        echo"<td>".number_format($rowrep6['loanAmount'])."</td>";
        
        echo"<td>".number_format($rowrep6['principlePayment'])."</td>";
        echo"<td>".number_format($rowrep6['intrest'])."</td>";
        echo"<td>".number_format($rowrep6['fine'])."</td>";
        echo"<td>".number_format($rowrep6['totalPay'])."</td>";
        echo"<td>".number_format($rowrep6['balance'])."</td>";
        echo"<td>".$rowrep6['receivedBy']."</td>";
        echo"<td>".$rowrep6['paidBy']."</td>";
        echo"<td>".$rowrep6['AccountNo']."</td>";
        echo"<td>".$rowrep6['loanId']."</td>";
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Loan Repayment record for June ".$yr."</p></br>";  
			  }			
			 
		echo"<p style='font-size:25pt'>July</p></br>";
		//July report
		echo"<p style='color:green;font-size:17pt'>SAVINGS</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Deposit</p></br>";
			  //getting monthly deposits
			 $a6= mysqli_query($con,"select * from deposit where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numa6=mysqli_num_rows($a6);
			  if($numa6>0){
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
				while($rowd6 = mysqli_fetch_array($a6)){
		echo"<tr>";
        echo"<td>".$rowd6['depositId']."</td>";
        echo"<td>".$rowd['Name']."</td>";
        $m6= number_format($rowd6['depositAmount']);
        echo"<td>".$m6."</td>";
         echo"<td>".$rowd6['date']."</td>";
        echo"<td>".$rowd6['paidBy']."</td>";
        
       echo"<td>".$rowd6['tellerName']."</td>";
        
        $n6= number_format($rowd6['balance']);
        echo"<td>".$n6."</td>";
        echo"<td>".$rowd6['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Deposit record for June ".$yr."</p></br>";  
			  }
			  
			 
			 //getting monthly withdraws
			  echo"<p style='color:blue;font-size:16pt'>Withdrawals</p></br>";
			   $b6= mysqli_query($con,"select * from withdraw where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numb6=mysqli_num_rows($b6);
			  if($numb6>0){
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
				while($rowth6 = mysqli_fetch_array($b6)){
		echo"<tr>";
        echo"<td>".$rowth6['withdrawId']."</td>";
        echo"<td>".$rowth6['Name']."</td>";
        $mth6= number_format($rowth6['withdrawAmount']);
        echo"<td>".$mth6."</td>";
         echo"<td>".$rowth6['date']."</td>";
        echo"<td>".$rowth6['tellerName']."</td>";
        $nth6= number_format($rowth6['balance']);
        echo"<td>".$nth6."</td>";
		$mgth6= number_format($rowth6['mgtFees']);
        echo"<td>".$mgth6."</td>";
        echo"<td>".$rowth6['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Withdraw record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly expenses
			  echo"<p style='color:green;font-size:17pt'>INCOME STATEMENT</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Expenses</p></br>";
			  $c6= mysqli_query($con,"select * from expenses where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numc6=mysqli_num_rows($c6);
			  if($numc6>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>VoucherNo</td>";
    echo"<td>expenseType</td>";
    echo"<td>expenseAmount</td>";
    echo"<td>Date </td>";
             echo"<td>personResponsible</td>";
             echo"</tr>";
				while($rowxp6 = mysqli_fetch_array($c6)){
		echo"<tr>";
        echo"<td>".$rowxp6['VoucherNo']."</td>";
        echo"<td>".$rowxp6['expenseType']."</td>";
        $mxp6= number_format($rowxp6['expenseAmount']);
        echo"<td>".$mxp6."</td>";
         echo"<td>".$rowxp6['date']."</td>";
        echo"<td>".$rowxp6['personResponsible']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no expense record for June ".$yr."</p></br>";  
			  }
			  
			  
			  
			  //getting monthly income
			  echo"<p style='color:blue;font-size:16pt'>Income</p></br>";
			  $d6= mysqli_query($con,"select * from income where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numd6=mysqli_num_rows($d6);
			  if($numd6>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>incomeId</td>";
    echo"<td>receiptNo</td>";
    echo"<td>typeOfIncome</td>";
    echo"<td>receivedFrom </td>";
    echo"<td>incomeAmount</td>";
    echo"<td>Date</td>";
    echo"</tr>";
	while($rowinc6 = mysqli_fetch_array($d6)){
		echo"<tr>";
        echo"<td>".$rowinc6['incomeId']."</td>";
        echo"<td>".$rowinc6['receiptNo']."</td>";
        $minc6= number_format($rowinc6['incomeAmount']);
        echo"<td>".$rowinc6['typeOfIncome']."</td>";
        echo"<td>".$rowinc6['receivedFrom']."</td>";
		echo"<td>".$minc6."</td>";
		echo"<td>".$rowinc6['date']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Income record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly shares
			  echo"<p style='color:green;font-size:17pt'>Shares</p></br>";
			  $e6= mysqli_query($con,"select * from share where MONTH(date)='06' and YEAR(date)='$yr'");
		      $nume6=mysqli_num_rows($e6);
			  if($nume6>0){
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
	while($rowsh6 = mysqli_fetch_array($e6)){
		echo"<tr>";
        echo"<td>".$rowsh6['shareID']."</td>";
        echo"<td>".number_format($rowsh6['amountPaid'])."</td>";
        $msh6= number_format($rowsh6['totalAmount']);
        echo"<td>".$msh6."</td>";
        echo"<td>".number_format($rowsh6['numberOfShares'])."</td>";
		echo"<td>".number_format($rowsh6['totalnumberOfShares'])."</td>";
		echo"<td>".$rowsh6['AccountNo']."</td>";
		echo"<td>".$rowsh6['date']."</td>";
		echo"<td>".$rowsh6['teller']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
		echo"<p style='color:red;font-size:15pt'>no Share record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting customers registered in a specific month
			  echo"<p style='color:green;font-size:17pt'>Members Registered</p></br>";
			   $f6= mysqli_query($con,"select * from customer where MONTH(custSince)='06' and YEAR(custSince)='$yr'");
            $numf6=mysqli_num_rows($f6);
     		  if($numf6>0){
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
	while($rowcust6 = mysqli_fetch_array($f6)){
		echo"<tr>";
        echo"<td>".$rowcust6['AccountNo']."</td>";
        echo"<td>".$rowcust6['Name']."</td>";
        echo"<td>".$rowcust6['custDob']."</td>";
        
        echo"<td>".$rowcust6['custsexId']."</td>";
        echo"<td>".$rowcust6['custAddress']."</td>";
        echo"<td>".$rowcust6['custPhone']."</td>";
        echo"<td>".$rowcust6['custEmail']."</td>";
        echo"<td>".$rowcust6['custOccup']."</td>";
        echo"<td>".$rowcust6['custmarriedId']."</td>";
        echo"<td>".$rowcust6['custHeir']."</td>";
        echo"<td>".$rowcust6['custHeirrel']."</td>";
        echo"<td>".$rowcust6['placeOfBirth']."</td>";
        echo"<td>".$rowcust6['village']."</td>";
        echo"<td>".$rowcust6['parish']."</td>";
        echo"<td>".$rowcust6['subcounty']."</td>";
        echo"<td>".$rowcust6['district']."</td>";
        echo"<td>".$rowcust6['custSince']."</td>";
        $blcust6=number_format($rowcust6['acountBalance']);
        echo"<td>".$blcust6."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Member was registered in June ".$yr."</p></br>";  
			  }			
			 
			 
			   //getting monthly loans
			   echo"<p style='color:green;font-size:17pt'>Loans given out</p></br>";
			  $g6= mysqli_query($con,"select * from loan where MONTH(dateOfApproval )='06' and YEAR(dateOfApproval )='$yr'");
		      $numg6=mysqli_num_rows($g6);
     		  if($numg6>0){
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
	while($rowln6 = mysqli_fetch_array($g6)){
		echo"<tr>";
       echo"<td>".$rowln6['loanId']."</td>";
        echo"<td>".$rowln6['Name']."</td>";
        $m6= number_format($rowln6['approvedAmount']);
        echo"<td>".$m6."</td>";
        $pn6=number_format($rowln6['actualAmount']);
         echo"<td>".$pn6."</td>";
        echo"<td>".$rowln6['dateOfApproval']."</td>";
		echo"<td>".$rowln6['DueDate']."</td>";
        echo"<td>".$rowln6['status']."</td>";
         echo"<td>".$rowln6['loansOfficer']."</td>";
		 $mpt6= number_format($rowln6['monthlyInstalment']);
        echo"<td>".$mpt6."</td>";
        $blc6= number_format($rowln6['balance']);
        echo"<td>".$blc6."</td>";
        echo"<td>".$rowln6['period']."</td>";
		$fn6= number_format($rowln6['fine']);
		echo"<td>".$fn6."</td>";
        echo"<td>".$rowln6['AccountNo']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no loan was given out in June".$yr."</p></br>";  
			  }

			 
			  //getting monthly loanRepayment
			  echo"<p style='color:green;font-size:17pt'>Loan Repayment</p></br>";
			  $h6= mysqli_query($con,"select * from loanrepayment where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numh6=mysqli_num_rows($h6);
     		  if($numh6>0){
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
	while($rowrep6 = mysqli_fetch_array($h6)){
		echo"<tr>";
        echo"<td>".$rowrep6['repaymentId']."</td>";
        echo"<td>".$rowrep6['date']."</td>";
        echo"<td>".number_format($rowrep6['loanAmount'])."</td>";
        
        echo"<td>".number_format($rowrep6['principlePayment'])."</td>";
        echo"<td>".number_format($rowrep6['intrest'])."</td>";
        echo"<td>".number_format($rowrep6['fine'])."</td>";
        echo"<td>".number_format($rowrep6['totalPay'])."</td>";
        echo"<td>".number_format($rowrep6['balance'])."</td>";
        echo"<td>".$rowrep6['receivedBy']."</td>";
        echo"<td>".$rowrep6['paidBy']."</td>";
        echo"<td>".$rowrep6['AccountNo']."</td>";
        echo"<td>".$rowrep6['loanId']."</td>";
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Loan Repayment record for June ".$yr."</p></br>";  
			  }			
			 
		echo"<p style='font-size:25pt'>August</p></br>";
		//August report
		echo"<p style='color:green;font-size:17pt'>SAVINGS</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Deposit</p></br>";
			  //getting monthly deposits
			 $a6= mysqli_query($con,"select * from deposit where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numa6=mysqli_num_rows($a6);
			  if($numa6>0){
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
				while($rowd6 = mysqli_fetch_array($a6)){
		echo"<tr>";
        echo"<td>".$rowd6['depositId']."</td>";
        echo"<td>".$rowd['Name']."</td>";
        $m6= number_format($rowd6['depositAmount']);
        echo"<td>".$m6."</td>";
         echo"<td>".$rowd6['date']."</td>";
        echo"<td>".$rowd6['paidBy']."</td>";
        
       echo"<td>".$rowd6['tellerName']."</td>";
        
        $n6= number_format($rowd6['balance']);
        echo"<td>".$n6."</td>";
        echo"<td>".$rowd6['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Deposit record for June ".$yr."</p></br>";  
			  }
			  
			 
			 //getting monthly withdraws
			  echo"<p style='color:blue;font-size:16pt'>Withdrawals</p></br>";
			   $b6= mysqli_query($con,"select * from withdraw where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numb6=mysqli_num_rows($b6);
			  if($numb6>0){
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
				while($rowth6 = mysqli_fetch_array($b6)){
		echo"<tr>";
        echo"<td>".$rowth6['withdrawId']."</td>";
        echo"<td>".$rowth6['Name']."</td>";
        $mth6= number_format($rowth6['withdrawAmount']);
        echo"<td>".$mth6."</td>";
         echo"<td>".$rowth6['date']."</td>";
        echo"<td>".$rowth6['tellerName']."</td>";
        $nth6= number_format($rowth6['balance']);
        echo"<td>".$nth6."</td>";
		$mgth6= number_format($rowth6['mgtFees']);
        echo"<td>".$mgth6."</td>";
        echo"<td>".$rowth6['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Withdraw record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly expenses
			  echo"<p style='color:green;font-size:17pt'>INCOME STATEMENT</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Expenses</p></br>";
			  $c6= mysqli_query($con,"select * from expenses where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numc6=mysqli_num_rows($c6);
			  if($numc6>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>VoucherNo</td>";
    echo"<td>expenseType</td>";
    echo"<td>expenseAmount</td>";
    echo"<td>Date </td>";
             echo"<td>personResponsible</td>";
             echo"</tr>";
				while($rowxp6 = mysqli_fetch_array($c6)){
		echo"<tr>";
        echo"<td>".$rowxp6['VoucherNo']."</td>";
        echo"<td>".$rowxp6['expenseType']."</td>";
        $mxp6= number_format($rowxp6['expenseAmount']);
        echo"<td>".$mxp6."</td>";
         echo"<td>".$rowxp6['date']."</td>";
        echo"<td>".$rowxp6['personResponsible']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no expense record for June ".$yr."</p></br>";  
			  }
			  
			  
			  
			  //getting monthly income
			  echo"<p style='color:blue;font-size:16pt'>Income</p></br>";
			  $d6= mysqli_query($con,"select * from income where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numd6=mysqli_num_rows($d6);
			  if($numd6>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>incomeId</td>";
    echo"<td>receiptNo</td>";
    echo"<td>typeOfIncome</td>";
    echo"<td>receivedFrom </td>";
    echo"<td>incomeAmount</td>";
    echo"<td>Date</td>";
    echo"</tr>";
	while($rowinc6 = mysqli_fetch_array($d6)){
		echo"<tr>";
        echo"<td>".$rowinc6['incomeId']."</td>";
        echo"<td>".$rowinc6['receiptNo']."</td>";
        $minc6= number_format($rowinc6['incomeAmount']);
        echo"<td>".$rowinc6['typeOfIncome']."</td>";
        echo"<td>".$rowinc6['receivedFrom']."</td>";
		echo"<td>".$minc6."</td>";
		echo"<td>".$rowinc6['date']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Income record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly shares
			  echo"<p style='color:green;font-size:17pt'>Shares</p></br>";
			  $e6= mysqli_query($con,"select * from share where MONTH(date)='06' and YEAR(date)='$yr'");
		      $nume6=mysqli_num_rows($e6);
			  if($nume6>0){
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
	while($rowsh6 = mysqli_fetch_array($e6)){
		echo"<tr>";
        echo"<td>".$rowsh6['shareID']."</td>";
        echo"<td>".number_format($rowsh6['amountPaid'])."</td>";
        $msh6= number_format($rowsh6['totalAmount']);
        echo"<td>".$msh6."</td>";
        echo"<td>".number_format($rowsh6['numberOfShares'])."</td>";
		echo"<td>".number_format($rowsh6['totalnumberOfShares'])."</td>";
		echo"<td>".$rowsh6['AccountNo']."</td>";
		echo"<td>".$rowsh6['date']."</td>";
		echo"<td>".$rowsh6['teller']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
		echo"<p style='color:red;font-size:15pt'>no Share record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting customers registered in a specific month
			  echo"<p style='color:green;font-size:17pt'>Members Registered</p></br>";
			   $f6= mysqli_query($con,"select * from customer where MONTH(custSince)='06' and YEAR(custSince)='$yr'");
            $numf6=mysqli_num_rows($f6);
     		  if($numf6>0){
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
	while($rowcust6 = mysqli_fetch_array($f6)){
		echo"<tr>";
        echo"<td>".$rowcust6['AccountNo']."</td>";
        echo"<td>".$rowcust6['Name']."</td>";
        echo"<td>".$rowcust6['custDob']."</td>";
        
        echo"<td>".$rowcust6['custsexId']."</td>";
        echo"<td>".$rowcust6['custAddress']."</td>";
        echo"<td>".$rowcust6['custPhone']."</td>";
        echo"<td>".$rowcust6['custEmail']."</td>";
        echo"<td>".$rowcust6['custOccup']."</td>";
        echo"<td>".$rowcust6['custmarriedId']."</td>";
        echo"<td>".$rowcust6['custHeir']."</td>";
        echo"<td>".$rowcust6['custHeirrel']."</td>";
        echo"<td>".$rowcust6['placeOfBirth']."</td>";
        echo"<td>".$rowcust6['village']."</td>";
        echo"<td>".$rowcust6['parish']."</td>";
        echo"<td>".$rowcust6['subcounty']."</td>";
        echo"<td>".$rowcust6['district']."</td>";
        echo"<td>".$rowcust6['custSince']."</td>";
        $blcust6=number_format($rowcust6['acountBalance']);
        echo"<td>".$blcust6."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Member was registered in June ".$yr."</p></br>";  
			  }			
			 
			 
			   //getting monthly loans
			   echo"<p style='color:green;font-size:17pt'>Loans given out</p></br>";
			  $g6= mysqli_query($con,"select * from loan where MONTH(dateOfApproval )='06' and YEAR(dateOfApproval )='$yr'");
		      $numg6=mysqli_num_rows($g6);
     		  if($numg6>0){
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
	while($rowln6 = mysqli_fetch_array($g6)){
		echo"<tr>";
       echo"<td>".$rowln6['loanId']."</td>";
        echo"<td>".$rowln6['Name']."</td>";
        $m6= number_format($rowln6['approvedAmount']);
        echo"<td>".$m6."</td>";
        $pn6=number_format($rowln6['actualAmount']);
         echo"<td>".$pn6."</td>";
        echo"<td>".$rowln6['dateOfApproval']."</td>";
		echo"<td>".$rowln6['DueDate']."</td>";
        echo"<td>".$rowln6['status']."</td>";
         echo"<td>".$rowln6['loansOfficer']."</td>";
		 $mpt6= number_format($rowln6['monthlyInstalment']);
        echo"<td>".$mpt6."</td>";
        $blc6= number_format($rowln6['balance']);
        echo"<td>".$blc6."</td>";
        echo"<td>".$rowln6['period']."</td>";
		$fn6= number_format($rowln6['fine']);
		echo"<td>".$fn6."</td>";
        echo"<td>".$rowln6['AccountNo']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no loan was given out in June".$yr."</p></br>";  
			  }

			 
			  //getting monthly loanRepayment
			  echo"<p style='color:green;font-size:17pt'>Loan Repayment</p></br>";
			  $h6= mysqli_query($con,"select * from loanrepayment where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numh6=mysqli_num_rows($h6);
     		  if($numh6>0){
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
	while($rowrep6 = mysqli_fetch_array($h6)){
		echo"<tr>";
        echo"<td>".$rowrep6['repaymentId']."</td>";
        echo"<td>".$rowrep6['date']."</td>";
        echo"<td>".number_format($rowrep6['loanAmount'])."</td>";
        
        echo"<td>".number_format($rowrep6['principlePayment'])."</td>";
        echo"<td>".number_format($rowrep6['intrest'])."</td>";
        echo"<td>".number_format($rowrep6['fine'])."</td>";
        echo"<td>".number_format($rowrep6['totalPay'])."</td>";
        echo"<td>".number_format($rowrep6['balance'])."</td>";
        echo"<td>".$rowrep6['receivedBy']."</td>";
        echo"<td>".$rowrep6['paidBy']."</td>";
        echo"<td>".$rowrep6['AccountNo']."</td>";
        echo"<td>".$rowrep6['loanId']."</td>";
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Loan Repayment record for June ".$yr."</p></br>";  
			  }			
			 
		echo"<p style='font-size:25pt'>September</p></br>";
		//September report
		echo"<p style='color:green;font-size:17pt'>SAVINGS</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Deposit</p></br>";
			  //getting monthly deposits
			 $a6= mysqli_query($con,"select * from deposit where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numa6=mysqli_num_rows($a6);
			  if($numa6>0){
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
				while($rowd6 = mysqli_fetch_array($a6)){
		echo"<tr>";
        echo"<td>".$rowd6['depositId']."</td>";
        echo"<td>".$rowd['Name']."</td>";
        $m6= number_format($rowd6['depositAmount']);
        echo"<td>".$m6."</td>";
         echo"<td>".$rowd6['date']."</td>";
        echo"<td>".$rowd6['paidBy']."</td>";
        
       echo"<td>".$rowd6['tellerName']."</td>";
        
        $n6= number_format($rowd6['balance']);
        echo"<td>".$n6."</td>";
        echo"<td>".$rowd6['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Deposit record for June ".$yr."</p></br>";  
			  }
			  
			 
			 //getting monthly withdraws
			  echo"<p style='color:blue;font-size:16pt'>Withdrawals</p></br>";
			   $b6= mysqli_query($con,"select * from withdraw where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numb6=mysqli_num_rows($b6);
			  if($numb6>0){
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
				while($rowth6 = mysqli_fetch_array($b6)){
		echo"<tr>";
        echo"<td>".$rowth6['withdrawId']."</td>";
        echo"<td>".$rowth6['Name']."</td>";
        $mth6= number_format($rowth6['withdrawAmount']);
        echo"<td>".$mth6."</td>";
         echo"<td>".$rowth6['date']."</td>";
        echo"<td>".$rowth6['tellerName']."</td>";
        $nth6= number_format($rowth6['balance']);
        echo"<td>".$nth6."</td>";
		$mgth6= number_format($rowth6['mgtFees']);
        echo"<td>".$mgth6."</td>";
        echo"<td>".$rowth6['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Withdraw record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly expenses
			  echo"<p style='color:green;font-size:17pt'>INCOME STATEMENT</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Expenses</p></br>";
			  $c6= mysqli_query($con,"select * from expenses where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numc6=mysqli_num_rows($c6);
			  if($numc6>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>VoucherNo</td>";
    echo"<td>expenseType</td>";
    echo"<td>expenseAmount</td>";
    echo"<td>Date </td>";
             echo"<td>personResponsible</td>";
             echo"</tr>";
				while($rowxp6 = mysqli_fetch_array($c6)){
		echo"<tr>";
        echo"<td>".$rowxp6['VoucherNo']."</td>";
        echo"<td>".$rowxp6['expenseType']."</td>";
        $mxp6= number_format($rowxp6['expenseAmount']);
        echo"<td>".$mxp6."</td>";
         echo"<td>".$rowxp6['date']."</td>";
        echo"<td>".$rowxp6['personResponsible']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no expense record for June ".$yr."</p></br>";  
			  }
			  
			  
			  
			  //getting monthly income
			  echo"<p style='color:blue;font-size:16pt'>Income</p></br>";
			  $d6= mysqli_query($con,"select * from income where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numd6=mysqli_num_rows($d6);
			  if($numd6>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>incomeId</td>";
    echo"<td>receiptNo</td>";
    echo"<td>typeOfIncome</td>";
    echo"<td>receivedFrom </td>";
    echo"<td>incomeAmount</td>";
    echo"<td>Date</td>";
    echo"</tr>";
	while($rowinc6 = mysqli_fetch_array($d6)){
		echo"<tr>";
        echo"<td>".$rowinc6['incomeId']."</td>";
        echo"<td>".$rowinc6['receiptNo']."</td>";
        $minc6= number_format($rowinc6['incomeAmount']);
        echo"<td>".$rowinc6['typeOfIncome']."</td>";
        echo"<td>".$rowinc6['receivedFrom']."</td>";
		echo"<td>".$minc6."</td>";
		echo"<td>".$rowinc6['date']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Income record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly shares
			  echo"<p style='color:green;font-size:17pt'>Shares</p></br>";
			  $e6= mysqli_query($con,"select * from share where MONTH(date)='06' and YEAR(date)='$yr'");
		      $nume6=mysqli_num_rows($e6);
			  if($nume6>0){
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
	while($rowsh6 = mysqli_fetch_array($e6)){
		echo"<tr>";
        echo"<td>".$rowsh6['shareID']."</td>";
        echo"<td>".number_format($rowsh6['amountPaid'])."</td>";
        $msh6= number_format($rowsh6['totalAmount']);
        echo"<td>".$msh6."</td>";
        echo"<td>".number_format($rowsh6['numberOfShares'])."</td>";
		echo"<td>".number_format($rowsh6['totalnumberOfShares'])."</td>";
		echo"<td>".$rowsh6['AccountNo']."</td>";
		echo"<td>".$rowsh6['date']."</td>";
		echo"<td>".$rowsh6['teller']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
		echo"<p style='color:red;font-size:15pt'>no Share record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting customers registered in a specific month
			  echo"<p style='color:green;font-size:17pt'>Members Registered</p></br>";
			   $f6= mysqli_query($con,"select * from customer where MONTH(custSince)='06' and YEAR(custSince)='$yr'");
            $numf6=mysqli_num_rows($f6);
     		  if($numf6>0){
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
	while($rowcust6 = mysqli_fetch_array($f6)){
		echo"<tr>";
        echo"<td>".$rowcust6['AccountNo']."</td>";
        echo"<td>".$rowcust6['Name']."</td>";
        echo"<td>".$rowcust6['custDob']."</td>";
        
        echo"<td>".$rowcust6['custsexId']."</td>";
        echo"<td>".$rowcust6['custAddress']."</td>";
        echo"<td>".$rowcust6['custPhone']."</td>";
        echo"<td>".$rowcust6['custEmail']."</td>";
        echo"<td>".$rowcust6['custOccup']."</td>";
        echo"<td>".$rowcust6['custmarriedId']."</td>";
        echo"<td>".$rowcust6['custHeir']."</td>";
        echo"<td>".$rowcust6['custHeirrel']."</td>";
        echo"<td>".$rowcust6['placeOfBirth']."</td>";
        echo"<td>".$rowcust6['village']."</td>";
        echo"<td>".$rowcust6['parish']."</td>";
        echo"<td>".$rowcust6['subcounty']."</td>";
        echo"<td>".$rowcust6['district']."</td>";
        echo"<td>".$rowcust6['custSince']."</td>";
        $blcust6=number_format($rowcust6['acountBalance']);
        echo"<td>".$blcust6."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Member was registered in June ".$yr."</p></br>";  
			  }			
			 
			 
			   //getting monthly loans
			   echo"<p style='color:green;font-size:17pt'>Loans given out</p></br>";
			  $g6= mysqli_query($con,"select * from loan where MONTH(dateOfApproval )='06' and YEAR(dateOfApproval )='$yr'");
		      $numg6=mysqli_num_rows($g6);
     		  if($numg6>0){
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
	while($rowln6 = mysqli_fetch_array($g6)){
		echo"<tr>";
       echo"<td>".$rowln6['loanId']."</td>";
        echo"<td>".$rowln6['Name']."</td>";
        $m6= number_format($rowln6['approvedAmount']);
        echo"<td>".$m6."</td>";
        $pn6=number_format($rowln6['actualAmount']);
         echo"<td>".$pn6."</td>";
        echo"<td>".$rowln6['dateOfApproval']."</td>";
		echo"<td>".$rowln6['DueDate']."</td>";
        echo"<td>".$rowln6['status']."</td>";
         echo"<td>".$rowln6['loansOfficer']."</td>";
		 $mpt6= number_format($rowln6['monthlyInstalment']);
        echo"<td>".$mpt6."</td>";
        $blc6= number_format($rowln6['balance']);
        echo"<td>".$blc6."</td>";
        echo"<td>".$rowln6['period']."</td>";
		$fn6= number_format($rowln6['fine']);
		echo"<td>".$fn6."</td>";
        echo"<td>".$rowln6['AccountNo']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no loan was given out in June".$yr."</p></br>";  
			  }

			 
			  //getting monthly loanRepayment
			  echo"<p style='color:green;font-size:17pt'>Loan Repayment</p></br>";
			  $h6= mysqli_query($con,"select * from loanrepayment where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numh6=mysqli_num_rows($h6);
     		  if($numh6>0){
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
	while($rowrep6 = mysqli_fetch_array($h6)){
		echo"<tr>";
        echo"<td>".$rowrep6['repaymentId']."</td>";
        echo"<td>".$rowrep6['date']."</td>";
        echo"<td>".number_format($rowrep6['loanAmount'])."</td>";
        
        echo"<td>".number_format($rowrep6['principlePayment'])."</td>";
        echo"<td>".number_format($rowrep6['intrest'])."</td>";
        echo"<td>".number_format($rowrep6['fine'])."</td>";
        echo"<td>".number_format($rowrep6['totalPay'])."</td>";
        echo"<td>".number_format($rowrep6['balance'])."</td>";
        echo"<td>".$rowrep6['receivedBy']."</td>";
        echo"<td>".$rowrep6['paidBy']."</td>";
        echo"<td>".$rowrep6['AccountNo']."</td>";
        echo"<td>".$rowrep6['loanId']."</td>";
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Loan Repayment record for June ".$yr."</p></br>";  
			  }			
			 
		
		
		echo"<p style='font-size:25pt'>October</p></br>";
		//October report
		echo"<p style='color:green;font-size:17pt'>SAVINGS</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Deposit</p></br>";
			  //getting monthly deposits
			 $a6= mysqli_query($con,"select * from deposit where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numa6=mysqli_num_rows($a6);
			  if($numa6>0){
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
				while($rowd6 = mysqli_fetch_array($a6)){
		echo"<tr>";
        echo"<td>".$rowd6['depositId']."</td>";
        echo"<td>".$rowd['Name']."</td>";
        $m6= number_format($rowd6['depositAmount']);
        echo"<td>".$m6."</td>";
         echo"<td>".$rowd6['date']."</td>";
        echo"<td>".$rowd6['paidBy']."</td>";
        
       echo"<td>".$rowd6['tellerName']."</td>";
        
        $n6= number_format($rowd6['balance']);
        echo"<td>".$n6."</td>";
        echo"<td>".$rowd6['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Deposit record for June ".$yr."</p></br>";  
			  }
			  
			 
			 //getting monthly withdraws
			  echo"<p style='color:blue;font-size:16pt'>Withdrawals</p></br>";
			   $b6= mysqli_query($con,"select * from withdraw where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numb6=mysqli_num_rows($b6);
			  if($numb6>0){
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
				while($rowth6 = mysqli_fetch_array($b6)){
		echo"<tr>";
        echo"<td>".$rowth6['withdrawId']."</td>";
        echo"<td>".$rowth6['Name']."</td>";
        $mth6= number_format($rowth6['withdrawAmount']);
        echo"<td>".$mth6."</td>";
         echo"<td>".$rowth6['date']."</td>";
        echo"<td>".$rowth6['tellerName']."</td>";
        $nth6= number_format($rowth6['balance']);
        echo"<td>".$nth6."</td>";
		$mgth6= number_format($rowth6['mgtFees']);
        echo"<td>".$mgth6."</td>";
        echo"<td>".$rowth6['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Withdraw record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly expenses
			  echo"<p style='color:green;font-size:17pt'>INCOME STATEMENT</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Expenses</p></br>";
			  $c6= mysqli_query($con,"select * from expenses where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numc6=mysqli_num_rows($c6);
			  if($numc6>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>VoucherNo</td>";
    echo"<td>expenseType</td>";
    echo"<td>expenseAmount</td>";
    echo"<td>Date </td>";
             echo"<td>personResponsible</td>";
             echo"</tr>";
				while($rowxp6 = mysqli_fetch_array($c6)){
		echo"<tr>";
        echo"<td>".$rowxp6['VoucherNo']."</td>";
        echo"<td>".$rowxp6['expenseType']."</td>";
        $mxp6= number_format($rowxp6['expenseAmount']);
        echo"<td>".$mxp6."</td>";
         echo"<td>".$rowxp6['date']."</td>";
        echo"<td>".$rowxp6['personResponsible']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no expense record for June ".$yr."</p></br>";  
			  }
			  
			  
			  
			  //getting monthly income
			  echo"<p style='color:blue;font-size:16pt'>Income</p></br>";
			  $d6= mysqli_query($con,"select * from income where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numd6=mysqli_num_rows($d6);
			  if($numd6>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>incomeId</td>";
    echo"<td>receiptNo</td>";
    echo"<td>typeOfIncome</td>";
    echo"<td>receivedFrom </td>";
    echo"<td>incomeAmount</td>";
    echo"<td>Date</td>";
    echo"</tr>";
	while($rowinc6 = mysqli_fetch_array($d6)){
		echo"<tr>";
        echo"<td>".$rowinc6['incomeId']."</td>";
        echo"<td>".$rowinc6['receiptNo']."</td>";
        $minc6= number_format($rowinc6['incomeAmount']);
        echo"<td>".$rowinc6['typeOfIncome']."</td>";
        echo"<td>".$rowinc6['receivedFrom']."</td>";
		echo"<td>".$minc6."</td>";
		echo"<td>".$rowinc6['date']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Income record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly shares
			  echo"<p style='color:green;font-size:17pt'>Shares</p></br>";
			  $e6= mysqli_query($con,"select * from share where MONTH(date)='06' and YEAR(date)='$yr'");
		      $nume6=mysqli_num_rows($e6);
			  if($nume6>0){
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
	while($rowsh6 = mysqli_fetch_array($e6)){
		echo"<tr>";
        echo"<td>".$rowsh6['shareID']."</td>";
        echo"<td>".number_format($rowsh6['amountPaid'])."</td>";
        $msh6= number_format($rowsh6['totalAmount']);
        echo"<td>".$msh6."</td>";
        echo"<td>".number_format($rowsh6['numberOfShares'])."</td>";
		echo"<td>".number_format($rowsh6['totalnumberOfShares'])."</td>";
		echo"<td>".$rowsh6['AccountNo']."</td>";
		echo"<td>".$rowsh6['date']."</td>";
		echo"<td>".$rowsh6['teller']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
		echo"<p style='color:red;font-size:15pt'>no Share record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting customers registered in a specific month
			  echo"<p style='color:green;font-size:17pt'>Members Registered</p></br>";
			   $f6= mysqli_query($con,"select * from customer where MONTH(custSince)='06' and YEAR(custSince)='$yr'");
            $numf6=mysqli_num_rows($f6);
     		  if($numf6>0){
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
	while($rowcust6 = mysqli_fetch_array($f6)){
		echo"<tr>";
        echo"<td>".$rowcust6['AccountNo']."</td>";
        echo"<td>".$rowcust6['Name']."</td>";
        echo"<td>".$rowcust6['custDob']."</td>";
        
        echo"<td>".$rowcust6['custsexId']."</td>";
        echo"<td>".$rowcust6['custAddress']."</td>";
        echo"<td>".$rowcust6['custPhone']."</td>";
        echo"<td>".$rowcust6['custEmail']."</td>";
        echo"<td>".$rowcust6['custOccup']."</td>";
        echo"<td>".$rowcust6['custmarriedId']."</td>";
        echo"<td>".$rowcust6['custHeir']."</td>";
        echo"<td>".$rowcust6['custHeirrel']."</td>";
        echo"<td>".$rowcust6['placeOfBirth']."</td>";
        echo"<td>".$rowcust6['village']."</td>";
        echo"<td>".$rowcust6['parish']."</td>";
        echo"<td>".$rowcust6['subcounty']."</td>";
        echo"<td>".$rowcust6['district']."</td>";
        echo"<td>".$rowcust6['custSince']."</td>";
        $blcust6=number_format($rowcust6['acountBalance']);
        echo"<td>".$blcust6."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Member was registered in June ".$yr."</p></br>";  
			  }			
			 
			 
			   //getting monthly loans
			   echo"<p style='color:green;font-size:17pt'>Loans given out</p></br>";
			  $g6= mysqli_query($con,"select * from loan where MONTH(dateOfApproval )='06' and YEAR(dateOfApproval )='$yr'");
		      $numg6=mysqli_num_rows($g6);
     		  if($numg6>0){
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
	while($rowln6 = mysqli_fetch_array($g6)){
		echo"<tr>";
       echo"<td>".$rowln6['loanId']."</td>";
        echo"<td>".$rowln6['Name']."</td>";
        $m6= number_format($rowln6['approvedAmount']);
        echo"<td>".$m6."</td>";
        $pn6=number_format($rowln6['actualAmount']);
         echo"<td>".$pn6."</td>";
        echo"<td>".$rowln6['dateOfApproval']."</td>";
		echo"<td>".$rowln6['DueDate']."</td>";
        echo"<td>".$rowln6['status']."</td>";
         echo"<td>".$rowln6['loansOfficer']."</td>";
		 $mpt6= number_format($rowln6['monthlyInstalment']);
        echo"<td>".$mpt6."</td>";
        $blc6= number_format($rowln6['balance']);
        echo"<td>".$blc6."</td>";
        echo"<td>".$rowln6['period']."</td>";
		$fn6= number_format($rowln6['fine']);
		echo"<td>".$fn6."</td>";
        echo"<td>".$rowln6['AccountNo']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no loan was given out in June".$yr."</p></br>";  
			  }

			 
			  //getting monthly loanRepayment
			  echo"<p style='color:green;font-size:17pt'>Loan Repayment</p></br>";
			  $h6= mysqli_query($con,"select * from loanrepayment where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numh6=mysqli_num_rows($h6);
     		  if($numh6>0){
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
	while($rowrep6 = mysqli_fetch_array($h6)){
		echo"<tr>";
        echo"<td>".$rowrep6['repaymentId']."</td>";
        echo"<td>".$rowrep6['date']."</td>";
        echo"<td>".number_format($rowrep6['loanAmount'])."</td>";
        
        echo"<td>".number_format($rowrep6['principlePayment'])."</td>";
        echo"<td>".number_format($rowrep6['intrest'])."</td>";
        echo"<td>".number_format($rowrep6['fine'])."</td>";
        echo"<td>".number_format($rowrep6['totalPay'])."</td>";
        echo"<td>".number_format($rowrep6['balance'])."</td>";
        echo"<td>".$rowrep6['receivedBy']."</td>";
        echo"<td>".$rowrep6['paidBy']."</td>";
        echo"<td>".$rowrep6['AccountNo']."</td>";
        echo"<td>".$rowrep6['loanId']."</td>";
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Loan Repayment record for June ".$yr."</p></br>";  
			  }			
			 
		echo"<p style='font-size:25pt'>November</p></br>";
		//November report
		
		
		echo"<p style='color:green;font-size:17pt'>SAVINGS</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Deposit</p></br>";
			  //getting monthly deposits
			 $a6= mysqli_query($con,"select * from deposit where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numa6=mysqli_num_rows($a6);
			  if($numa6>0){
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
				while($rowd6 = mysqli_fetch_array($a6)){
		echo"<tr>";
        echo"<td>".$rowd6['depositId']."</td>";
        echo"<td>".$rowd['Name']."</td>";
        $m6= number_format($rowd6['depositAmount']);
        echo"<td>".$m6."</td>";
         echo"<td>".$rowd6['date']."</td>";
        echo"<td>".$rowd6['paidBy']."</td>";
        
       echo"<td>".$rowd6['tellerName']."</td>";
        
        $n6= number_format($rowd6['balance']);
        echo"<td>".$n6."</td>";
        echo"<td>".$rowd6['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Deposit record for June ".$yr."</p></br>";  
			  }
			  
			 
			 //getting monthly withdraws
			  echo"<p style='color:blue;font-size:16pt'>Withdrawals</p></br>";
			   $b6= mysqli_query($con,"select * from withdraw where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numb6=mysqli_num_rows($b6);
			  if($numb6>0){
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
				while($rowth6 = mysqli_fetch_array($b6)){
		echo"<tr>";
        echo"<td>".$rowth6['withdrawId']."</td>";
        echo"<td>".$rowth6['Name']."</td>";
        $mth6= number_format($rowth6['withdrawAmount']);
        echo"<td>".$mth6."</td>";
         echo"<td>".$rowth6['date']."</td>";
        echo"<td>".$rowth6['tellerName']."</td>";
        $nth6= number_format($rowth6['balance']);
        echo"<td>".$nth6."</td>";
		$mgth6= number_format($rowth6['mgtFees']);
        echo"<td>".$mgth6."</td>";
        echo"<td>".$rowth6['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Withdraw record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly expenses
			  echo"<p style='color:green;font-size:17pt'>INCOME STATEMENT</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Expenses</p></br>";
			  $c6= mysqli_query($con,"select * from expenses where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numc6=mysqli_num_rows($c6);
			  if($numc6>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>VoucherNo</td>";
    echo"<td>expenseType</td>";
    echo"<td>expenseAmount</td>";
    echo"<td>Date </td>";
             echo"<td>personResponsible</td>";
             echo"</tr>";
				while($rowxp6 = mysqli_fetch_array($c6)){
		echo"<tr>";
        echo"<td>".$rowxp6['VoucherNo']."</td>";
        echo"<td>".$rowxp6['expenseType']."</td>";
        $mxp6= number_format($rowxp6['expenseAmount']);
        echo"<td>".$mxp6."</td>";
         echo"<td>".$rowxp6['date']."</td>";
        echo"<td>".$rowxp6['personResponsible']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no expense record for June ".$yr."</p></br>";  
			  }
			  
			  
			  
			  //getting monthly income
			  echo"<p style='color:blue;font-size:16pt'>Income</p></br>";
			  $d6= mysqli_query($con,"select * from income where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numd6=mysqli_num_rows($d6);
			  if($numd6>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>incomeId</td>";
    echo"<td>receiptNo</td>";
    echo"<td>typeOfIncome</td>";
    echo"<td>receivedFrom </td>";
    echo"<td>incomeAmount</td>";
    echo"<td>Date</td>";
    echo"</tr>";
	while($rowinc6 = mysqli_fetch_array($d6)){
		echo"<tr>";
        echo"<td>".$rowinc6['incomeId']."</td>";
        echo"<td>".$rowinc6['receiptNo']."</td>";
        $minc6= number_format($rowinc6['incomeAmount']);
        echo"<td>".$rowinc6['typeOfIncome']."</td>";
        echo"<td>".$rowinc6['receivedFrom']."</td>";
		echo"<td>".$minc6."</td>";
		echo"<td>".$rowinc6['date']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Income record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly shares
			  echo"<p style='color:green;font-size:17pt'>Shares</p></br>";
			  $e6= mysqli_query($con,"select * from share where MONTH(date)='06' and YEAR(date)='$yr'");
		      $nume6=mysqli_num_rows($e6);
			  if($nume6>0){
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
	while($rowsh6 = mysqli_fetch_array($e6)){
		echo"<tr>";
        echo"<td>".$rowsh6['shareID']."</td>";
        echo"<td>".number_format($rowsh6['amountPaid'])."</td>";
        $msh6= number_format($rowsh6['totalAmount']);
        echo"<td>".$msh6."</td>";
        echo"<td>".number_format($rowsh6['numberOfShares'])."</td>";
		echo"<td>".number_format($rowsh6['totalnumberOfShares'])."</td>";
		echo"<td>".$rowsh6['AccountNo']."</td>";
		echo"<td>".$rowsh6['date']."</td>";
		echo"<td>".$rowsh6['teller']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
		echo"<p style='color:red;font-size:15pt'>no Share record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting customers registered in a specific month
			  echo"<p style='color:green;font-size:17pt'>Members Registered</p></br>";
			   $f6= mysqli_query($con,"select * from customer where MONTH(custSince)='06' and YEAR(custSince)='$yr'");
            $numf6=mysqli_num_rows($f6);
     		  if($numf6>0){
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
	while($rowcust6 = mysqli_fetch_array($f6)){
		echo"<tr>";
        echo"<td>".$rowcust6['AccountNo']."</td>";
        echo"<td>".$rowcust6['Name']."</td>";
        echo"<td>".$rowcust6['custDob']."</td>";
        
        echo"<td>".$rowcust6['custsexId']."</td>";
        echo"<td>".$rowcust6['custAddress']."</td>";
        echo"<td>".$rowcust6['custPhone']."</td>";
        echo"<td>".$rowcust6['custEmail']."</td>";
        echo"<td>".$rowcust6['custOccup']."</td>";
        echo"<td>".$rowcust6['custmarriedId']."</td>";
        echo"<td>".$rowcust6['custHeir']."</td>";
        echo"<td>".$rowcust6['custHeirrel']."</td>";
        echo"<td>".$rowcust6['placeOfBirth']."</td>";
        echo"<td>".$rowcust6['village']."</td>";
        echo"<td>".$rowcust6['parish']."</td>";
        echo"<td>".$rowcust6['subcounty']."</td>";
        echo"<td>".$rowcust6['district']."</td>";
        echo"<td>".$rowcust6['custSince']."</td>";
        $blcust6=number_format($rowcust6['acountBalance']);
        echo"<td>".$blcust6."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Member was registered in June ".$yr."</p></br>";  
			  }			
			 
			 
			   //getting monthly loans
			   echo"<p style='color:green;font-size:17pt'>Loans given out</p></br>";
			  $g6= mysqli_query($con,"select * from loan where MONTH(dateOfApproval )='06' and YEAR(dateOfApproval )='$yr'");
		      $numg6=mysqli_num_rows($g6);
     		  if($numg6>0){
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
	while($rowln6 = mysqli_fetch_array($g6)){
		echo"<tr>";
       echo"<td>".$rowln6['loanId']."</td>";
        echo"<td>".$rowln6['Name']."</td>";
        $m6= number_format($rowln6['approvedAmount']);
        echo"<td>".$m6."</td>";
        $pn6=number_format($rowln6['actualAmount']);
         echo"<td>".$pn6."</td>";
        echo"<td>".$rowln6['dateOfApproval']."</td>";
		echo"<td>".$rowln6['DueDate']."</td>";
        echo"<td>".$rowln6['status']."</td>";
         echo"<td>".$rowln6['loansOfficer']."</td>";
		 $mpt6= number_format($rowln6['monthlyInstalment']);
        echo"<td>".$mpt6."</td>";
        $blc6= number_format($rowln6['balance']);
        echo"<td>".$blc6."</td>";
        echo"<td>".$rowln6['period']."</td>";
		$fn6= number_format($rowln6['fine']);
		echo"<td>".$fn6."</td>";
        echo"<td>".$rowln6['AccountNo']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no loan was given out in June".$yr."</p></br>";  
			  }

			 
			  //getting monthly loanRepayment
			  echo"<p style='color:green;font-size:17pt'>Loan Repayment</p></br>";
			  $h6= mysqli_query($con,"select * from loanrepayment where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numh6=mysqli_num_rows($h6);
     		  if($numh6>0){
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
	while($rowrep6 = mysqli_fetch_array($h6)){
		echo"<tr>";
        echo"<td>".$rowrep6['repaymentId']."</td>";
        echo"<td>".$rowrep6['date']."</td>";
        echo"<td>".number_format($rowrep6['loanAmount'])."</td>";
        
        echo"<td>".number_format($rowrep6['principlePayment'])."</td>";
        echo"<td>".number_format($rowrep6['intrest'])."</td>";
        echo"<td>".number_format($rowrep6['fine'])."</td>";
        echo"<td>".number_format($rowrep6['totalPay'])."</td>";
        echo"<td>".number_format($rowrep6['balance'])."</td>";
        echo"<td>".$rowrep6['receivedBy']."</td>";
        echo"<td>".$rowrep6['paidBy']."</td>";
        echo"<td>".$rowrep6['AccountNo']."</td>";
        echo"<td>".$rowrep6['loanId']."</td>";
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Loan Repayment record for June ".$yr."</p></br>";  
			  }			
			 
		echo"<p style='font-size:25pt'>December</p></br>";
		//December report
		
		echo"<p style='color:green;font-size:17pt'>SAVINGS</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Deposit</p></br>";
			  //getting monthly deposits
			 $a6= mysqli_query($con,"select * from deposit where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numa6=mysqli_num_rows($a6);
			  if($numa6>0){
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
				while($rowd6 = mysqli_fetch_array($a6)){
		echo"<tr>";
        echo"<td>".$rowd6['depositId']."</td>";
        echo"<td>".$rowd['Name']."</td>";
        $m6= number_format($rowd6['depositAmount']);
        echo"<td>".$m6."</td>";
         echo"<td>".$rowd6['date']."</td>";
        echo"<td>".$rowd6['paidBy']."</td>";
        
       echo"<td>".$rowd6['tellerName']."</td>";
        
        $n6= number_format($rowd6['balance']);
        echo"<td>".$n6."</td>";
        echo"<td>".$rowd6['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Deposit record for June ".$yr."</p></br>";  
			  }
			  
			 
			 //getting monthly withdraws
			  echo"<p style='color:blue;font-size:16pt'>Withdrawals</p></br>";
			   $b6= mysqli_query($con,"select * from withdraw where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numb6=mysqli_num_rows($b6);
			  if($numb6>0){
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
				while($rowth6 = mysqli_fetch_array($b6)){
		echo"<tr>";
        echo"<td>".$rowth6['withdrawId']."</td>";
        echo"<td>".$rowth6['Name']."</td>";
        $mth6= number_format($rowth6['withdrawAmount']);
        echo"<td>".$mth6."</td>";
         echo"<td>".$rowth6['date']."</td>";
        echo"<td>".$rowth6['tellerName']."</td>";
        $nth6= number_format($rowth6['balance']);
        echo"<td>".$nth6."</td>";
		$mgth6= number_format($rowth6['mgtFees']);
        echo"<td>".$mgth6."</td>";
        echo"<td>".$rowth6['AccountNo']."</td>";
        
       
       
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Withdraw record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly expenses
			  echo"<p style='color:green;font-size:17pt'>INCOME STATEMENT</p></br>";
			  echo"<p style='color:blue;font-size:16pt'>Expenses</p></br>";
			  $c6= mysqli_query($con,"select * from expenses where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numc6=mysqli_num_rows($c6);
			  if($numc6>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>VoucherNo</td>";
    echo"<td>expenseType</td>";
    echo"<td>expenseAmount</td>";
    echo"<td>Date </td>";
             echo"<td>personResponsible</td>";
             echo"</tr>";
				while($rowxp6 = mysqli_fetch_array($c6)){
		echo"<tr>";
        echo"<td>".$rowxp6['VoucherNo']."</td>";
        echo"<td>".$rowxp6['expenseType']."</td>";
        $mxp6= number_format($rowxp6['expenseAmount']);
        echo"<td>".$mxp6."</td>";
         echo"<td>".$rowxp6['date']."</td>";
        echo"<td>".$rowxp6['personResponsible']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no expense record for June ".$yr."</p></br>";  
			  }
			  
			  
			  
			  //getting monthly income
			  echo"<p style='color:blue;font-size:16pt'>Income</p></br>";
			  $d6= mysqli_query($con,"select * from income where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numd6=mysqli_num_rows($d6);
			  if($numd6>0){
    echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>incomeId</td>";
    echo"<td>receiptNo</td>";
    echo"<td>typeOfIncome</td>";
    echo"<td>receivedFrom </td>";
    echo"<td>incomeAmount</td>";
    echo"<td>Date</td>";
    echo"</tr>";
	while($rowinc6 = mysqli_fetch_array($d6)){
		echo"<tr>";
        echo"<td>".$rowinc6['incomeId']."</td>";
        echo"<td>".$rowinc6['receiptNo']."</td>";
        $minc6= number_format($rowinc6['incomeAmount']);
        echo"<td>".$rowinc6['typeOfIncome']."</td>";
        echo"<td>".$rowinc6['receivedFrom']."</td>";
		echo"<td>".$minc6."</td>";
		echo"<td>".$rowinc6['date']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no Income record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting monthly shares
			  echo"<p style='color:green;font-size:17pt'>Shares</p></br>";
			  $e6= mysqli_query($con,"select * from share where MONTH(date)='06' and YEAR(date)='$yr'");
		      $nume6=mysqli_num_rows($e6);
			  if($nume6>0){
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
	while($rowsh6 = mysqli_fetch_array($e6)){
		echo"<tr>";
        echo"<td>".$rowsh6['shareID']."</td>";
        echo"<td>".number_format($rowsh6['amountPaid'])."</td>";
        $msh6= number_format($rowsh6['totalAmount']);
        echo"<td>".$msh6."</td>";
        echo"<td>".number_format($rowsh6['numberOfShares'])."</td>";
		echo"<td>".number_format($rowsh6['totalnumberOfShares'])."</td>";
		echo"<td>".$rowsh6['AccountNo']."</td>";
		echo"<td>".$rowsh6['date']."</td>";
		echo"<td>".$rowsh6['teller']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
		echo"<p style='color:red;font-size:15pt'>no Share record for June ".$yr."</p></br>";  
			  }
			  
			  
			  //getting customers registered in a specific month
			  echo"<p style='color:green;font-size:17pt'>Members Registered</p></br>";
			   $f6= mysqli_query($con,"select * from customer where MONTH(custSince)='06' and YEAR(custSince)='$yr'");
            $numf6=mysqli_num_rows($f6);
     		  if($numf6>0){
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
	while($rowcust6 = mysqli_fetch_array($f6)){
		echo"<tr>";
        echo"<td>".$rowcust6['AccountNo']."</td>";
        echo"<td>".$rowcust6['Name']."</td>";
        echo"<td>".$rowcust6['custDob']."</td>";
        
        echo"<td>".$rowcust6['custsexId']."</td>";
        echo"<td>".$rowcust6['custAddress']."</td>";
        echo"<td>".$rowcust6['custPhone']."</td>";
        echo"<td>".$rowcust6['custEmail']."</td>";
        echo"<td>".$rowcust6['custOccup']."</td>";
        echo"<td>".$rowcust6['custmarriedId']."</td>";
        echo"<td>".$rowcust6['custHeir']."</td>";
        echo"<td>".$rowcust6['custHeirrel']."</td>";
        echo"<td>".$rowcust6['placeOfBirth']."</td>";
        echo"<td>".$rowcust6['village']."</td>";
        echo"<td>".$rowcust6['parish']."</td>";
        echo"<td>".$rowcust6['subcounty']."</td>";
        echo"<td>".$rowcust6['district']."</td>";
        echo"<td>".$rowcust6['custSince']."</td>";
        $blcust6=number_format($rowcust6['acountBalance']);
        echo"<td>".$blcust6."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Member was registered in June ".$yr."</p></br>";  
			  }			
			 
			 
			   //getting monthly loans
			   echo"<p style='color:green;font-size:17pt'>Loans given out</p></br>";
			  $g6= mysqli_query($con,"select * from loan where MONTH(dateOfApproval )='06' and YEAR(dateOfApproval )='$yr'");
		      $numg6=mysqli_num_rows($g6);
     		  if($numg6>0){
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
	while($rowln6 = mysqli_fetch_array($g6)){
		echo"<tr>";
       echo"<td>".$rowln6['loanId']."</td>";
        echo"<td>".$rowln6['Name']."</td>";
        $m6= number_format($rowln6['approvedAmount']);
        echo"<td>".$m6."</td>";
        $pn6=number_format($rowln6['actualAmount']);
         echo"<td>".$pn6."</td>";
        echo"<td>".$rowln6['dateOfApproval']."</td>";
		echo"<td>".$rowln6['DueDate']."</td>";
        echo"<td>".$rowln6['status']."</td>";
         echo"<td>".$rowln6['loansOfficer']."</td>";
		 $mpt6= number_format($rowln6['monthlyInstalment']);
        echo"<td>".$mpt6."</td>";
        $blc6= number_format($rowln6['balance']);
        echo"<td>".$blc6."</td>";
        echo"<td>".$rowln6['period']."</td>";
		$fn6= number_format($rowln6['fine']);
		echo"<td>".$fn6."</td>";
        echo"<td>".$rowln6['AccountNo']."</td>";
         echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
				echo"<p style='color:red;font-size:15pt'>no loan was given out in June".$yr."</p></br>";  
			  }

			 
			  //getting monthly loanRepayment
			  echo"<p style='color:green;font-size:17pt'>Loan Repayment</p></br>";
			  $h6= mysqli_query($con,"select * from loanrepayment where MONTH(date)='06' and YEAR(date)='$yr'");
		      $numh6=mysqli_num_rows($h6);
     		  if($numh6>0){
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
	while($rowrep6 = mysqli_fetch_array($h6)){
		echo"<tr>";
        echo"<td>".$rowrep6['repaymentId']."</td>";
        echo"<td>".$rowrep6['date']."</td>";
        echo"<td>".number_format($rowrep6['loanAmount'])."</td>";
        
        echo"<td>".number_format($rowrep6['principlePayment'])."</td>";
        echo"<td>".number_format($rowrep6['intrest'])."</td>";
        echo"<td>".number_format($rowrep6['fine'])."</td>";
        echo"<td>".number_format($rowrep6['totalPay'])."</td>";
        echo"<td>".number_format($rowrep6['balance'])."</td>";
        echo"<td>".$rowrep6['receivedBy']."</td>";
        echo"<td>".$rowrep6['paidBy']."</td>";
        echo"<td>".$rowrep6['AccountNo']."</td>";
        echo"<td>".$rowrep6['loanId']."</td>";
        echo"</tr>";	
				}
echo"</table></br>";				
			  }
			  else{
echo"<p style='color:red;font-size:15pt'>no Loan Repayment record for June ".$yr."</p></br>";  
			  }			
			 
		
		echo"<p style='color:blue;font-size:20pt'>END OF ANNUAL REPORT</p>";
		}
			
			?>
		</div>
		</center>
		</body>
</html>