<!DOCTYPE HTML>
<?PHP
	require 'function.php';
	?>

<html>
	<!-- HTML HEAD -->
	<?PHP includeHead('Microfinance Management',0); ?>
		<link rel="stylesheet" href="css/stats.css" />
	</head>
	<!-- HTML BODY -->
	<body>
		<!-- MENU -->
		<?PHP 
				includeMenu(3);
		?>
      
		<!-- MENU MAIN -->
		<div id="menu_main" style="margin-left:0.2in;margin-right:1.2in">
			<a href="loan_search.php" id="item_selected">Search</a>
			<a href="loanAct.php">Active and cleared Loans</a>
			<a href="loanApply.php">Loan Application</a>
            <a href="giveLoan.php">Approve/Deny Loans</a>
            <a href="repay.php">Loan Repayment</a>
			<a href="loanEdit.php">Edit</a>
			<a href="loanDel.php">Delete</a>
			<a href="fine.php">Compute Fine</a>
		</div>
    <div>
	<center>
        <form action="giveLoan.php" method="post">
        <center><p style="color:green;font-size:20pt">Approve a Loan</p></center><br><br/>
        <table>
            <tr>
                <td>AppId</td><td><input type="text" name="appId" placeholder="AppId" required></td>
              
			  </tr>
			  <tr> 
			   <td>AccountNo</td><td><input type="text" name="custonum" placeholder="AccountNo" required  ></td>
            </tr>
            <tr> 
			   <td>ApprovedAmount</td><td><input type="number" name="apprAmount" placeholder="AccountNo" required  ></td>
            </tr>
			<tr> 
			   <td>Date</td><td><input type="date" name="apprdate"  required  ></td>
            </tr>
			<tr> 
			   <td>LoansOfficer</td><td><input type="text" name="off" placeholder="LoansOfficer" required  ></td>
            </tr>
            <tr>
                <td colspan="4"><center>
                   
                    <input type="submit" name="apprloan" value="APPROVE" style="background:#037881"></center></td>
            </tr>
            
        </table>

        </form>
		<center>
        </div>
		<div>
	<center>
        <form action="giveLoan.php" method="post">
        <center><p style="color:green;font-size:20pt">Deny a Loan</p></center><br><br/>
        <table>
            <tr>
                <td>AppId</td><td><input type="text" name="appId" placeholder="AppId" required></td>
              
			  </tr>
			  <tr> 
			   <td>AccountNo</td><td><input type="text" name="custonum" placeholder="AccountNo" required  ></td>
            </tr>
            
            <tr>
                <td colspan="4"><center>
                   
                    <input type="submit" name="dnyloan" value="DENY" style="background:#037881"></center></td>
            </tr>
            
        </table>

        </form>
		<center>
        </div>
		<div>
		<?php
        require_once'function.php';
	   //denying a loan
	   if(isset($_POST['dnyloan'])){
	   $appId=$_POST['appId'];
	   $custonum=$_POST['custonum'];
	  $a=mysqli_query($con,"update loanApplication set status='Denied' where AppId=$appId and AccountNo=$custonum");
	   if($a){
	    echo"<center style='color:red;font-size:20pt'>The loan Applied by AccountNo. ".$custonum." has been Denied.</center>";
	   }
	   }
	   //Approving a loan
	   if(isset($_POST['apprloan'])){
	   $appId=$_POST['appId'];
	   $custonum=$_POST['custonum'];
	   $apprAmount=$_POST['apprAmount'];
	   $apprdate=$_POST['apprdate'];
	   $off=$_POST['off'];
	   $f=0;
	   //getting the name of the customer
	   $sl="SELECT * from customer where AccountNo=$custonum";
        $qrr=mysqli_query($con,$sl);
           $rw=mysqli_num_rows($qrr);
		   $row=mysqli_fetch_array($qrr);
        if($rw>0)
            {
			$name=$row['Name'];	
			//calculating actual approved Amount
			$commFees=((3/100)*$apprAmount);
			$loanStationary=5000;
			$actualAmount=($apprAmount-($commFees+$loanStationary));
			$date=date_create($apprdate);
        date_add($date,date_interval_create_from_date_string("30 days"));
        $dueDate= date_format($date,"Y-m-d");
		//calculating monthlyInstalment
		$period=10;
		$monthlyInstalment=(($apprAmount/$period)+($apprAmount*(4/100)));
		//updating the status of loanApplication
		mysqli_query($con,"update loanApplication set status='Approved' where AppId=$appId");
		//inserting details in the loan Table
		$bc=mysqli_query($con,"insert into loan(Name,approvedAmount,actualAmount,dateOfApproval,
		DueDate,status,loansOfficer,monthlyInstalment,balance,period,fine,AccountNo) values
		('$name','$apprAmount','$actualAmount','$apprdate','$dueDate','Active','$off',
		'$monthlyInstalment','$apprAmount','$period','$f','$custonum')");
		if($bc){
		mysqli_query($con,"insert into income(typeOfIncome,receivedFrom,incomeAmount,date)
		values('Loan commitment Fees','$name','$commFees','$apprdate')");
		mysqli_query($con,"insert into income(typeOfIncome,receivedFrom,incomeAmount,date)
		values('Loan stationary','$name','$loanStationary','$apprdate')");
		echo"<center style='color:green;font-size:20pt'>the loan for ".$name." is now approved</center>";
		}
		else{
		echo"<center style='color:red;font-size:20pt'>Failed to save the loan details.</center>";
		}
			}
			else{
			 echo"<center style='color:red;font-size:20pt'>Invalid AccountNo! You need to first register the customer</center>";
			}
	   }
	 $sl="SELECT * from loanApplication";
        $qrr=mysqli_query($con,$sl);
           $rw=mysqli_num_rows($qrr);
        if($rw>0)
            {
            echo"<center>";
            echo"<p style='color:blue;font-size:20pt'>List of Loan Applications to be approved or denied</p>";
             echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr>";
    echo"<td colspan='11'style='background-color:black;color:white'><center><h1>Loan Applications </h1></center></td>";
    echo"</tr>";        
    echo"<tr style= 'background-color:orange'>";
    echo"<td>AppId</td>";
    echo"<td>Amount applied For</td>";
    echo"<td>security1</td>";
    echo"<td>security2 </td>";
             echo"<td>guarantor1 </td>";
             echo"<td>guarantor2</td>";
             echo"<td>spouse</td>";
            echo"<td>date</td>";
			echo"<td>loansOfficer</td>";
			echo"<td>status</td>";
			echo"<td>AccountNo</td>";
              echo"</tr>";
    while($row=mysqli_fetch_array($qrr))
    {
        echo"<tr>";
        echo"<td>".$row['AppId']."</td>";
        $m= number_format($row['amount']);
        echo"<td>".$m."</td>";
        echo"<td>".$row['security1']."</td>";
      
        echo"<td>".$row['security2']."</td>";
        echo"<td>".$row['guarantor1']."</td>";
        
       echo"<td>".$row['guarantor2']."</td>";
        ;
        
        echo"<td>".$row['spouse']."</td>";
        echo"<td>".$row['date']."</td>";
        echo"<td>".$row['loansOfficer']."</td>";
		echo"<td>".$row['status']."</td>";
		echo"<td>".$row['AccountNo']."</td>";
       
       
        echo"</tr>";
    }
 echo"<tr>";
    echo"<td colspan='11'style='background-color:black;color:white'><center><h1>END OF THE LIST </h1></center></td>";
    echo"</tr>";
	
    echo"</table>";
                
            }
              else
     {
         echo"<p style='color:blue;font-size:20pt'> No loanApplication is Available.</p>";
    }
   
	  
        
       
?>
        
       
        
    
		
		</div>
        </body>
		</html>
      