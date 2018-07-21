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
			<form action="expEdit.php" method="post">
			<p>Select the Field you want to Edit</p>
			<p>
            <select name="xpedit" value="xpedit">
                <option>
                VoucherNo
                </option>
                <option>
                expenseType
                </option>
                <option>
                expenseAmount
                </option>
                <option>
                date
                </option>
                <option>
                personResponsible
                </option>
               
            </select></p><br>
          <p>Type a correct word to replace the one that had an error</p>
            <p><input type="text"name="correct"></p><br>
                <p>Enter the VoucherNo<br><input type="text"name="vcc"></p><br>
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
              
            if($_POST['xpedit']=="VoucherNo"){
              
		   
                $field="VoucherNo"; 
                
            }
			
             else if($_POST['xpedit']=="expenseType"){
                $field="expenseType";
            }
             else if($_POST['xpedit']=="expenseAmount"){
                $field="expenseAmount";
            }
             else if($_POST['xpedit']=="date"){
                $field="date";
            }
            else if($_POST['xpedit']=="personResponsible"){
                $field="personResponsible";
            }
            
              $value=$_POST['correct']; 
              $vc=$_POST['vcc'];
       //echo $field."<br>";
       //echo $value."<br>";
       //echo $vc."<br>";	   
               
                
           $d=mysqli_query($con,"update expenses set $field='$value' where VoucherNo=$vc");
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