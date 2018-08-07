<?PHP
	require 'function.php';
	?>
<!DOCTYPE html>
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
		<div id="menu_main" style="margin-left:0.2in;margin-right:1.3in">
			<a href="loan_search.php" id="item_selected">Search</a>
			<a href="loanAct.php">Active and cleared Loans</a>
			<a href="loanApply.php">Loan Application</a>
            <a href="giveLoan.php">Approve/Deny Loans</a>
            <a href="repay.php">Loan Repayment</a>
			<a href="loanEdit.php">Edit</a>
			<a href="loanDel.php">Delete</a>
			
		</div>
		<!-- Left Side of Dashboard -->
		<div class="content_left" style="width:100%;">
			<?php
        include_once('function.php');
        if(isset($_POST['lsearc'])){
        #<!-- MENU -->
		 $ln=$_POST['loan_no'];
        $sl="SELECT * from loan WHERE loanId='$ln' ";
        $qrr=mysqli_query($con,$sl);
		
		
           $rw=mysqli_num_rows($qrr);
        if($rw>0)
            {
            echo"<center>";
             echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr>";
    echo"<td colspan='13'style='background-color:black;color:white'><center><h1>Loans</h1></center></td>";
    echo"</tr>";        
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
    while($row=mysqli_fetch_array($qrr))
    {
        echo"<tr>";
               echo"<td>".$row['loanId']."</td>";
        echo"<td>".$row['Name']."</td>";
        $m= number_format($row['approvedAmount']);
        echo"<td>".$m."</td>";
        $pn=number_format($row['actualAmount']);
         echo"<td>".$pn."</td>";
        echo"<td>".$row['dateOfApproval']."</td>";
		echo"<td>".$row['DueDate']."</td>";
        echo"<td>".$row['status']."</td>";
         echo"<td>".$row['loansOfficer']."</td>";
		 $mpt= number_format($row['monthlyInstalment']);
        echo"<td>".$mpt."</td>";
        $blc= number_format($row['balance']);
        echo"<td>".$blc."</td>";
        echo"<td>".$row['period']."</td>";
		$fn= number_format($row['fine']);
		echo"<td>".$fn."</td>";
        echo"<td>".$row['AccountNo']."</td>";
        echo"</tr>";
    }

	echo"<tr>";
echo"<td colspan='13'style='background-color:black;color:white'><center>THE END OF LIST</center></td>";
	echo"</tr>";
    echo"</table>";
                
            }
              else
     {
         echo"<p style='font-size:18pt;color:blue'> No Loan record found. please try again by entering in a correct search key.</p>";
     }
        }
#process for detailed loan search by status
            
 if(isset($_POST['statu'])){
	$lnstt=$_POST['loon'];
    
     $sl="SELECT * from loan WHERE Name='$lnstt' ";
        $qrr=mysqli_query($con,$sl);
    
           $rw=mysqli_num_rows($qrr);
     
        if($rw>0)
            {
            echo"<center>";
             echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr>";
    echo"<td colspan='13'style='background-color:black;color:white'><center><h1>Loans</h1></center></td>";
    echo"</tr>";        
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
    while($row=mysqli_fetch_array($qrr))
    {
        echo"<tr>";
               echo"<td>".$row['loanId']."</td>";
        echo"<td>".$row['Name']."</td>";
        $m= number_format($row['approvedAmount']);
        echo"<td>".$m."</td>";
        $pn=number_format($row['actualAmount']);
         echo"<td>".$pn."</td>";
        echo"<td>".$row['dateOfApproval']."</td>";
		echo"<td>".$row['DueDate']."</td>";
        echo"<td>".$row['status']."</td>";
         echo"<td>".$row['loansOfficer']."</td>";
		 $mpt= number_format($row['monthlyInstalment']);
        echo"<td>".$mpt."</td>";
        $blc= number_format($row['balance']);
        echo"<td>".$blc."</td>";
        echo"<td>".$row['period']."</td>";
		$fn= number_format($row['fine']);
		echo"<td>".$fn."</td>";
        echo"<td>".$row['AccountNo']."</td>";
        echo"</tr>";
    }

	echo"<tr>";
echo"<td colspan='13'style='background-color:black;color:white'><center>THE END OF LIST</center></td>";
	echo"</tr>";
    echo"</table>";
                
            }
              else
     {
         echo"<p style='font-size:18pt;color:blue'> No Loan record found. please try again by entering in a correct search key.</p>";
     }  
    
     
}
            
            
            ?>
            </div>