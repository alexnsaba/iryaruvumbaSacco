<?PHP	
	require 'function.php';
	//Generate timestamp
	$timestamp = time();
	?>
<!DOCTYPE html>
<html>
	<?PHP includeHead('New Customer',0) ?>	
		<script>
			function validate(form){
				
				else { alert(fail); return false; }
			}
		</script>
		<script src="functions_validate.js"></script>
	</head>
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
		
		<!-- PAGE HEADING -->
		<p class="heading">ENTER INFORMATION ABOUT NEW CUSTOMER </p> 
		
		<!-- CONTENT -->
		<div class="content_center">
			<form action="function.php" method="post">
				
				<table id ="tb_fields">
					<tr>
						
						<td>Name:</td>
						<td><input type="text" name="cust_name" placeholder="Full Name" tabindex="6" required /></td>
						<td>Next of Kin:</td>
						<td><input type="text" name="cust_heir" tabindex="11" placeholder="customer's next of Kin" required /></td>
                        <td>Relationship:</td>
						<td><input type="text" name="cust_heirrel" placeholder="e.g. Wife, Secretary..." tabindex="12"  required /></td>
					</tr>
					<tr>
						<td>Place of Birth:</td>
						<td><input type="text" name="cust_plob" placeholder="place of birth" tabindex="2"  required /></td>
                        <td>Village:</td>
						<td><input type="text" name="cust_village" placeholder="village" tabindex="2"  required /></td>
                        <td>Parish:</td>
                    
						<td><input type="text" name="cust_parish" placeholder="parish" tabindex="2"  required /></td>
                        </tr>
                    <tr>
                        <td>Subcounty:</td>
						<td><input type="text" name="cust_subcounty" placeholder="subcounty" tabindex="2"  required /></td>
                        <td>District:</td>
						<td><input type="text" name="cust_dis" placeholder="district" tabindex="2"  required /></td>
						<td>Phone No:</td>
						<td><input type="text" name="cust_phone" tabindex="7" p placeholder="telephone" required/></td>
						
					</tr>
					<tr>
						<td>Gender:</td>
						<td>
							<select name="custsex_id" size="1" tabindex="3"  required>';
                                <option selected>Male</option><option>Female</option>
								<option>Group</option><option>Institution</option>
							</select>
						</td>
						<td>E-Mail:</td>
						<td><input type="email" name="cust_email" placeholder="abc@xyz.com" tabindex="8" /></td>
						<td>Active:</td>
						<td><input type="checkbox" disabled="disabled" checked="checked" /></td>
					</tr>
					<tr>
						<td>DoB:</td>
						<td><input type="date"  name="cust_dob" placeholder="DD.MM.YYYY" tabindex="14"  required/></td>
						<td>Occupation:</td>
						<td><input type="text" name="cust_occup" tabindex="9" placeholder="occupation"/></td>
						<td>Member since:</td>
						<td><input type="date"  name="cust_since"  tabindex="13"  required /></td>
					</tr>
					<tr>
						<td>Marital Status:</td>
						<td>
							<select name="custmarried_id" size="1" tabindex="5"  required>';
								 <option>Single</option><option selected>Married</option>
                                <option>Devorced</option><option>Widowed</option><option>null</option>
							</select>
						</td>
						
						
						<td>ReceiptNo:</td><td><input type="text"name="receipt" placeholder="The receiptNo"></td>
						<td>ShareAmount:</td><td><input type="number"name="regShare" placeholder="share before registration"></td>
						<td>
							<input type="hidden" name="receipt_no" id="receipt_no" value="" />
							<input type="submit" name="create" value="Continue" tabindex="14" />
						</td>
					</tr>
                    <tr>
                        <td><?php 
                            include_once("function.php");
                            if (isset($_POST['create'])){
                            if($query_insert)
                                echo"the Record has been saved successfully";
                            else
                                echo"Failed to add data. please Try again";
                            }
                            ?>
                        </td>
                    </tr>
				</table>
			</form>
		</div>
	</body>
</html>