<?php
$host='canary.simmons.edu';
$user= 'allwarde';
$password='1709544';
$database='lis458olsp20_allwarde_1';

$con = mysqli_connect($host,$user,$password,$database)
     or die ("Couldn't connect to server");

//this document pulls information that shows all the pull list customers and their biographical data
echo "<html>
          <head>
          <link rel='stylesheet' type='text/css' href='stairway.css'>
          </head>
          <body>";
echo  "<center><h2>Stairway to Heaven Comics</h2></center>";
echo  "<center><h3>All Pull Customers List Data</h3></center></h3><br><br>";
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

$result = mysqli_query($con,"SELECT * FROM pull_customers");

echo "<div class = 'display'>";
echo "<table border='1'>
<tr>
<th>Pull List Number</th>
<th>Last Name</th>
<th>First Name</th>
<th>Phone Number</th>
<th>Email</th>
<th>Notes</th>
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
  echo "<td>" . $row['pull_notes'] . "</td>";
  echo "<td>" . $row['pull_PUdate'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
echo "</div>";

echo "<div class = 'forms'>";

echo "<h3> Go to a specific pull list here </h3>";
echo "<form action='plistfullID.php' method='post'>
  <label for ='pull_list_num'> Pull List Number: </label>
  <input type ='number' id = 'pull_list_num' name ='pull_list_num'/><br><br>
  <label for='pull_lname'> Last Name: </label>
  <input type ='text' id = 'pull_lname' name ='pull_lname' minlength = '1' maxlength = '50'>
  <label for = 'pull_fname'> First Name: </label>
  <input type = 'text' id = 'pull_fname' name ='pull_fname' minlength = '1' maxlength= '50'><br><br>
  <input type='submit' value = 'Submit'/>
  </form>";

echo "<h3> Add another title to pull list here!</h3>";

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
 </form><br><br><br>";




echo "<h3>Update Records Here</h3>
  <p> Please fill in all fields, even if they are remaining the same </p>
  <form action = 'updaterecordplist.php' method = 'post'>
  <label for ='pudate'> New Pick Up Date: </label>
  <input type ='text' id = 'pudate' name ='pudate' placeholder='YYYY-MM-DD'/><br>
  <label for ='pull_list_num'> Pull List Number: </label>
  <input type ='number' id = 'pull_list_num' name ='pull_list_num'/><br><br>
  <label for='pull_lname'> Last Name: </label>
  <input type ='text' id = 'pull_lname' name ='pull_lname' minlength = '1' maxlength = '50'>
  <label for = 'pull_fname'> First Name: </label>
  <input type = 'text' id = 'pull_fname' name ='pull_fname' minlength = '1' maxlength= '50'><br><br>
  <label for ='pullphone'> Phone Number: </label>
  <input type='text' id ='pullphone' name ='pullphone' maxlength='20'><br><br>
  <label for='pullemail'> Email: </label>
  <input type='text' id='pullemail' name='pullemail'><br><br>
  <input type ='submit' value='Submit'>
  </form><br><br><br>";




  echo
  "<h3>Delete Records Here</h3>
  <form action = 'deleterecordplist.php' method = 'post'>
  <label for ='pull_list_num'> Pull List Number: </label>
  <input type ='number' id = 'pull_list_num' name ='pull_list_num'/><br><br>
  <br><br>
  <p> Make sure you want to PERMANENTLY delete before pressing submit!</p><br>
  <input type ='submit' value='Submit'>
  </form>";
  echo "</div>";
  echo "</body>
<html>";



?>
