<?php
$host='canary.simmons.edu';
$user= 'allwarde';
$password='1709544';
$database='lis458olsp20_allwarde_1';

$con = mysqli_connect($host,$user,$password,$database)
     or die ("Couldn't connect to server");

$sql="INSERT INTO frequent_customer (freq_custlname, freq_custfname, freq_custphone, freq_custemail)
VALUES
('$_POST[freqlname]','$_POST[freqfname]','$_POST[freqphone]','$_POST[freqemail]')";

mysqli_query($con,$sql)
  or  die('Error: ' . mysqli_error());

echo "1 record added";

mysqli_close($con);
?>
