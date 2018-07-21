<!DOCTYPE HTML>
<?PHP
	require 'function.php';

?>

<html>
	<?PHP includeHead('Settings | Basic Settings',1) ?>
	
	<body>
		<!-- MENU -->
		<?PHP includeMenu(6); ?>
		<div id="menu_main" style="margin-left:1.5in;margin-right:1.95in">
			<a href="depWith.php" id="item_selected">Deposit or withdraw</a>
			<a href="transactionSearch.php">Search transactions</a>
			<a href="ministatement.php">Statement Of Account</a>
			<a href="dwEdit.php">Edit</a>
			<a href="dwDel.php">Delete</a>
			
		</div>
	
		<!-- LEFT SIDE: Basic Settings -->	
		<div class="content_settings">
			
			
			<form action="dwDel.php" method="post">
			<p style="font-size:23pt;color:green">Delete deposit Transactions</p>
			<p>Enter the depositId for the transaction to be deleted.</p>
			
            
          
           
                <p><input type="number" name="dp"></p><br>
            <p><input type="submit" name="dpdel" value="Delete Transaction"></p>
				
			</form>
			<form action="dwDel.php" method="post">
			<p style="font-size:23pt;color:green">Delete Withdraw Transactions</p>
			<p>Enter the withdrawId for the transaction to be deleted.</p>
			
            
          
            
                <p><input type="number" name="wp"></p><br>
            <p><input type="submit" name="wtdel" value="Delete Transaction"></p>
				
			</form>
			
		</div>
		<div><center>
		<?php
			
		?>
			</center></div>
		

<?php
  include_once('function.php');
            if(isset($_POST['dpdel'])){
              
           
            
              $value=$_POST['dp']; 
            
          
               
                
           $d=mysqli_query($con,"delete from deposit where depositId=$value");
              if($d){
               echo"<p style='color:blue;font-size:20pt'>The record with depositId ".$value." is deleted</p>";
           }
		   else {
		   echo"<p style='color:blue;font-size:20pt'>Failed to delete the record.</p>";
		   }
		   
       }
	   //deleting withdraw transactions
	    if(isset($_POST['wtdel'])){
              
           
            
              $value=$_POST['wp']; 
            
          
               
                
           $d=mysqli_query($con,"delete from withdraw where withdrawId=$value");
              if($d){
               echo"<p style='color:blue;font-size:20pt'>The record with withdrawId ".$value." is deleted</p>";
           }
		   else {
		   echo"<p style='color:blue;font-size:20pt'>Failed to delete the record.</p>";
		   }
		   
       }
?>
	</body>
</html>