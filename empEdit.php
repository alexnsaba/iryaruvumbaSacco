<?PHP
	require 'function.php';

?>
<!DOCTYPE html>
<html>
	<?PHP includeHead('Settings | Basic Settings',1) ?>
	
	<body>
		<!-- MENU -->
		<?PHP includeMenu(7); ?>
		<div id="menu_main" style="margin-left:1.5in;margin-right:1.95in">
			<!-- <a href="empl_search.php">Search</a> -->
			<a href="empl_new.php" id="item_selected">New Employee</a>
			<a href="emplo.php">Current Employees</a>
			<a href="empEdit.php">Edit</a>
			<a href="empDel.php">Delete</a>
			
		</div>
	
		<!-- LEFT SIDE: Basic Settings -->	
		<div class="content_settings">
			<form action="empEdit.php" method="post">
			<p>Select the Field you want to Edit</p>
			<p>
            <select name="xpedit" value="xpedit">
                <option>
                empId
                </option>
                <option>
                name
                </option>
                <option>
                empSalary
                </option>
                <option>
                empAddress
                </option>
                <option>
                empGender
                </option>
				<option>
                empPhone
                </option>
				<option>
                empDob
                </option>
				<option>
                empEmail
                </option>
				<option>
                empStatus
                </option>
				<option>
                empStart
                </option>
				<option>
                empPosition
                </option>
               
            </select></p><br>
          <p>Type a correct word to replace the one that had an error</p>
            <p><input type="text"name="correct"></p><br>
                <p>Enter the empId<br><input type="text"name="vcc"></p><br>
            <p><input type="submit" name="expcorrect" value="Correct Error"></p>
				
			</form>
			
		</div>
		<div><center>
		<?php
			
		?>
			</center></div>
		

<?php
  include_once('function.php');
            if(isset($_POST['expcorrect'])){
              
            if($_POST['xpedit']=="empId"){
              
		   
                $field="empId"; 
                
            }
			
             else if($_POST['xpedit']=="name"){
                $field="name";
            }
             else if($_POST['xpedit']=="empSalary"){
                $field="empSalary";
            }
             else if($_POST['xpedit']=="empAddress"){
                $field="empAddress";
            }
            else if($_POST['xpedit']=="empGender"){
                $field="empGender";
            }
			 else if($_POST['xpedit']=="empPhone"){
                $field="empPhone";
            }
			 else if($_POST['xpedit']=="empDob"){
                $field="empDob";
            }
			 else if($_POST['xpedit']=="empEmail"){
                $field="empEmail";
            }
			 else if($_POST['xpedit']=="empStatus"){
                $field="empStatus";
            }
			 else if($_POST['xpedit']=="empStart"){
                $field="empStart";
            }
             else if($_POST['xpedit']=="empPosition"){
                $field="empPosition";
            }
              $value=$_POST['correct']; 
              $vc=$_POST['vcc'];
       //echo $field."<br>";
       //echo $value."<br>";
       //echo $vc."<br>";	   
               
                
           $d=mysqli_query($con,"update employee set $field='$value' where empId=$vc");
              if($d){
               echo"<p style='color:blue;font-size:20pt'>the Error has been corrected the new ".$field." is ".$value."</p>";
           }
		   else {
		   echo"<p style='color:blue;font-size:20pt'>Failed to edit the mistake.</p>";
		   }
		   
       }
?>
	</body>
</html>