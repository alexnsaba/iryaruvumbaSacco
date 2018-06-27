<?php
require 'function.php';
if(isset($_POST['deposit'])){
    $custName=$_POST['scustoname'];
    $depAmount=$_POST['sdepamt'];
    $date=$_POST['sdate'];
    $paidBy=$_POST['skin'];
    $teller=$_POST['steller'];
    $custNum=$_POST['scustonum'];
     if($_POST['sfees']=="YES"){
      $depAmount= $depAmount-1000;
    }
    $a=mysqli_query($con,"select * from customer where custNo = $custNum ");
	$wnmr=mysqli_num_rows($a);
   if($wnmr==1){
    $row=mysqli_fetch_array($a);
    $balance = $row['acountBalance']+$depAmount;
   
   
   $s= mysqli_query($con,"INSERT INTO deposit(customerName,depositAmount,date,paidBy,tellerName,balance,CustNo) VALUES('$custName',
    '$depAmount','$date','$paidBy','$teller','$balance','$custNum') ");
    if($s){
        $mn=mysqli_query($con,"UPDATE customer SET acountBalance = '$balance' WHERE custNo = '$custNum ' ");
        
            
        header("refresh:3,url=depWith.php");
        echo"<h1>UGX".$depAmount." is deposited successfully</h1> ";
    }
    else {
         header("refresh:3,url=depWith.php");
        echo"deposit failed, please try again.";
    }
	}
	else{
	echo"<h1>Invalid CustNo. Please you need to first register the customer.</h1> ";
	}
}



//withdraw processing
if(isset($_POST['withdraw'])){
   $wcustoname=$_POST['wcustoname'];
    $wcustonum=$_POST['wcustonum'];
    $withamt=$_POST['withamt'];
    $wdate=$_POST['wdate'];
    $wteller=$_POST['wteller'];
    $a=mysqli_query($con,"select * from customer where custNo = $wcustonum ");
   $wnmr=mysqli_num_rows($a);
   if($wnmr==1){
    $row=mysqli_fetch_array($a);
    //condition structure to determine charge
    if($withamt<=99000){
        $charge=500;
    }
    else if($withamt>99000){
        $charge=1000;
    }
     $balance = $row['acountBalance']-($withamt +$charge);
    //processing the minimum balance condition.
    if($balance >= 5000){
         $s= mysqli_query($con,"INSERT INTO withdraw(customerName,withdrawAmount,date,tellerName,balance,mgtFees,CustNo) VALUES('$wcustoname', '$withamt','$wdate','$wteller','$balance','$charge','$wcustonum') ");
    if($s){
        $mn=mysqli_query($con,"UPDATE customer SET acountBalance = '$balance' WHERE custNo = '$wcustonum ' ");
        
            
        header("refresh:3,url=depWith.php");
        echo"<h1>UGX".$withamt." has been withrawn successfully. you can give the money to the client.</h1> ";
    }
    else {
         header("refresh:3,url=depWith.php");
        echo"deposit failed, please try again.";
    }
        
        
    }
     else {
         header("refresh:3,url=depWith.php");
        echo"<h1> you have insufficient Funds to process this withdraw</>";
    }
	}
	else{
	echo"<h1>Invalid CustNo. Please you need to first register the customer.</h1> ";
	}
}

?>
