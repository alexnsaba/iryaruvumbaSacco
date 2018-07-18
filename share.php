<!DOCTYPE HTML>
<?PHP
	require 'function.php';

?>

<html>
	<?PHP includeHead('Settings | Basic Settings',1) ?>
	
	<body>
		<!-- MENU -->
		<?PHP includeMenu(8); ?>
		<div id="menu_main" style="margin-left:1.5in;margin-right:1.95in">
			<a href="share.php" id="item_selected">Buy Shares</a>
			
			<a href="searchShare.php">search a share</a>
			<a href="shareEdit.php">Edit</a>
			<a href="shareDel.php">Delete</a>
			
		</div>
	
		<!-- LEFT SIDE: Basic Settings -->	
		<div class="content_settings">
			<form action="share.php" method="post">
			
				<p class="heading">Enter New share contribution.</p>
				
				<table id="tb_set">
				
					
					<tr>
						<td> Contribution Amount</td>
						<td><input type="number" name="contAmount" placeholder="contribution amount" required></td>
					</tr>
					<tr>
						<td> Account Number</td>
						<td><input type="text" name="custNo" placeholder="Acount Number" required></td>
					</tr>
					<tr>
						<td>Received By</td>
						<td><input type="text" name="rperson" placeholder="teller's name" required></td>
					</tr>
					<tr>
						<td> Date</td>
						<td><input type="date" name="dOcont"  required></td>
					</tr>

					
				</table>
			
				<input type="submit" name="saveShare" value="Save">
				
			</form>
			
		</div>
		<div><center>
		<?php
			include_once('function.php');
			if(isset($_POST['saveShare'])){
			$contAmount=$_POST['contAmount'];
			$custNo=$_POST['custNo'];
			$dOcont=$_POST['dOcont'];
			$rperson=$_POST['rperson'];
			$nshare=$contAmount/10000;
			$ma=mysqli_query($con,"select * from customer where AccountNo ='$custNo' ");
			$mrn=mysqli_num_rows($ma);
			if($mrn==1){
			
			 // echo $sumamount."<br>";
			  //echo $sumshare;
			  
             $a= mysqli_query($con,"insert into share(amountPaid,totalAmount,numberOfShares,totalnumberOfShares,AccountNo,date,teller)
			 values('$contAmount','$contAmount','$nshare','$nshare','$custNo','$dOcont','$rperson')");
			 $a=mysqli_query($con,"select SUM(amountPaid) AS total from share where AccountNo=$custNo");
			$row=mysqli_fetch_array($a);
			$sumamount=$row['total'];
			$b=mysqli_query($con,"select SUM(numberOfShares) AS ntotal from share where AccountNo=$custNo");
			  $rw=mysqli_fetch_array($b);
			  $sumshare=$rw['ntotal'];
			 mysqli_query($con,"update share set totalAmount=$sumamount,totalnumberOfShares=$sumshare where AccountNo=$custNo ");
			 
			 if($a){
			 echo"<p style='color:blue;font-size:20pt'>".$nshare." Shares have been added to AccountNo ".$custNo."</p>";
			 }
			 else{
			 echo"<p style='color:red;font-size:20pt'>Failed to save the share. Please Try Again.</p>";
			 }
			 
			 
  }
  else{
  echo"<p style='color:blue;font-size:17pt'>Invalid AccountNo. please You Need To First Register The Customer.</p>";
}		
		}
			?>
			</center></div>
		
	</body>
</html>