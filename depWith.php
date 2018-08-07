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
				includeMenu(6);
		?>
      
		<!-- MENU MAIN -->

		<div id="menu_main" style="margin-left:1.5in;margin-right:1.95in">
          <a href="depWith.php" id="item_selected">Deposit or withdraw</a>
			<a href="transactionSearch.php">Search transactions</a>
			<a href="ministatement.php">Statement Of Account</a>
			<a href="dwEdit.php">Edit</a>
			<a href="dwDel.php">Delete</a>
		</div>
            
		</div>
        <form method="post" action="depWith.php">
    <div class="content_left" style="width:50%; padding-right:5em; ">
        <p><strong><span style="font-size:18pt">Enter the Deposit information bellow.</span></strong></p>
        <table id="tb_fields" style="margin-left:1in">
            <tr>
                <td> Account Number</td><td><input type="number" name="scustonum" required  >
				
                
			</tr>
			<tr>
                <td>Customer Name</td>
				<td>
				<?php
				include_once'function.php';
				$a=mysqli_query($con,"select * from customer");
				echo"<select name='scustoname' required>";
				
				while($row=mysqli_fetch_array($a)){
				echo"<option>".$row['Name']."</option>";
				}
				echo"</select>";
				?>
				</td>
                </tr>
            
             <tr>
                <td>Deposit Amount</td><td><input type="number" name="sdepamt" required ></td>
                 </tr>
            <tr>
                <td>  Date</td><td><input type="date" name="sdate" required ></td>
            </tr>
             <tr>
                <td>Teller</td>
				<td>
				<?php
				echo"<select name='steller' value='steller' required>";
				require_once 'function.php';
				$rem=mysqli_query($con,"select * from employee");
				while($remp=mysqli_fetch_array($rem)){
				echo"<option>".$remp['name']."</option>";
				}
				echo"</select>";
				?>
				</td>
                 </tr>
            <tr>
                <td>Paid By</td><td><input type="text" name="skin" placeholder="who has brought money" required></td>
            </tr>
             <tr>
                 <td>School Fees</td><td><select name="sfees" value="sfees" required><option selected>NO</option>
                 <option>YES</option></select></td>
            </tr>
            
            <tr>
                <td colspan="4"><center>
                   
                    <input type="submit" name="deposit" value="SAVE" style="background:#037881"></center></td>
            </tr>
            
        </table>
		</div>
            </form>
           
		
		<!-- RIGHT SIDE: Login Form -->
        <form method="post" action="depWith.php">
		<div class="content_right" style="width:50%; padding-left:5em;"><br/>
			<p><strong><span style="font-size:18pt">Enter the withdrawal information bellow.</span></strong></p>
        <table id="tb_fields" style="margin-left:1in">
         <tr>
                <td> Account Number</td><td><input type="number" name="wcustonum" required ></td>
            </tr>           
		   <tr>
                <td>Customer Name</td><td>
				<?php
				include_once'function.php';
				$a=mysqli_query($con,"select * from customer");
				echo"<select name='wcustoname' required>";
				
				while($row=mysqli_fetch_array($a)){
				echo"<option>".$row['Name']."</option>";
				}
				echo"</select>";
				?>
				</td>
                </tr>
            
             <tr>
                <td>Withdraw Amount</td><td><input type="number" name="withamt" required></td>
                 </tr>
            <tr>
                <td>  Date</td><td><input type="date" name="wdate" required></td>
            </tr>
             <tr>
                <td>Teller</td>
				<td>
				<?php
				echo"<select name='wteller' value='wteller' required>";
				require_once 'function.php';
				$rem=mysqli_query($con,"select * from employee");
				while($remp=mysqli_fetch_array($rem)){
				echo"<option>".$remp['name']."</option>";
				}
				echo"</select>";
				?>
				</td>
                 </tr>
            
            
            <tr>
                <td colspan="4"><center>
                   
                    <input type="submit" name="withdraw" value="SAVE" style="background:#037881"></center></td>
            </tr>
            
        </table>
           
			
			
		</div>
        </form>
		<div>
		<?php
require_once 'function.php';
if(isset($_POST['deposit'])){
    $custName=$_POST['scustoname'];
    $depAmount=$_POST['sdepamt'];
    $date=$_POST['sdate'];
    $paidBy=$_POST['skin'];
    $teller=$_POST['steller'];
    $custNum=$_POST['scustonum'];
     if($_POST['sfees']=="YES"){
      $depAmount= $depAmount-1000;
	  mysqli_query($con,"INSERT INTO income(typeOfIncome,receivedFrom,incomeAmount,date) VALUES('Mgt Fees',
    '$custName',1000,'$date')");
    }
    $a=mysqli_query($con,"select * from customer where AccountNo  = $custNum and Name='$custName'");
	$wnmr=mysqli_num_rows($a);
   if($wnmr==1){
    $row=mysqli_fetch_array($a);
    $balance = $row['acountBalance']+$depAmount;
   
   
   $s= mysqli_query($con,"INSERT INTO deposit(Name,depositAmount,date,paidBy,tellerName,balance,AccountNo) VALUES('$custName',
    '$depAmount','$date','$paidBy','$teller','$balance','$custNum') ");
    if($s){
        $mn=mysqli_query($con,"UPDATE customer SET acountBalance = '$balance' WHERE AccountNo  = '$custNum ' ");
        
            
        
        echo"<p style='color:blue;font-size:20pt'>UGX".$depAmount." is deposited successfully</p> ";
    }
    else {
         
        echo"<p style='color:red;font-size:20pt'>deposit failed, please try again.</p>";
    }
	}
	else{
	echo"<p style='color:red;font-size:20pt'>Invalid Customer records. Please you need to first register the customer.</p> ";
	}
}



//withdraw processing
if(isset($_POST['withdraw'])){
   $wcustoname=$_POST['wcustoname'];
    $wcustonum=$_POST['wcustonum'];
    $withamt=$_POST['withamt'];
    $wdate=$_POST['wdate'];
    $wteller=$_POST['wteller'];
    $a=mysqli_query($con,"select * from customer where AccountNo=$wcustonum and Name='$wcustoname'");
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
         $s= mysqli_query($con,"INSERT INTO withdraw(Name,withdrawAmount,date,tellerName,balance,mgtFees,AccountNo) VALUES('$wcustoname', '$withamt','$wdate','$wteller','$balance','$charge','$wcustonum') ");
    if($s){
        $mn=mysqli_query($con,"UPDATE customer SET acountBalance = '$balance' WHERE AccountNo ='$wcustonum ' ");
        mysqli_query($con,"insert into income(typeOfIncome,receivedFrom,incomeAmount,date)
		values('Mgt Fees','$wcustoname','$charge','$wdate')");
            
        
        echo"<p style='color:blue;font-size:20pt'>UGX".$withamt." has been withrawn successfully. you can give the money to " .$wcustoname."</p> ";
    }
    else {
        
        echo"<p style='color:red;font-size:20pt'>withdraw failed, please try again.</p>";
    }
        
        
    }
     else {
         
        echo"<p style='color:red;font-size:20pt'> you have insufficient Funds to process this withdraw</p>";
    }
	}
	else{
	echo"<p style='color:red;font-size:20pt'>Invalid Customer records. Please you need to first register the customer.</p> ";
	}
}

?>

		</div>
		</body>
		</html>
    