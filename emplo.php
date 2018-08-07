<?PHP
	require 'function.php';
	#checkLogin();
	#connect();
	#getSettings();
	#getFees();
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
				includeMenu(7);
		?>
		<!-- MENU MAIN -->
		<div id="menu_main" style="margin-left:1.5in;margin-right:1.95in">
			<!-- <a href="empl_search.php">Search</a> -->
			<a href="empl_new.php" id="item_selected">New Employee</a>
			<a href="emplo.php">Current Employees</a>
			<a href="empEdit.php">Edit</a>
			<a href="empDel.php">Delete</a>
		</div>
		
		<!-- Left Side of Dashboard -->
		<div class="content_left" style="width:100%;">
			
		
          
		
            <?php
           
	    include_once('function.php');
     
#process for active customers 
         $sl="SELECT * from employee ";
        $qrr=mysqli_query($con,$sl);
     
           $rw=mysqli_num_rows($qrr);
        if($rw>0)
            {
             echo"<center><table border=1 style= 'background-color:gainsboro'>";
    echo"<tr>";
    echo"<td colspan='11'style='background-color:black;color:white'><center><h1>List Of Current Employee</h1></center></td>";
    echo"</tr>";        
    echo"<tr style= 'background-color:orange'>";
    echo"<td>Employee NO.</td>";
    echo"<td>Name</td>";
    echo"<td>Salary</td>";
    echo"<td>Address</td>";
             echo"<td>Gender</td>";
             echo"<td>Telephone</td>";
             echo"<td>D O B</td>";
             echo"<td>Email</td>";
            echo"<td>Marital Status</td>";
             echo"<td>Started Work On</td>";
             echo"<td>Position</td>";
            

    echo"</tr>";
    while($row=mysqli_fetch_array($qrr))
    {
        echo"<tr>";
        echo"<td>".$row['empId']."</td>";
        echo"<td>".$row['name']."</td>";
         $m=number_format($row['empSalary']);
        echo"<td>".$m."</td>";
        
        echo"<td>".$row['empAddress']."</td>";
        echo"<td>".$row['empGender']."</td>";
        echo"<td>".$row['empPhone']."</td>";
        echo"<td>".$row['empDob']."</td>";
        echo"<td>".$row['empEmail']."</td>";
        echo"<td>".$row['empStatus']."</td>";
        echo"<td>".$row['empStart']."</td>";
        echo"<td>".$row['empPosition']."</td>";
       
       
        echo"</tr>";
    }

	echo"<tr>";
echo"<td colspan='13'style='background-color:black;color:white'><center>THE END OF LIST</center></td>";
	echo"</tr>";
    echo"</table></center>";
                
            }
     else
     {
         echo"<p style='color:blue;font-size:20pt'>No Employee record found. please try again by entering in a correct search key.</p>";
     }
     
     

            ?>
            </div>