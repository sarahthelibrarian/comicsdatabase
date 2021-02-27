<?php
$host='canary.simmons.edu';
$user= 'allwarde';
$password='1709544';
$database='lis458olsp20_allwarde_1';

$con = mysqli_connect($host,$user,$password,$database)
     or die ("Couldn't connect to server");

$sql="INSERT INTO frequent_customer (freq_booktitle, freq_bookpub, freq_cost, freq_orderdate, freq_cust_ID)
VALUES
('$_POST[freqbooktitle]','$_POST[freqpub]','$_POST[freqcost]','$_POST[freqorderdate]','$_POST[custID]')";

mysqli_query($con,$sql)
  or  die('Error: ' . mysqli_error());

echo "1 record added";

mysqli_close($con);
?>
