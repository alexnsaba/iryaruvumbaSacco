<?php
$currentDate=date('Y-m-d');
$startf=date_create('2018-07-12');
$endf=date_create($currentDate);
//echo $currentDate; 
$diff=date_diff($startf,$endf);
 $d=$diff->d;
 $m=$diff->m;
 $days=$m*30;
 $c=$d+$days;
 echo $c;
?>