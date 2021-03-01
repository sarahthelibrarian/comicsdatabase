<?php
$host='canary.simmons.edu';
$user= 'allwarde';
$password='1709544';
$database='lis458olsp20_allwarde_1';

$con = mysqli_connect($host,$user,$password,$database)
     or die ("Couldn't connect to server");

     // this document is used to update records on the frequent customer program

     echo "<html>
               <head>
               <link rel='stylesheet' type='text/css' href='stairway.css'>
               </head>
               <body>";
     echo  "<center><h2>Stairway to Heaven Comics</h2></center>";
     echo  "<center><h3>Update Frequent Customer Record</h3></center></h3><br><br>";
     echo "       <nav>
             <ul class = 'nav'>
               <li class = 'li'><a href = home.html class ='navlink'>Home</a></li>
                 <div class='dropdown'>
                   <li class = 'li'><a class ='navlink'>
                  <button class='dropbtn'>Frequent Customers </a>
                  <i class='fa fa-caret-down'></i>
                </button>
              </li>
                <div class= 'dropdown-content'>
                  <a href='frequentcustomerform.html'>Add Frequent Customer</a>
                  <a href='frequentcustomerhistoryform.html'>Update/Find Frequent Customer Page</a>
                  <a href='freqcustdisplay.php'>All Frequent Customer Records</a>
                </div>
             </div>
             <div class='dropdown'>
                <li class = 'li'><a class ='navlink'>
                  <button class='dropbtn'>Pull Lists </a>
                  <i class='fa fa-caret-down'></i>
                </button>
              </li>
              <div class= 'dropdown-content'>
                <a href = 'pullcustomerform.html'>Add Pull Customer</a>
                <a href= 'pulllistsearch.html'>Update/Find Pull Customer Page</a>
                <a href = 'plistdata.php'>All Pull List Customer Data</a>
              </div>
              </div>
              <div class='dropdown'>
                 <li class = 'li'><a class ='navlink'>
                   <button class='dropbtn'>Inventory </a>
                   <i class='fa fa-caret-down'></i>
                 </button>
               </li>
               <div class= 'dropdown-content'>
                 <a href='inventoryform.html'>Add Product</a>
                 <a href = 'productsearch.html'> Search/Update Product </a>
                 <a href='comicdata.php'> All Comics Inventory Data</a>
                 <a href='graphicnoveldata.php'> All Graphic Novel/Trade Paper Back Inventory Data</a>
               </div>
               </div>
           </nav>";

$dID = $_POST['freqcustID'];
$dlastname = $_POST['freqlname'];
$dfirstname = $_POST['freqfname'];
$demail = $_POST['freqemail'];
$dphone = $_POST['freqphone'];
$credit = $_POST['creditdate'];

$sql1 = "UPDATE frequent_customer SET freq_custlname = '$dlastname' WHERE freq_cust_ID= $dID";


if ($con->query($sql1) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}

$sql2 = "UPDATE frequent_customer SET freq_custfname = '$dfirstname' WHERE freq_cust_ID= $dID";

if ($con->query($sql2) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}

$sql3 = "UPDATE frequent_customer SET freq_custemail = '$demail' WHERE freq_cust_ID= $dID";

if ($con->query($sql3) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}

$sql4 = "UPDATE frequent_customer SET freq_custphone = '$dphone' WHERE freq_cust_ID= $dID";

if ($con->query($sql4) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}

$sql5 = "UPDATE frequent_customer SET lastcreditdate = '$credit' WHERE freq_cust_ID= $dID";

if ($con->query($sql5) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}


$con->close();

echo "</body>
      <html>";

?>
