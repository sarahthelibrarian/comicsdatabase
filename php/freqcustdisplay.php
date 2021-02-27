<?php
$host='canary.simmons.edu';
$user= 'allwarde';
$password='1709544';
$database='lis458olsp20_allwarde_1';

$con = mysqli_connect($host,$user,$password,$database)
     or die ("Couldn't connect to server");

$result = mysqli_query($con,"SELECT * FROM frequent_customer");

echo "<table border='1'>
<tr>
<th>Frequent Customer Number</th>
<th>Last Name</th>
<th>First Name</th>
<th>Phone Number</th>
<th>Email</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['freq_cust_ID'] . "</td>";
  echo "<td>" . $row['freq_custlname'] . "</td>";
  echo "<td>" . $row['freq_custfname'] . "</td>";
  echo "<td>" . $row['freq_custphone'] . "</td>";
  echo "<td>" . $row['freq_custemail'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>
