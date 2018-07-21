<!DOCTYPE HTML>
<?PHP
	require 'function.php';

?>

<html>
	<?PHP includeHead('Settings | Basic Settings',1) ?>
	
	<body>
		<!-- MENU -->
		<?PHP includeMenu(2); ?>
		<div id="menu_main" style="margin-left:1.5in;margin-right:1.95in">
			<a href="cust_search.php" id="item_selected">Search</a>
			<a href="cust_new.php">New Customer</a>
			<a href="cust_act.php">List of all Customers</a>
            <a href="edit.php">Edit </a>
			<a href="custDel.php">Delete </a>
			
		</div>
	
		<!-- LEFT SIDE: Basic Settings -->	
		<div class="content_settings">
			<form action="custDel.php" method="post">
			<p>Enter the AccountNo for the customer to be deleted.</p>
			
            
          
            
                <p><input type="number" name="dcc" required></p><br>
            <p><input type="submit" name="expd" value="Delete Customer"></p>
				
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
             $d=mysqli_query($con,"delete from customer where AccountNo=$value");
              if($d){
               echo"<p style='color:blue;font-size:20pt'>The record with AccountNo ".$value." is deleted</p>";
           }
		   else {
		   echo"<p style='color:blue;font-size:20pt'>Failed to delete the record.</p>";
		   }
		   
       }
?>
	</body>
</html>