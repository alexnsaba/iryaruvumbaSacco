<?PHP
session_start();
			if(isset($_SESSION['login_user'])&& !empty($_SESSION['login_user'])){
			#echo $_SESSION['login_user'];
			}else{
			 header("location:index.php");	
			}
			?>
<!DOCTYPE HTML>
<?PHP
require_once 'function.php';
	?>

<html>
	<!-- HTML HEAD -->
	<?PHP includeHead('Microfinance Management',0); ?>
		<link rel="stylesheet" href="css/stats.css" />
	</head>
	<!-- HTML BODY -->
	<body>
       
		<!-- MENU -->
		<?PHP 
				includeMenu(1);
		?>
		<!-- MENU MAIN -->
		<div id="menu_main" style="margin-left:1.5in;margin-right:1.95in">
			<a href="cust_search.php">Search Customer</a>
			<a href="cust_new.php">New Customer</a>
			<a href="loan_search.php">Search Loan</a>
		</div>
		
		<!-- Left Side of Dashboard -->
		<div class="content_left" style="width:50%;">
			
		</div>
          
		<!-- Right Side of Dashboard -->
		<div>
			
        <?PHP 
             include_once("function.php");
    		 //$ln=$_POST['loan_no'];
        $sl="SELECT * from loan where status='Active' ";
        $qrr=mysqli_query($con,$sl);
            $rw=mysqli_num_rows($qrr);
        if($rw>0)
            {
            echo"<center>";
             echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr>";
    echo"<td colspan='13'style='background-color:black;color:white'><center>
	<h1>Active Loans</h1></center></td>";
    echo"</tr>";        
    echo"<tr style= 'background-color:orange'>";
    echo"<td>Loan id.</td>";
    echo"<td>Name</td>";
    echo"<td>approvedAmount</td>";
    echo"<td>actualAmount</td>";
	echo"<td>dateOfApproval</td>";
             echo"<td>DueDate</td>";
             echo"<td>status</td>";
             echo"<td>loansOfficer</td>";
            echo"<td>monthlyInstalment</td>";
            echo"<td>balance</td>";
            echo"<td>Period</td>";
            echo"<td>AccountNo</td>";
             echo"</tr>";
    while($row=mysqli_fetch_array($qrr))
    {
        echo"<tr>";
        echo"<td>".$row['loanId']."</td>";
        echo"<td>".$row['Name']."</td>";
        $m= number_format($row['approvedAmount']);
        echo"<td>".$m."</td>";
        $pn=number_format($row['actualAmount']);
         echo"<td>".$pn."</td>";
        echo"<td>".$row['dateOfApproval']."</td>";
		echo"<td>".$row['DueDate']."</td>";
        echo"<td>".$row['status']."</td>";
         echo"<td>".$row['loansOfficer']."</td>";
		 $mpt= number_format($row['monthlyInstalment']);
        echo"<td>".$mpt."</td>";
        $blc= number_format($row['balance']);
        echo"<td>".$blc."</td>";
        echo"<td>".$row['period']."</td>";
        
        
        echo"<td>".$row['AccountNo']."</td>";
        echo"</tr>";
    }
	echo"<tr>";
echo"<td colspan='13'style='background-color:black;color:white'><center>THE END OF LIST</center></td>";
	echo"</tr>";
    echo"</table>";
                
            }
              else
     {
         echo" <center style='font-size:20pt'>No Active loan record found.</center>";
     }
            ?>
           
		</div>
		
		<!-- Logout Reminder Message -->
		<?PHP	
        #checkLogout();	?>
		
	</body>
</html>