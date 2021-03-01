<?php
$host='canary.simmons.edu';
$user= 'allwarde';
$password='1709544';
$database='lis458olsp20_allwarde_1';

$con = mysqli_connect($host,$user,$password,$database)
     or die ("Couldn't connect to server");

// this form shows us all of the pull list biographical data

echo "<html>
          <head>
          <link rel='stylesheet' type='text/css' href='stairway.css'>
          </head>
          <body>";
echo  "<center><h2>Stairway to Heaven Comics</h2></center>";
echo  "<center><h3>Pull List Customers </h3></center></h3><br><br>";
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

$sql_cust="INSERT INTO pull_customers (pull_lname, pull_fname, pull_phone, pull_email)
VALUES
('$_POST[pulllname]','$_POST[pullfname]','$_POST[pullphone]','$_POST[pullemail]')";


//echo $sql;

mysqli_query($con,$sql_cust)
  or  die('Error: ' . mysqli_error());



$newrecord_fc = "SELECT pull_list_num, pull_lname, pull_fname, pull_phone, pull_email, pull_PUdate
from pull_customers where pull_lname ='$_POST[pulllname]' and  pull_fname = '$_POST[pullfname]'
and pull_phone = '$_POST[pullphone]' and pull_email = '$_POST[pullemail]'";

$result = mysqli_query($con,$newrecord_fc);

echo "<div class = 'display'>";
echo "<table border='1'>
<tr>
<th>Pull List Number</th>
<th>Last Name</th>
<th>First Name</th>
<th>Phone Number</th>
<th>Email</th>
<th>Last Pick Up Date</th>
</tr>";

  while($row = mysqli_fetch_array($result))


    {
    echo "<tr>";
    echo "<td>" . $row['pull_list_num'] . "</td>";
    echo "<td>" . $row['pull_lname'] . "</td>";
    echo "<td>" . $row['pull_fname'] . "</td>";
    echo "<td>" . $row['pull_phone'] . "</td>";
    echo "<td>" . $row['pull_email'] . "</td>";
    echo "<td>" . $row['pull_PUdate'] . "</td>";
    echo "</tr>";


    }
echo "</table>";
echo "</div>";


echo "<div class = 'forms'>";
    echo "<h3> Add titles to pull list here!</h3>";

// drop down menu
$result = $con->query("select product_ID, comictitle from comics");

    echo "<form action = 'pullcomics.php' method = 'post'>";
    echo "Comic Titles <select name='comictitles'>";

     while ($row = $result->fetch_assoc()) {

                   unset($product_ID, $comictitle);
                   $product_ID = $row['product_ID'];
                   $comictitle= $row['comictitle'];
                   echo '<option value='.$product_ID.'>'.$comictitle.'</option>';

              }

     echo "</select>";
     echo " <label for ='pullID'> Pull List Number: </label>
       <input type ='number' id = 'pullID' name ='pullID'/>
       <input type ='submit' value='Submit'>
     </form>";

  echo "<h3> Delete items from pull list here!</h3>";

  // drop down menu
  $result = $con->query("select product_ID, comictitle from comics");

     echo "<form action = 'deletecomicfrompull.php' method = 'post'>";
     echo "Comic Titles <select name='comictitles'>";

      while ($row = $result->fetch_assoc()) {

                    unset($product_ID, $comictitle);
                    $product_ID = $row['product_ID'];
                    $comictitle= $row['comictitle'];
                    echo '<option value='.$product_ID.'>'.$comictitle.'</option>';

               }

      echo "</select>";
      echo " <label for ='pullID'> Pull List Number: </label>
        <input type ='number' id = 'pullID' name ='pullID'/>
        <input type ='submit' value='Submit'>
      </form>";


echo "</div>";

echo "</body>
     <html>";
?>
