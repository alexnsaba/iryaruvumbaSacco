<?PHP
	require 'function.php';
	?>
<!DOCTYPE html>
<html>
	<!-- HTML HEAD -->
	<?PHP includeHead('Microfinance Management',0); ?>
		<link rel="stylesheet" href="css/stats.css" />
	</head>
	<!-- HTML BODY -->
	<body>
		<!-- MENU -->
		<?PHP 
				includeMenu(2);
		?>
		<!-- MENU MAIN -->
		<div id="menu_main" style="margin-left:1.5in;margin-right:1.95in">
			<a href="cust_search.php" id="item_selected">Search</a>
			<a href="cust_new.php">New Customer</a>
			<a href="cust_act.php">List of all Customers</a>
            <a href="edit.php">Edit </a>
			<a href="custDel.php">Delete </a>
		</div>
		
		<!-- Left Side of Dashboard -->
		<div class="content_left" style="width:100%;">
            <form method="post" action="edit.php">
            <p>Select the Field you want to Edit</p>
			<p>
            <select name="custedit">
                <option>
                Name
                </option>
                <option>
                date of birth
                </option>
                <option>
                gender
                </option>
                <option>
                Address
                </option>
                <option>
                phone
                </option>
                <option>
                Email
                </option>
                <option>
                Occupation
                </option>
                <option>
                Marital status
                </option>
                <option>
                Next of kin
                </option>
                <option>
                Relationship
                </option>
                <option>
                Place of Birth
                </option>
                <option>
                Village
                </option>
                <option>
                parish
                </option>
                <option>
                subcounty
                </option>
                <option>
                district
                </option>
                <option>
                date of joining
                </option>
            </select></p><br>
          <p>Type a correct word to replace the one that had an error</p>
            <p><input type="text"name="correct"></p><br>
                <p>Enter the Account Number<br><input type="text"name="acc"></p><br>
            <p><input type="submit" name="corect" value="correct the error"></p>
		</form>
            <?php
            
	    include_once('function.php');
            if(isset($_POST['corect'])){
              //$value=$_POST['correct']; 
              //$ac=$_POST['acc'];
			  //$field=$_POST['custedit'];
			 // echo"correct: ".$value;
			  //echo"AccountNo: ".$ac;
			  //echo"Column: ".$field;
			  
            if($_POST['custedit']=="Name"){
              
		   
                $field="Name"; 
                
            }
			
             else if($_POST['custedit']=="date of birth"){
                $field="custDob";
            }
             else if($_POST['custedit']=="gender"){
                $field="custsexId";
            }
             else if($_POST['custedit']=="Address"){
                $field="custAddress";
            }
            else if($_POST['custedit']=="phone"){
                $field="custPhone";
            }
            else if($_POST['custedit']=="Email"){
               $field="custEmail"; 
            }
            else if($_POST['custedit']=="Occupation"){
               $field="custOccup"; 
            }
            else if($_POST['custedit']=="Marital status"){
               $field="custmarriedId"; 
            }
            else if($_POST['custedit']=="Next of kin"){
                $field="custHeir";
            }
             else if($_POST['custedit']=="Relationship"){
               $field="custHeirrel";  
            }
             else if($_POST['custedit']=="Place of Birth"){
               $field="placeOfBirth"; 
            }
             else if($_POST['custedit']=="Village"){
               $field="village"; 
            }
             else if($_POST['custedit']=="parish"){
               $field="parish"; 
            }
            else if($_POST['custedit']=="subcounty"){
               $field="subcounty"; 
            }
            else if($_POST['custedit']=="district"){
                $field="district";
            }
             else if($_POST['custedit']=="date of joining"){
                $field="custSince";
            }
              $value=$_POST['correct']; 
              $ac=$_POST['acc'];
       
           
               
                
           $d=mysqli_query($con,"update customer set $field='$value' where AccountNo=$ac");
           if($d){
               echo"<p style='color:blue;font-size:20pt'>the Error has been corrected the new ".$field." is ".$value."</p>";
           }
		   
       }
         
        //$qrr=mysqli_query($con,$sl);
     
           

            ?>
            </div>