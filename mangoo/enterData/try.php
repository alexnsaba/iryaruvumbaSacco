<?php
/*
$date = '08/05/2010';
list($month, $day, $year) = explode('/', $date);
echo $month."<br>";
echo $day."<br>";
echo $year."<br>";
if($month=='08')
echo"we are in August";
else
echo"we are not in August";
*/
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"lsc");
$b=mysqli_query($con,"select *from members");
while($rw=mysqli_fetch_array($b)){
$date=$rw['date'];
list($month, $day, $year) = explode('/', $date);
if($month=='12'){
$a=mysqli_query($con,"select sum(Amount) as total from members where date='$date'");
$row=mysqli_fetch_array($a);

}
}
echo $row[total];
?>
