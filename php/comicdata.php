<?php
$host='canary.simmons.edu';
$user= 'allwarde';
$password='1709544';
$database='lis458olsp20_allwarde_1';

$con = mysqli_connect($host,$user,$password,$database)
     or die ("Couldn't connect to server");

// this shows all the comic inventory
echo "<html>
          <head>
          <link rel='stylesheet' type='text/css' href='stairway.css'>
          </head>
          <body>";
echo  "<center><h2>Stairway to Heaven Comics</h2></center>";
echo  "<center><h3>All Comic Inventory</h3></center></h3><br><br>";
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

$sql = "SELECT comics.product_ID, comics.comictitle, comics.comiclnamewriter, comics.comicfnamewriter, comics.comicpub,
products.product_cost, products.product_stock, products.product_count
from comics
inner join products
on  products.product_ID = comics.product_ID
order by comics.comicpub;";

$result = mysqli_query($con,$sql);

echo "<div class ='display'>";

echo "<table border='1'; center;>
<tr>
<th>Product ID</th>
<th>Title</th>
<th>Writer Last Name</th>
<th>Writer First Name</th>
<th>Publisher</th>
<th>Price</th>
<th>In stock?</th>
<th>Quantity Count</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "<td>" . $row['product_ID'] . "</td>";
  echo "<td>" . $row['comictitle'] . "</td>";
  echo "<td>" . $row['comiclnamewriter'] . "</td>";
  echo "<td>" . $row['comicfnamewriter'] . "</td>";
  echo "<td>" . $row['comicpub'] . "</td>";
  echo "<td>" . $row['product_cost'] . "</td>";
  echo "<td>" . $row['product_stock'] . "</td>";
  echo "<td>" . $row['product_count'] . "</td>";
  echo "</tr>";
}
echo "</table>";
echo "</div>";


echo "<div class = 'forms'>";
echo "<h3>Update Records Here</h3>
  <p> Please fill in all fields, even if they are remaining the same </p>
  <form action = 'updateproduct.php' method = 'post'>
  <input type='radio' id='comic' name='producttype' value='comic'>
  <label for='comic'>Comic</label>
  <input type='radio' id='graphic' name='producttype' value='graphic'>
  <label for='graphic'>Graphic Novel/Trade Paper Back</label><br><br>


    <label for='title'> Title: </label>
    <input type ='text' id = 'title' name ='title' minlength = '1' maxlength = '250'><br><br>
    <label for = 'authfname'> First Name Author: </label>
    <input type = 'text' id = 'authfname' name ='authfname' minlength = '1' maxlength= '50'>
    <label for = 'authlname'> Last Name Author: </label>
    <input type = 'text' id = 'authlname' name ='authlname' minlength = '1' maxlength= '50'><br><br>
    <label for ='pub'> Publisher: </label>
    <input type='text' id ='pub' name ='pub' maxlength='50'><br><br><br>


    <label for='product_ID'> Product ID: </label>
    <input type='number' id='product_ID' name='product_ID' min = '0'> <br>

    <p> In stock:
    <input type='radio' id='yes' name='stock' value='yes'>
    <label for='stock'>Yes</label>
    <input type='radio' id='no' name='stock' value='no'>
    <label for='stock'>No</label> </p><br>

  <label for='quantity'> Quantity: </label>
  <input type='number' id='quantity' name='quantity' min = '0'> <br><br>

  <label for ='price'> Price: </label>
  <input type ='number' id = 'price' name ='price' min = '0' step = '.01'><br><br>
  <input type ='submit' value='Submit'>
  </form>
  </form><br><br><br>";




  echo
  "<h3>Delete Records Here</h3>
  <form action = 'deleteproduct.php' method = 'post'>
  <label for ='product_ID'> Product ID: </label>
  <input type ='number' id = ''product_ID' name ='product_ID'/><br><br>
  <input type='radio' id='comic' name='producttype' value='comic'>
  <label for='comic'>Comic</label>
  <input type='radio' id='graphic' name='producttype' value='graphic'>
  <label for='graphic'>Graphic Novel/Trade Paper Back</label><br>
  <p> Make sure you want to PERMANENTLY delete before pressing submit!</p><br>
  <input type ='submit' value='Submit'>
  </form>";

echo "</div>";
echo "</body>
    <html>";
