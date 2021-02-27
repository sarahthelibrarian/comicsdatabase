<?php
$host='canary.simmons.edu';
$user= 'allwarde';
$password='1709544';
$database='lis458olsp20_allwarde_1';

$con = mysqli_connect($host,$user,$password,$database)
     or die ("Couldn't connect to server");

$sql = 'CREATE TABLE frequent_customer
(
freq_cust_ID int(4) NOT NULL AUTO_INCREMENT,
freq_custlname varchar(50),
freq_custfname varchar(50),
freq_custphone varchar (20),
freq_custemail varchar(50),
constraint freq_cust_IDPK primary key (freq_cust_ID)
)';

$result = mysqli_query($con, $sql)
   or die ("Couldn't execute create");

echo 'Table created successfully';

mysqli_close($con);

?>
