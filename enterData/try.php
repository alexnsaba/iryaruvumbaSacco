<?php
/*
$date = '08-05-2010';
list($month, $day, $year) = explode('-', $date);
 echo $month."<br>";
echo $day."<br>";
echo $year."<br>";
if($year=='2010')
echo"we are in 2010";
else
echo"we are not in August"; */

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"mango");
$b=mysqli_query($con,"select *from deposit");
//$total=0;
while($rw=mysqli_fetch_array($b)){
$date=$rw['date'];

//echo $date."<br>";
list($year,$month, $day) = explode('-', $date);
//echo $year."<br>";
if($year==2018){
	$dt= $year."-".$month;
	//echo $dt."<br>";
$a=mysqli_query($con,"select * from deposit where YEAR(custSince)='2011' ");
//echo $dt;
$row=mysqli_fetch_array($a);
	echo $row['Name']."<br>";
	//echo $total;
	//echo  "year is 2018<br>";
}else{
	echo"year is not 2018";
}

}

?>
