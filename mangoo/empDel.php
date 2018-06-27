<!DOCTYPE HTML>
<?PHP
	require 'function.php';

?>

<html>
	<?PHP includeHead('Settings | Basic Settings',1) ?>
	
	<body>
		<!-- MENU -->
		<?PHP includeMenu(7); ?>
		<div id="menu_main" style="margin-left:1.5in;margin-right:1.95in">
			<a href="empl_new.php" id="item_selected">New Employee</a>
			<a href="emplo.php">Current Employees</a>
			<a href="empEdit.php">Edit</a>
			<a href="empDel.php">Delete</a>
			
		</div>
	
		<!-- LEFT SIDE: Basic Settings -->	
		<div class="content_settings">
			<form action="empDel.php" method="post">
			<p>Enter the EmpId for the employee to be deleted.</p>
			
            
          
            
                <p><input type="number" name="dcc"></p><br>
            <p><input type="submit" name="expd" value="Delete Employee"></p>
				
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
            
          
               
                
           $d=mysqli_query($con,"delete from employee where empId=$value");
              if($d){
               echo"<p style='color:blue;font-size:20pt'>The record with empId ".$value." is deleted</p>";
           }
		   else {
		   echo"<p style='color:blue;font-size:20pt'>Failed to delete the record.</p>";
		   }
		   
       }
?>
	</body>
</html>