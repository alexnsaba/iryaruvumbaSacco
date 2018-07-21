<!DOCTYPE HTML>
<?PHP
	require 'function.php';
	#checkLogin();
	#connect();
	#getSettings();
	#getFees();
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
				includeMenu(2);
		?>
		<!-- MENU MAIN -->
		<div id="menu_main" style="margin-left:1.5in;margin-right:1.95in">
			<a href="cust_search.php" id="item_selected">Search</a>
			<a href="cust_new.php">New Customer</a>
			<a href="cust_act.php">List of all Customers</a>
            <a href="edit.php">Edit</a>
			<a href="custDel.php">Delete </a>
		</div>
		<!-- Left Side of Dashboard -->
		<div class="content_left" style="width:100%;">
			<?php
            /**
	* Get current customer's details
	* @return array result_cust : Associative array with the details of the current customer
    
	*/
	    include_once('function.php');
     
#process for active customers 
         $sl="SELECT * from customer ";
        $qrr=mysqli_query($con,$sl);
     
           $rw=mysqli_num_rows($qrr);
        if($rw>0)
            {
             echo"<table border=1 style= 'background-color:gainsboro'>";
    echo"<tr>";
    echo"<td colspan='19'style='background-color:black;color:white'><center><h1>List of All Customers </h1></center></td>";
    echo"</tr>";        
    echo"<tr style= 'background-color:orange'>";
    echo"<td>Account NO.</td>";
    echo"<td> Name</td>";
    echo"<td>D O B</td>";
    echo"<td>Gender</td>";
             echo"<td>Address</td>";
             echo"<td>Telephone</td>";
             echo"<td>Email</td>";
             echo"<td>Occupation</td>";
             echo"<td>Marital Status</td>";
             echo"<td>Next of Kin</td>";
             echo"<td>Relationship</td>";
            echo"<td>Place of Birth</td>";
            echo"<td>Village</td>";
            echo"<td>Parish</td>";
            echo"<td>Subcounty</td>";
            echo"<td>District</td>";
             echo"<td>Date of joining</td>";
             echo"<td>Account Balance</td>";
			

    echo"</tr>";
    while($row=mysqli_fetch_array($qrr))
    {
        echo"<tr>";
        echo"<td>".$row['AccountNo']."</td>";
        echo"<td>".$row['Name']."</td>";
        echo"<td>".$row['custDob']."</td>";
        
        echo"<td>".$row['custsexId']."</td>";
        echo"<td>".$row['custAddress']."</td>";
        echo"<td>".$row['custPhone']."</td>";
        echo"<td>".$row['custEmail']."</td>";
        echo"<td>".$row['custOccup']."</td>";
        echo"<td>".$row['custmarriedId']."</td>";
        echo"<td>".$row['custHeir']."</td>";
        echo"<td>".$row['custHeirrel']."</td>";
        echo"<td>".$row['placeOfBirth']."</td>";
        echo"<td>".$row['village']."</td>";
        echo"<td>".$row['parish']."</td>";
        echo"<td>".$row['subcounty']."</td>";
        echo"<td>".$row['district']."</td>";
        echo"<td>".$row['custSince']."</td>";
        $bl=number_format($row['acountBalance']);
        echo"<td>".$bl."</td>";
        echo"</tr>";
    }

	echo"<tr>";
echo"<td colspan='19'style='background-color:black;color:white'><center>THE END OF LIST</center></td>";
	echo"</tr>";
    echo"</table>";
                
            }
     else
     {
         echo" No customer record found. please try again by entering in a correct search key.>";
     }
     
     

            ?>
            </div>