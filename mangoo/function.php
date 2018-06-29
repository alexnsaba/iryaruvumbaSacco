<?php

$con=mysqli_connect("localhost","root","");
//creating the database mango
mysqli_query($con,"CREATE DATABASE mango");
mysqli_select_db($con,"mango");
mysqli_query($con,"CREATE TABLE user(userId int(20) primary key not null auto_increment,
firstName varchar(30),lastName varchar(30),username varchar(30) unique not null,password varchar(10) unique not null)");
//inserting in a user to log in
/* $password="leading2018";
$username="leading";
$user=md5($username);
$pass=md5($password);
 mysqli_query($con,"insert into user(firstName,lastName,username,password) values('nsaba','Alex',
'$user','$pass')"); */ 
#creating table employee
mysqli_query($con,"CREATE TABLE employee(empId int(20) primary key not null auto_increment,
name varchar(30),empSalary int(30),empAddress varchar(30),empGender varchar(10),empPhone varchar(13),
empDob varchar(10),empEmail varchar(30),empStatus varchar(10),empStart varchar(10),empPosition varchar(20))");
//creating table income
mysqli_query($con,"CREATE TABLE income(incomeId int(20) primary key not null auto_increment,
receiptNo int(30),typeOfIncome varchar(20),receivedFrom varchar(40),incomeAmount int(30),date varchar(10))");

//creating table customer
mysqli_query($con,"CREATE TABLE customer(AccountNo int(20) primary key not null auto_increment,
Name varchar(30),custDob varchar(10),custsexId varchar(30),custAddress varchar(30),custPhone varchar(13),
custEmail varchar(30),custOccup varchar(13),custmarriedId varchar(13),custHeir varchar(20),custHeirrel varchar(20),placeOfBirth varchar(15),village varchar(15),
parish varchar(15),subcounty varchar(15),district varchar(15),
custSince varchar(20),acountBalance int(20))");
//creating table shares.
mysqli_query($con,"CREATE TABLE share(shareID int(20) primary key not null auto_increment,amountPaid int(20),totalAmount int(20),numberOfShares int(20),totalnumberOfShares int(20),AccountNo int(20),date varchar(10),teller varchar(30))");
mysqli_query($con,"CREATE TABLE loan(loanId int (20) primary key not null auto_increment,
Name varchar(30),approvedAmount int(20),actualAmount int(20),dateOfApproval varchar(10),DueDate varchar(10),
status varchar(10),loansOfficer varchar(30),monthlyInstalment int(20),balance int(20),period int(20),fine int(20),AccountNo int(20))");
//creating table loanRepayment
mysqli_query($con,"create table loanRepayment(repaymentId int(20) primary key auto_increment,date varchar(10),loanAmount int(20),principlePayment int(20),
intrest int(20),fine int(20),totalPay int(20),balance int(20),receivedBy varchar(30),
paidBy varchar(30),AccountNo int(20),loanId int(20))");
// creating a deposit table
mysqli_query($con,"CREATE TABLE deposit(depositId int (20) primary key not null auto_increment,
Name varchar(30),depositAmount int(20),date varchar(10),paidBy varchar(30),
tellerName varchar(30),balance int(20),AccountNo  int(20))");
// creating a withdraw table
mysqli_query($con,"CREATE TABLE withdraw(withdrawId int (20) primary key not null auto_increment,
Name varchar(30),withdrawAmount int(20),date varchar(10),
tellerName varchar(30),balance int(20),mgtFees int(20),AccountNo int(20))");

function includeHead($title, $endFlag = 1) {
          $title="Iryaruvumba SACCO";
		echo '<head>
			<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
			<meta http-equiv="Content-Script-Type" content="text/javascript">
			<meta http-equiv="Content-Style-Type" content="text/css">
			<meta name="robots" content="noindex, nofollow">
			<title>'.$title.' </title>
			<link rel="shortcut icon" href="ico/favicon.ico" type="image/x-icon">
			<link rel="stylesheet" href="css/mangoo.css" />
			<link rel="stylesheet" href="ico/font-awesome/css/font-awesome.min.css">
			<link rel="stylesheet" href="jquery/jquery-ui-1.11.4/jquery-ui.min.css">
			<script src="jquery/jquery-2.2.1.min.js"></script>
			<script src="jquery/jquery-ui-1.11.4/jquery-ui.min.js"></script>
			<script>
				$(function() {
					$("#datepicker, #datepicker2, #datepicker3").datepicker({
						showOtherMonths: true,
						selectOtherMonths: true,
						dateFormat: \'dd.mm.yy\',
						changeMonth: true,
						changeYear: true
					});
				});
			</script>
			';
		if ($endFlag == 1) echo '</head>';
	}
function checkLogout(){
		if ($_SESSION['logrec_logout'] == 0){
			showMessage("You forgot to logout last time. Please remember to log out properly.");
			$_SESSION['logrec_logout'] = 1;
		}
	}
	
function includeMenu($tab_no){
	
	$_SESSION['user']="alex";
	
     /* $con=mysqli_connect("localhost","root","");
     mysqli_select_db($con,"mango");
     $sell="select * from user ";
        $a=mysqli_query($con,$sell);
        $row=mysqli_fetch_array($a); */
		echo '		
		<!-- MENU HEADER -->
		<div id="menu_header">
			<img src="ico/mangoo.jpg" alt="sacco logo " style="width:11%;margin-left:5.7in">
			<div id="menu_logout">
				<ul>
					<li>'.$_SESSION['user'].'   '.$row['firstName'].'
						<ul>
							<li><a href="index.php"><i class="fa f-sign-out fa-fw"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>';
		echo '
		<!-- MENU TABS -->
		<div id="menu_tabs"> 
		<ul>
				<li'; 
				if ($tab_no == 1) echo ' id="tab_selected"';
				echo '><a href="start.php"><i class="fa fa-tachometer fa-fw"></i> Dashboard</a></li>
				<li';
				if ($tab_no == 2) echo ' id="tab_selected"';
				echo '><a href="cust_search.php"><i class="fa fa-group fa-fw"></i> Customers</a></li>
				<li';
				if ($tab_no == 3) echo ' id="tab_selected"';
				echo '><a href="loan_search.php"><i class="fa fa-percent fa-fw"></i> Loans</a></li>
				<li';
				if ($tab_no == 4) echo ' id="tab_selected"';
				echo '><a href="expense.php"><i class="fa fa-calculator fa-fw"></i> Expenses</a></li>
				<li';
				if ($tab_no == 7) echo ' id="tab_selected"';
				echo '><a href="empl_new.php"><i class="fa fa-male fa-fw"></i> Employees</a></li>';
                echo '<li';
					if ($tab_no == 5) echo ' id="tab_selected"';

					echo '><a href="report.php"><i class=""></i>  Report Builder</a></li>';
    
                    echo '<li';
					if ($tab_no == 6) echo ' id="tab_selected"';
					echo '><a href="depWith.php"><i class=""></i>Deposit/Withdraw</a></li>';
			        echo '<li';
					if ($tab_no == 8) echo ' id="tab_selected"';
					echo '><a href="share.php"><i class=""></i> shares</a></li>';
					echo '<li';
					echo '</ul>
			</div>';
	}
	if(isset($_POST['login']))
{
	session_start();
   //checking if username and password fields are not empty
    if(!empty($_POST['username'])&&($_POST['password']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
		$_SESSION['user']=$username;
		$usernam=md5("leading");
		$passwor=md5("leading2018");
        $sel="select * from user where username='$username' AND password='$password' ";
        $a=mysqli_query($con,$sel);
        $row=mysqli_num_rows($a);
        if($row==1)
        {
			
            $_SESSION['login_user']=$username;
			if(isset($_SESSION['login_user'])){
             header('Location: start.php');
			}
			else{
			header('Location: index.php');	
			}
            }
        else
        {
            header("refresh:3,url=index.php");
            echo"<p style=color:red;font-size:25pt>Either username or password is incorrect</p>";
           
            
        }
    }
    else
    {
        header("refresh:3,url=index.php");
         echo"<p style=color:red;font-size:25pt>please fill the blanks</p>";
        
    }
}
// process from cust_new.php

	//CREATE-Button
	if (isset($_POST['create'])){
				
		//Sanitize user input
       
		
		$cust_name = $_POST['cust_name'];
		$cust_dob =$_POST['cust_dob'];
		$custsex_id =$_POST['custsex_id'];
		$cust_address = $_POST['cust_address'];
		$cust_phone = $_POST['cust_phone'];
		$cust_email = $_POST['cust_email'];
		$cust_occup = $_POST['cust_occup'];
		$custmarried_id =$_POST['custmarried_id'];
		$cust_heir = $_POST['cust_heir'];
		$cust_heirrel = $_POST['cust_heirrel'];
		
		$cust_since =$_POST['cust_since'];
        $pob=$_POST['cust_plob'];
        $vill=$_POST['cust_village'];
        $parish=$_POST['cust_parish'];
        $sc=$_POST['cust_subcounty'];
        $dis=$_POST['cust_dis'];
		//Insert new Customer into CUSTOMER
        $balance=0;
		//$totContribution=0;
		//$tot=0;
       $sq_insert = "INSERT INTO customer (Name, custDob, custsexId, custAddress, custPhone, custEmail, custOccup, custmarriedId, custHeir, custHeirrel,placeOfBirth,village,
       parish,subcounty,district
       ,custSince,acountBalance) VALUES ('$cust_name','$cust_dob','$custsex_id','$vill','$cust_phone',
        '$cust_email','$cust_occup','$custmarried_id','$cust_heir','$cust_heirrel','$pob','$vill','$parish','$sc','$dis','$cust_since','$balance' )";
		$query_insert = mysqli_query($con,$sq_insert);
		//adding membership and stationary to income table
		$rec=$_POST['receipt'];
		$memberFee=5000;
		$membershipStationaryFee=5000;
		//inserting into share table upon registration
		$shq=mysqli_query($con,"select *from customer where Name='$cust_name'");
		$sh=mysqli_fetch_array($shq);
		$acc=$sh['AccountNo'];
		$regShare=$_POST['regShare']-($memberFee+$membershipStationaryFee);
		$shareValue=10000;
		$numberOfShares=$regShare/$shareValue;
		mysqli_query($con,"insert into share(amountPaid,totalAmount,numberOfShares,totalnumberOfShares,AccountNo,date)values('$regShare','$regShare','$numberOfShares','$numberOfShares','$acc','$cust_since')");
		mysqli_query($con,"insert into income(receiptNo,typeOfIncome,receivedFrom,incomeAmount,date)
		values('$rec','memberShipFee','$cust_name','$memberFee','$cust_since')");
		mysqli_query($con,"insert into income(receiptNo,typeOfIncome,receivedFrom,incomeAmount,date)
		values('$rec','memberStationaryFee','$cust_name','$membershipStationaryFee','$cust_since')");
		
		
        header("refresh:3,url=cust_new.php");
        
		#checkSQL($query_insert);
		
		
	}
	
	//Select Marital Status for Drop-down-Menu
	$sql_mstat = "SELECT * FROM custmarried";
	$query_mstat = mysqli_query($con,$sql_mstat);
	#checkSQL($query_mstat);
	
	//Select Sicknesses for Drop-down-Menu
	$sql_sick = "SELECT * FROM custsick";
	$query_sick = mysqli_query($con,$sql_sick);
	#checkSQL($query_sick);
	
	//Select Sexes from custsex for dropdown-menu
	$sql_sex = "SELECT * FROM custsex";
	$query_sex = mysqli_query($con,$sql_sex);
	#checkSQL($query_sex);
	
	//Determine new CUST_ID
	$sql_maxid = "SELECT MAX(cust_id) AS maxid FROM customer";
	$query_maxid = mysqli_query($con,$sql_maxid);
	#checkSQL($query_maxid);
	#$result_maxid = mysqli_fetch_array($query_maxid);
	$new_id = $result_maxid['maxid'] + 1;
 #process for inserting data in employee table
	if (isset($_POST['creat'])){
				
		//Sanitize user input
		
		$empl_name = $_POST['empl_name'];
		$empl_dob =$_POST['empl_dob'];
		$empl_salary =$_POST['empl_salary'];
		$empl_address = $_POST['empl_address'];
		$empl_phone = $_POST['empl_phone'];
		$empl_email = $_POST['empl_email'];
		$empl_gender = $_POST['empl_gender'];
		$empl_status =$_POST['empl_status'];
		$empl_start = $_POST['empl_start'];
		$empl_position = $_POST['empl_position'];
		
	
		//Insert new Customer into table employee
		
       $sq_insert = "INSERT INTO employee (name, empSalary, empAddress, empGender, empPhone,empDob, empEmail, empStatus,
       empStart , empPosition) VALUES ('$empl_name','$empl_salary','$empl_address','$empl_gender','$empl_phone',
        '$empl_dob','$empl_email','$empl_status','$empl_start','$empl_position')";
		$query_insert = mysqli_query($con,$sq_insert);
         
       
        
        header("refresh:3,url=empl_new.php");
        
		
		}
  

?>