<?php
//getting the current date
$currentDate=date('Y-m-d');
$currDet=date_create($currentDate);
//obtaining the day,month, and year of the current date
$dCurr=date_format($currDet,'d');
$mCurr=date_format($currDet,'m');
$yCurr=date_format($currDet,'Y');
$con = mysqli_connect("localhost","root","","mango");
$n=mysqli_query($con,"select * from loan where balance>0");
while($row=mysqli_fetch_array($n)){
$Duedet = date_create( $row['DueDate']);
//getting day,month and year of the DueDate
$dDue = date_format($Duedet,'d');
$mDue = date_format($Duedet,'m');
$yDue = date_format($Duedet,'Y');
//condition for applying fine to uncleared loans
if((($dCurr >= $dDue)&&($mCurr >= $mDue) &&($yCurr == $yDue ))
	||(((($dCurr-$dDue)> -30))&&($mCurr > $mDue)&&($yCurr == $yDue ))
 ||(($dCurr >= $dDue)&&(($mCurr- $mDue)== -11) &&($yCurr > $yDue) ) ){

}

}

?>