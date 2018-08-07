<?PHP
	require 'function.php';

?>

<html>
	<?PHP includeHead('Settings | Basic Settings',1) ?>
	
	<body>
		<!-- MENU -->
		<?PHP includeMenu(8); ?>
		<div id="menu_main" style="margin-left:1.5in;margin-right:1.95in">
			<a href="share.php" id="item_selected">Buy Shares</a>
			
			<a href="searchShare.php">search a share</a>
			<a href="shareEdit.php">Edit</a>
			<a href="shareDel.php">Delete</a>
			
		</div>
	
		<!-- LEFT SIDE: Basic Settings -->	
		<div class="content_settings">
			<form action="shareDel.php" method="post">
			<p>Enter the ShareId for the share to be deleted.</p>
			
            
          
            
                <p><input type="number" name="dcc"></p><br>
            <p><input type="submit" name="expd" value="Delete Share"></p>
				
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
            
          
               
                
           $d=mysqli_query($con,"delete from share where shareId=$value");
              if($d){
               echo"<p style='color:blue;font-size:20pt'>The record with shareId ".$value." is deleted</p>";
           }
		   else {
		   echo"<p style='color:blue;font-size:20pt'>Failed to delete the record.</p>";
		   }
		   
       }
?>
	</body>
</html>