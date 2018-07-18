<!DOCTYPE HTML>
<?PHP
	require 'function.php';

?>

<html>
	<?PHP includeHead('Settings | Basic Settings',1) ?>
	
	<body>
		<!-- MENU -->
		<?PHP includeMenu(4); ?>
		<div id="menu_main" style="margin-left:1.5in;margin-right:1.95in">
			<a href="expense.php" id="item_selected">New Expense Entry</a>
			
			<a href="expSearch.php">search expenses</a>
			<a href="searchexp.php">List of all expenses</a>
			<a href="expEdit.php">Edit</a>
			<a href="expDel.php">Delete</a>
			
		</div>
	
		<!-- LEFT SIDE: Basic Settings -->	
		<div class="content_settings">
			<form action="expDel.php" method="post">
			<p>Enter the VoucherNo for the expense to be deleted.</p>
			<p>
            
          
            
                <p><input type="number" name="dcc"></p><br>
            <p><input type="submit" name="expd" value="Delete Expense"></p>
				
			</form>
			
		</div>
		<div><center>
		<?php
			
		?>
			</center></div>
		

<?php
  include_once('function.php');
            if(isset($_POST['expd'])){
              
           
            
              $value=$_POST['dcc']; 
            
          
               
                
           $d=mysqli_query($con,"delete from expenses where VoucherNo=$value");
              if($d){
               echo"<p style='color:blue;font-size:20pt'>The record with voucherNo ".$value." is deleted</p>";
           }
		   else {
		   echo"<p style='color:blue;font-size:20pt'>Failed to delete the record.</p>";
		   }
		   
       }
?>
	</body>
</html>