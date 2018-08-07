<?PHP
	require 'function.php';

?>
<!DOCTYPE html>
<html>
	<?PHP includeHead('Settings | Basic Settings',1) ?>
	
	<body>
		<!-- MENU -->
		<?PHP 
				includeMenu(3);
		?>
		<!-- MENU MAIN -->
		<div id="menu_main" style="margin-left:0.2in;margin-right:1.3in">
			<a href="loan_search.php" id="item_selected">Search</a>
			<a href="loanAct.php">Active and cleared Loans</a>
			<a href="loanApply.php">Loan Application</a>
            <a href="giveLoan.php">Approve/Deny Loans</a>
            <a href="repay.php">Loan Repayment</a>
			<a href="loanEdit.php">Edit</a>
			<a href="loanDel.php">Delete</a>
			
		</div>
	
		<!-- LEFT SIDE: Basic Settings -->	
		<div class="content_settings">
			<form action="loanEdit.php" method="post">
			<p style="font-size:23pt;color:green">Edit a Loan</p>
			<p>Select a loan field that you want to edit</p>
            <select name="dep" value="dep">
                <option>
                loanId
                </option>
                <option>
                Name
                </option>
                <option>
                approvedAmount
                </option>
                <option>
                actualAmount
                </option>
                <option>
                dateOfApproval
                </option>
				<option>
                DueDate
                </option>
				<option>
               status
                </option>
				<option>
               loansOfficer
                </option>
				<option>
                monthlyInstalment
                </option>
				<option>
                fine
                </option>
				<option>
                balance
                </option>
				<option>
                period
                </option>
				<option>
                AccountNo
                </option>
               
            </select></p><br>
          <p>Type a correct word to replace the one that had an error</p>
            <p><input type="text"name="correct"></p><br>
                <p>Enter the LoanId<br><input type="text"name="dcc"></p><br>
            <p><input type="submit" name="loanEdit" value="Correct Error"></p>
				
			</form>
			

			
		</div>
		<div><center>
		<?php
			
		?>
			</center></div>
		

<?php
  include_once('function.php');
            if(isset($_POST['loanEdit'])){
              if($_POST['dep']=="loanId"){
              $field="loanId"; 
                }
			else if($_POST['dep']=="Name"){
                $field="Name";
            }
             else if($_POST['dep']=="approvedAmount"){
                $field="approvedAmount";
            }
             else if($_POST['dep']=="actualAmount"){
                $field="actualAmount";
                }
            else if($_POST['dep']=="dateOfApproval"){
                $field="dateOfApproval";
            }
			else if($_POST['dep']=="fine"){
                $field="fine";
            }
			 else if($_POST['dep']=="DueDate"){
                $field="DueDate";
            }
			 else if($_POST['dep']=="status"){
                $field="status";
            }
			else if($_POST['dep']=="loansOfficer"){
                $field="loansOfficer";
            }
			else if($_POST['dep']=="monthlyInstalment"){
                $field="monthlyInstalment";
            }
			else if($_POST['dep']=="balance"){
                $field="balance";
            }
			else if($_POST['dep']=="period"){
                $field="period";
            }
			 else if($_POST['dep']=="AccountNo"){
                $field="AccountNo";
            }
			 
              $value=$_POST['correct']; 
              $dc=$_POST['dcc'];
       	   $d=mysqli_query($con,"update loan set $field='$value' where loanId=$dc");
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