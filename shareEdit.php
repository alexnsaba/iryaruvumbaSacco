<?PHP
	require 'function.php';

?>

<html>
	<?PHP includeHead('Settings | Basic Settings',1) ?>
	
	<body>
		<!-- MENU -->
		<?PHP includeMenu(8); ?>
		<div id="menu_main" style="margin-left:1.5in;margin-right:1.95in">
			<!-- <a href="empl_search.php">Search</a> -->
			<a href="share.php" id="item_selected">Buy Shares</a>
			
			<a href="searchShare.php">search a share</a>
			<a href="shareEdit.php">Edit</a>
			<a href="shareDel.php">Delete</a>
			
		</div>
	
		<!-- LEFT SIDE: Basic Settings -->	
		<div class="content_settings">
			<form action="shareEdit.php" method="post">
			<p>Select the Field you want to Edit</p>
			<p>
            <select name="shedit" value="shedit">
                <option>
                shareID
                </option>
                <option>
                amountPaid
                </option>
                <option>
                totalAmount
                </option>
                <option>
                numberOfShares
                </option>
                <option>
                totalnumberOfShares
                </option>
				<option>
                AccountNo
                </option>
				<option>
                date
                </option>
			    <option>
                teller
                </option>
				
               
            </select></p><br>
          <p>Type a correct word to replace the one that had an error</p>
            <p><input type="text"name="correct"></p><br>
                <p>Enter the shareId<br><input type="number"name="vcc"></p><br>
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
              
            if($_POST['shedit']=="shareID"){
              
		   
                $field="shareID"; 
                
            }
			
             else if($_POST['shedit']=="amountPaid"){
                $field="amountPaid";
            }
             else if($_POST['shedit']=="totalAmount"){
                $field="totalAmount";
            }
             else if($_POST['shedit']=="numberOfShares"){
                $field="numberOfShares";
            }
            else if($_POST['shedit']=="totalnumberOfShares"){
                $field="totalnumberOfShares";
            }
			 else if($_POST['shedit']=="AccountNo"){
                $field="AccountNo";
            }
			 else if($_POST['shedit']=="date"){
                $field="date";
            }
			 else if($_POST['shedit']=="teller"){
                $field="teller";
            }
			
              $value=$_POST['correct']; 
              $vc=$_POST['vcc'];
       //echo $field."<br>";
       //echo $value."<br>";
       //echo $vc."<br>";	   
               
                
           $d=mysqli_query($con,"update share set $field='$value' where shareId=$vc");
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