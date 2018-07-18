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
			<form action="searchShare.php" method="post">
			
				<p class="heading">search Share by AccountNo.</p>
				
				
				<table id="tb_set">
				
					
					<tr>
						<td> AccountNo.</td>
						<td><input type="number" name="shcust" placeholder="AccountNo." required></td>
						<td><input type="submit" name="shsave" value="Search"></td>
					</tr>
					</table>
					</form>
					<form action="searchShare.php" method="post">
					
					<p class="heading">search Share by  ShareId.</p>
				
				
				<table id="tb_set">
				
					
					<tr>
						<td> ShareId.</td>
						<td><input type="number" name="shcustn" placeholder="shareID." required></td>
						<td><input type="submit" name="shsubmit" value="Search"></td>
					</tr>
					</table>
			</form>
			
		</div>
		<div><center>
		<?php
			include_once('function.php');
			if(isset($_POST['shsave'])){
	        $custnb=$_POST['shcust'];
			$a=mysqli_query($con,"select *from share where AccountNo='$custnb' ");
			$nm=mysqli_num_rows($a);
			if($nm>0){
			echo"<table border='1'>";
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='8'><center>SHARE DETAILS FOR AccountNo.".$custnb."</center></td>";
			echo"</tr>";
			echo"<tr style='background:orange'>";
			echo"<td>shareID</td>";
			echo"<td>amountPaid</td>";
			echo"<td>totalAmount</td>";
			echo"<td>numberOfShares</td>";
			echo"<td>totalnumberOfShares</td>";
			echo"<td>AccountNo</td>";
			echo"<td>date</td>";
			echo"<td>teller</td>";
			echo"</tr>";
			while($row=mysqli_fetch_array($a)){
			
			
			echo"<tr style='background:gainsboro'>";
			echo"<td>".$row['shareID']."</td>";
			$mn=number_format($row['amountPaid']);
			echo"<td>".$mn."</td>";
			$smn=number_format($row['totalAmount']);
			echo"<td>".$smn."</td>";
			echo"<td>".$row['numberOfShares']."</td>";
			echo"<td>".$row['totalnumberOfShares']."</td>";
			echo"<td>".$row['AccountNo']."</td>";
			echo"<td>".$row['date']."</td>";
			echo"<td>".$row['teller']."</td>";
			echo"</tr>";
			}
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='8'><center>END OF LIST</center></td>";
			echo"</tr>";
			echo"</table>";
			
			}
			else{
			echo"<p style='color:blue;font-size:20pt'>no share records found for AccountNo. ".$custnb."</h1>";
			}
		}
			if(isset($_POST['shsubmit'])){
	         $custnm=$_POST['shcustn'];
			$a=mysqli_query($con,"select *from share where shareID=$custnm");
			$nm=mysqli_num_rows($a);
			if($nm>0){
			echo"<table border='1'>";
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='8'><center>SHARE DETAILS FOR Customer.".$custnm."</center></td>";
			echo"</tr>";
			echo"<tr style='background:orange'>";
			echo"<td>shareID</td>";
			echo"<td>amountPaid</td>";
			echo"<td>totalAmount</td>";
			echo"<td>numberOfShares</td>";
			echo"<td>totalnumberOfShares</td>";
			echo"<td>AccountNo</td>";
			echo"<td>date</td>";
			echo"<td>teller</td>";
			echo"</tr>";
			while($row=mysqli_fetch_array($a)){
			
			echo"<tr style='background:gainsboro'>";
			echo"<td>".$row['shareID']."</td>";
			$mn=number_format($row['amountPaid']);
			echo"<td>".$mn."</td>";
			$smn=number_format($row['totalAmount']);
			echo"<td>".$smn."</td>";
			echo"<td>".$row['numberOfShares']."</td>";
			echo"<td>".$row['totalnumberOfShares']."</td>";
			echo"<td>".$row['AccountNo']."</td>";
			echo"<td>".$row['date']."</td>";
			echo"<td>".$row['teller']."</td>";
			echo"</tr>";
			}
			echo"<tr style='background:black;color:white'>";
			echo"<td colspan='8'><center>END OF LIST</center></td>";
			echo"</tr>";
			echo"</table>";
			
			}
			else{
			echo"<p style='color:blue;font-size:20pt'>no share records found for customer. ".$custnm."</h1>";
			}
		}
			?>
			</center></div>
		
	</body>
</html>