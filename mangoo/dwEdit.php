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
			<!-- <a href="empl_search.php">Search</a> -->
			<a href="depWith.php" id="item_selected">Deposit or withdraw</a>
			<a href="transactionSearch.php">Search transactions</a>
			<a href="ministatement.php">Statement Of Account</a>
			<a href="dwEdit.php">Edit</a>
			<a href="dwDel.php">Delete</a>
			
		</div>
	
		<!-- LEFT SIDE: Basic Settings -->	
		<div class="content_settings">
			<form action="dwEdit.php" method="post">
			<p style="font-size:23pt;color:green">Edit Deposit Transactions</p>
			<p>Select a Deposit field that you want to edit</p>
            <select name="dep" value="dep">
                <option>
                depositId
                </option>
                <option>
                Name
                </option>
                <option>
                depositAmount
                </option>
                <option>
                date
                </option>
                <option>
                paidBy
                </option>
				<option>
                tellerName
                </option>
				<option>
                balance
                </option>
				<option>
               AccountNo
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
                <p>Enter the depositId<br><input type="text"name="dcc"></p><br>
            <p><input type="submit" name="depEdit" value="Correct Error"></p>
				
			</form>
			
			<form action="dwEdit.php" method="post">
			<p style="font-size:23pt;color:green">Edit Withdraw Transactions</p>
			<p>Select a Withdraw field that you want to edit</p>
            <select name="with" value="with">
                <option>
                withdrawId
                </option>
                <option>
                Name
                </option>
                <option>
                withdrawAmount
                </option>
                <option>
                date
                </option>
                <option>
                tellerName
                </option>
				<option>
                balance
                </option>
				<option>
                mgtFees
                </option>
				<option>
               AccountNo
                </option>
				
               
            </select></p><br>
          <p>Type a correct word to replace the one that had an error</p>
            <p><input type="text"name="correct"></p><br>
                <p>Enter the WithdrawId<br><input type="text"name="wcc"></p><br>
            <p><input type="submit" name="withEdit" value="Correct Error"></p>
				
			</form>
			
		</div>
		<div><center>
		<?php
			
		?>
			</center></div>
		

<?php
  include_once('function.php');
            if(isset($_POST['depEdit'])){
              
            if($_POST['dep']=="depositId"){
              
		   
                $field="depositId"; 
                
            }
			
             else if($_POST['dep']=="Name"){
                $field="Name";
            }
             else if($_POST['dep']=="depositAmount"){
                $field="depositAmount";
            }
             else if($_POST['dep']=="date"){
                $field="date";
                }
            else if($_POST['dep']=="paidBy"){
                $field="paidBy";
            }
			 else if($_POST['dep']=="tellerName"){
                $field="tellerName";
            }
			 else if($_POST['dep']=="balance"){
                $field="balance";
            }
			 else if($_POST['dep']=="AccountNo"){
                $field="AccountNo";
            }
			 
              $value=$_POST['correct']; 
              $dc=$_POST['dcc'];
       //echo $field."<br>";
       //echo $value."<br>";
       //echo $vc."<br>";	   
               
                
           $d=mysqli_query($con,"update deposit set $field='$value' where depositId=$dc");
              if($d){
               echo"<p style='color:blue;font-size:20pt'>the Error has been corrected the new ".$field." is ".$value."</p>";
           }
		   else {
		   echo"<p style='color:blue;font-size:20pt'>Failed to edit the mistake.</p>";
		   }
		   
       }
	   //Editing Withdraw Transactions
	   if(isset($_POST['withEdit'])){
              
            if($_POST['with']=="withdrawId"){
              
		   
                $field="withdrawId"; 
                
            }
			
             else if($_POST['with']=="Name"){
                $field="Name";
            }
             else if($_POST['with']=="withdrawAmount"){
                $field="withdrawAmount";
            }
             else if($_POST['with']=="date"){
                $field="date";
                }
           else if($_POST['with']=="tellerName"){
                $field="tellerName";
            }
			 else if($_POST['with']=="balance"){
                $field="balance";
            }
			 else if($_POST['with']=="mgtFees"){
                $field="mgtFees";
            }
			 else if($_POST['with']=="AccountNo"){
                $field="AccountNo";
            }
			 
              $value=$_POST['correct']; 
              $wc=$_POST['wcc'];
       //echo $field."<br>";
       //echo $value."<br>";
       //echo $vc."<br>";	   
               
                
           $d=mysqli_query($con,"update Withdraw set $field='$value' where withdrawId=$wc");
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