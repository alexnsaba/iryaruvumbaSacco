<!DOCTYPE HTML>
<?PHP
	require 'function.php';
	#checkLogin();
	#connect();
?>

<html>
	<!-- HTML HEAD -->
	<?PHP includeHead('Customer Search',1); ?>
	
	<body>
		<!-- MENU -->
		<?PHP 
				includeMenu(6);
		?>
		<!-- MENU MAIN -->
		<div id="menu_main" style="margin-left:1.5in;margin-right:1.95in">
			<a href="depWith.php" id="item_selected">Deposit or withdraw</a>
			<a href="transactionSearch.php">Search transactions</a>
			<a href="ministatement.php">Statement Of Account</a>
			<a href="dwEdit.php">Edit</a>
			<a href="dwDel.php">Delete</a>
			</div>
					
		<!-- CONTENT: Customer Search -->
		<div class="content_center">
	
			<form action="ministatement.php" method="post">
				<p class="heading_narrow">Statement of account by customer Number</p>
				<input type="text" name="cusst" placeholder="Customer Number"  required/>
               
				<input type="submit" name="ustom" value="Search" />
			</form>
			
			<form action="ministatement.php" method="post" >
             <p class="heading_narrow">Statement of account by customer Name </p>
				<input type="text" name="custname" placeholder="Customer Name" required/>
              
				<input type="submit" name="customm" value="Search" /><br><br><br>
			</form>
            <?php
                
                
            if(isset($_POST['ustom'])){
                $cusst=$_POST['cusst'];
               
            include_once('function.php');
                
           
     
        $sl="SELECT * from deposit WHERE AccountNo='$cusst' ";
        $qrr=mysqli_query($con,$sl);
           $rw=mysqli_num_rows($qrr);
        if($rw>0)
            {
            echo"<center>";
            echo"<p style='color:blue;font-size:20pt'>STATEMENT OF ACCOUNT</p>";
             echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr>";
    echo"<td colspan='8'style='background-color:black;color:white'><center><h1>deposit transactions </h1></center></td>";
    echo"</tr>";        
    echo"<tr style= 'background-color:orange'>";
    echo"<td>Deposit id.</td>";
    echo"<td>Cust Name</td>";
    echo"<td>Amount deposited</td>";
    echo"<td>Date </td>";
             echo"<td>Paid By </td>";
             echo"<td>Teller</td>";
             echo"<td>Account Balance</td>";
            echo"<td>AccountNo.</td>";
              echo"</tr>";
    while($row=mysqli_fetch_array($qrr))
    {
        echo"<tr>";
        echo"<td>".$row['depositId']."</td>";
        echo"<td>".$row['Name']."</td>";
        $m= number_format($row['depositAmount']);
        echo"<td>".$m."</td>";
        
      
        echo"<td>".$row['date']."</td>";
        echo"<td>".$row['paidBy']."</td>";
        
       echo"<td>".$row['tellerName']."</td>";
        ;
        $n= number_format($row['balance']);
        echo"<td>".$n."</td>";
        echo"<td>".$row['AccountNo']."</td>";
        
       
       
        echo"</tr>";
    }

	echo"<tr>";
echo"<td colspan='8'style='background-color:black;color:white'><center>Withdraw transactions</center></td>";
	echo"</tr>";
    echo"</table>";
                
            }
              else
     {
         echo"<p style='color:blue;font-size:20pt'> No deposit records found.</p>";
     }
        
                //dealing with withdraw search.
              
 
        $sl="SELECT * from withdraw WHERE AccountNo='$cusst' ";
        $qrr=mysqli_query($con,$sl);
           $rw=mysqli_num_rows($qrr);
        if($rw>0)
            {
            echo"<center>";
             echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>Withdraw id.</td>";
    echo"<td>Cust Name</td>";
    echo"<td>withdraw Amount</td>";
    echo"<td>Date </td>";
             echo"<td>Teller</td>";
             echo"<td>Account Balance</td>";
            echo"<td>mgt fees charged</td>";
            echo"<td>CustomerNo.</td>";
              echo"</tr>";
    while($row=mysqli_fetch_array($qrr))
    {
        echo"<tr>";
        echo"<td>".$row['withdrawId']."</td>";
        echo"<td>".$row['Name']."</td>";
        $m= number_format($row['withdrawAmount']);
        echo"<td>".$m."</td>";
        echo"<td>".$row['date']."</td>";
      
        
       echo"<td>".$row['tellerName']."</td>";
        ;
        $n= number_format($row['balance']);
        echo"<td>".$n."</td>";
          echo"<td>".$row['mgtFees']."</td>";
        echo"<td>".$row['AccountNo']."</td>";
        
       
       
        echo"</tr>";
    }

	echo"<tr>";
echo"<td colspan='8'style='background-color:black;color:white'><center>THE END OF LIST</center></td>";
	echo"</tr>";
    echo"</table>";
                
            }
              else
     {
         echo"<p style='color:blue;font-size:20pt'> No withdraw record found.</p>";
     }  
                }
            
#process for search by customer name 
            
 if(isset($_POST['customm'])){
	                $sl=$_POST['sel'];
                $cusst=$_POST['custname'];
               
                        include_once('function.php');
                
           
     
        $sl="SELECT * from deposit WHERE Name='$cusst' ";
        $qrr=mysqli_query($con,$sl);
           $rw=mysqli_num_rows($qrr);
        if($rw>0)
            {
            echo"<center>";
            echo"<p style='color:blue;font-size:20pt'>STATEMENT OF ACCOUNT</p>";
             echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr>";
    echo"<td colspan='8'style='background-color:black;color:white'><center><h1>deposit transactions </h1></center></td>";
    echo"</tr>";        
    echo"<tr style= 'background-color:orange'>";
    echo"<td>Deposit id.</td>";
    echo"<td>Cust Name</td>";
    echo"<td>Amount deposited</td>";
    echo"<td>Date </td>";
             echo"<td>Paid By </td>";
             echo"<td>Teller</td>";
             echo"<td>Account Balance</td>";
            echo"<td>CustomerNo.</td>";
              echo"</tr>";
    while($row=mysqli_fetch_array($qrr))
    {
        echo"<tr>";
        echo"<td>".$row['depositId']."</td>";
        echo"<td>".$row['Name']."</td>";
        $m= number_format($row['depositAmount']);
        echo"<td>".$m."</td>";
        
      
        echo"<td>".$row['date']."</td>";
        echo"<td>".$row['paidBy']."</td>";
        
       echo"<td>".$row['tellerName']."</td>";
        ;
        $n= number_format($row['balance']);
        echo"<td>".$n."</td>";
        echo"<td>".$row['AccountNo']."</td>";
        
       
       
        echo"</tr>";
    }

	echo"<tr>";
echo"<td colspan='8'style='background-color:black;color:white'><center>Withdraw transactions</center></td>";
	echo"</tr>";
    echo"</table>";
                
            }
              else
     {
         echo"<p style='color:blue;font-size:20pt'> No deposit records found.</p>";
     }
        
                //dealing with withdraw search.
              
 
        $sl="SELECT * from withdraw WHERE Name='$cusst' ";
        $qrr=mysqli_query($con,$sl);
           $rw=mysqli_num_rows($qrr);
        if($rw>0)
            {
            echo"<center>";
             echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr style= 'background-color:orange'>";
    echo"<td>Withdraw id.</td>";
    echo"<td>Cust Name</td>";
    echo"<td>withdraw Amount</td>";
    echo"<td>Date </td>";
             echo"<td>Teller</td>";
             echo"<td>Account Balance</td>";
            echo"<td>mgt fees charged</td>";
            echo"<td>AccountNo.</td>";
              echo"</tr>";
    while($row=mysqli_fetch_array($qrr))
    {
        echo"<tr>";
        echo"<td>".$row['withdrawId']."</td>";
        echo"<td>".$row['Name']."</td>";
        $m= number_format($row['withdrawAmount']);
        echo"<td>".$m."</td>";
        echo"<td>".$row['date']."</td>";
      
        
       echo"<td>".$row['tellerName']."</td>";
        ;
        $n= number_format($row['balance']);
        echo"<td>".$n."</td>";
          echo"<td>".$row['mgtFees']."</td>";
        echo"<td>".$row['AccountNo']."</td>";
        
       
       
        echo"</tr>";
    }

	echo"<tr>";
echo"<td colspan='8'style='background-color:black;color:white'><center>THE END OF LIST</center></td>";
	echo"</tr>";
    echo"</table>";
                
            }
              else
     {
         echo"<p style='color:blue;font-size:20pt'>No withdraw record found.</p>";
     } 
    
     
}
            
            ?>
            </div>
       
            
            
            
		
	</body>
</html>