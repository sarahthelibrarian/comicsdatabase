<?php
$host='canary.simmons.edu';
$user= 'allwarde';
$password='1709544';
$database='lis458olsp20_allwarde_1';


// this document displays after a new order has been added to a frequent customer's page
echo "<html>
          <head>
          <link rel='stylesheet' type='text/css' href='stairway.css'>
          </head>
          <body>";
echo  "<center><h2>Stairway to Heaven Comics</h2></center>";
echo  "<center><h3>New Frequent Customer Record, Add Orders Here</h3></center></h3><br><br>";
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
$con = mysqli_connect($host,$user,$password,$database)
     or die ("Couldn't connect to server");

$sql_order="INSERT INTO frequent_orders (freq_booktitle, freq_cost,freq_cust_ID)
     VALUES
     ('$_POST[freqtitle1]', $_POST[price1], $_POST[freqcustID])";


mysqli_query($con,$sql_order)
  or  die('Error: ' . mysqli_error());


$freqcustnumber = $_POST[freqcustID];
$neworder = "SELECT frequent_customer.freq_cust_ID, frequent_customer.freq_custlname,
    frequent_customer.freq_custfname, frequent_customer.freq_custphone, frequent_customer.freq_custemail,
    frequent_orders.freq_booktitle, frequent_orders.freq_cost, frequent_customer.lastcreditdate
  from frequent_customer
  inner join frequent_orders
  where frequent_customer.freq_cust_ID = $freqcustnumber and frequent_orders.freq_cust_ID  = $freqcustnumber and
  frequent_customer.freq_cust_ID = frequent_orders.freq_cust_ID";


$result = mysqli_query($con,$neworder);


  echo "<div class = 'display'>";
  echo "
  <table border='1'>
  <tr>
  <th>Frequent Customer Number</th>
  <th>Last Name</th>
  <th>First Name</th>
  <th>Phone Number</th>
  <th>Email</th>
  <th>Book Title</th>
  <th>Cost</th>
  <th>Last Credit Date</th>
  </tr>";

    while($row = mysqli_fetch_array($result))


      {
      echo "<tr>";
      echo "<td>" . $row['freq_cust_ID'] . "</td>";
      echo "<td>" . $row['freq_custlname'] . "</td>";
      echo "<td>" . $row['freq_custfname'] . "</td>";
      echo "<td>" . $row['freq_custphone'] . "</td>";
      echo "<td>" . $row['freq_custemail'] . "</td>";
      echo "<td>" , $row['freq_booktitle'] . "</td>";
      echo "<td>" , $row['freq_cost'] . "</td>";
      echo "<td>" , $row['lastcreditdate'] . "</td>";
      echo "</tr>";


      }


    echo "</table>";
    echo "</div>";
    echo "<div class='forms'>";
    echo "
    <h3>Add purchases here</h3>
    <form action = 'freqcustorder.php' method = 'post'>
    <label for ='freqcustID'> Frequent Customer Number: </label>
    <input type ='number' id = freqcustID' name ='freqcustID'/><br><br>



    <label for = 'freqtitle1'> Title </label>
    <input type = 'text' id = 'freqtitle1' name ='freqtitle1' minlength = '1' maxlength= '250'>
    <label for ='price1'> Price: </label>
    <input type ='number' id = 'price1' name ='price1' min = '0' step = '.01'><br><br>
    <input type ='submit' value='Submit'><br><br>
    </form>";

    echo "<h3>Update Records Here</h3>
      <p> Please fill in all fields, even if they are remaining the same </p>
      <form action = 'updaterecordfreqcust.php' method = 'post'>
      <label for ='creditdate'> Credit Date: </label>
      <input type ='text' id = 'creditdate' name ='creditdate' placeholder='YYYY-MM-DD'/><br>
      <label for='freqcustID'>Enter Frequent Customer ID</label>
      <input type='text' id='freqcustID' name='freqcustID'><br><br>
      <label for='freqlname'> Last Name: </label>
      <input type ='text' id = 'freqlname' name ='freqlname' minlength = '1' maxlength = '50'>
      <label for = 'freqfname'> First Name: </label>
      <input type = 'text' id = 'freqfname' name ='freqfname' minlength = '1' maxlength= '50'><br><br>
      <label for ='freqphone'> Phone Number: </label>
      <input type='text' id ='freqphone' name ='freqphone' maxlength='20'><br><br>
      <label for='freqemail'> Email: </label>
      <input type='text' id='freqemail' name='freqemail'><br><br>
      <input type ='submit' value='Submit'>
      </form><br><br><br>";




      echo
      "<h3>Delete Records Here</h3>
      <form action = 'deleterecordfreqcust.php' method = 'post'>
      <label for='freqcustID'>Enter Frequent Customer ID</label>
      <input type='text' id='freqcustID' name='freqcustID'>
      <br><br>
      <p> Make sure you want to PERMANENTLY delete before pressing submit!</p><br>
      <input type ='submit' value='Submit'>
      </form>";

echo "</div>";
echo "</body>
        <html>";




?>
