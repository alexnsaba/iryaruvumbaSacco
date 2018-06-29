<?php
include_once'cust_act.php';
$m=$row['AccountNo'];
$a=mysqli_query($con,"delete from customer where AccountNo=1 ");
if($a){
echo"deleted";
}
else{
echo"failed to delete ";

echo $m;
}
?>