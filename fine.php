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
			<a href="fine.php">Compute Fine</a>
		</div>
		<div>
 <?php
 include_once'function.php';
 // calculating fine due to delay to clear monthly installments
$currentDate=date('Y-m-d');
$sfn=mysqli_query($con,"SELECT * FROM loan where balance >0 ");
while($rwr=mysqli_fetch_array($sfn)){
$lid=$rwr['loanId'];
$startf=date_create($rwr['DueDate']);
$endf=date_create($currentDate);
            $diff=date_diff($startf,$endf);
             $d=$diff->d;
            $m=$diff->m;
            $days=$m*30;
            $c=$d+$days;
			 if($c <=0){
			 if($rwr['period']>=2){
			 $nperiod=$rwr['period']-1;
			 }
			 if($rwr['monthlyInstalment']>0){
			 $fine= ((5/100)*($rwr['monthlyInstalment']))+$rwr['fine'];
			 $nextMonthly=$rwr['balance']/$nperiod;
			 $newMonthlyInstalment=$rwr['monthlyInstalment']+$fine+$nextMonthly;
			 mysqli_query($con,"update loan set monthlyInstalment='$newMonthlyInstalment',fine='$fine' where loanId ='$lid'");
			 //updating the next due date
		$det=date_create($rwr['DueDate']);
        date_add($det,date_interval_create_from_date_string("30 days"));
        $dfi= date_format($det,"Y-m-d");
		mysqli_query($con,"update loan set DueDate='$dfi' where loanId ='$lid'");
			  //updating period
		mysqli_query($con,"update loan set period='$nperiod' where loanId ='$lid'");
		//taking the fine to income table
		$lnm=$rwr['Name'];
		$dtt=$rwr['DueDate'];
        mysqli_query($con,"insert into income(typeOfIncome,receivedFrom,incomeAmount,date) values('Fine','$lnm','$fine','$dtt')");		
			}
			
			 else{
				 
			 $fine=0;
			 $nextMonthly=$rwr['balance']/$nperiod;
			 $newMonthlyInstalment=$rwr['monthlyInstalment']+$fine+$nextMonthly;
			 mysqli_query($con,"update loan set monthlyInstalment='$newMonthlyInstalment' where loanId ='$lid' ");
			 //updating the next due date
		$det=date_create($rwr['DueDate']);
        date_add($det,date_interval_create_from_date_string("30 days"));
        $dfi= date_format($det,"Y-m-d");
		mysqli_query($con,"update loan set DueDate='$dfi' where loanId ='$lid'");
			  //updating period
		$a=mysqli_query($con,"update loan set period='$nperiod' where loanId ='$lid'");
			}
			}
		}
		echo"<p style='color:blue;font-size:23pt'>Fine has been Applied to Uncleared Loans whose DueDate  is ".$currentDate."</p>";
 ?>
 </div>
	</body>
</html>