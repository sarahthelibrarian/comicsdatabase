<?php
$host='canary.simmons.edu';
$user= 'allwarde';
$password='1709544';
$database='lis458olsp20_allwarde_1';

$con = mysqli_connect($host,$user,$password,$database)
     or die ("Couldn't connect to server");
// this document deletes an inventory item

echo "<html>
          <head>
          <link rel='stylesheet' type='text/css' href='stairway.css'>
          </head>
          <body>";
echo  "<center><h2>Stairway to Heaven Comics</h2></center>";
echo  "<center><h3>Delete Inventory Item</h3></center></h3><br><br>";
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

$productType = $_POST['producttype'];
$dID = $_POST['product_ID'];


if($productType == 'comic'){
  $sql2 = "DELETE FROM comics WHERE product_ID = $dID";
  if ($con->query($sql2) === TRUE)
{
           echo "Records deleted successfully from Comics";
       }
  else {
        echo "Error deleting record: " . $con->error;
       }

   $sql1 = "DELETE FROM frequent_orders_products WHERE  product_ID = $dID";
      if ($con->query($sql1) === TRUE)
          {
           echo "Record deleted successfully from Products <br><br>";
         }
      else {
        echo "Error deleting record: " . $con->error;
       }

  $sql = "DELETE FROM products WHERE  product_ID = $dID";
  if ($con->query($sql) === TRUE)
      {
           echo "Record deleted successfully from Products <br><br>";
       }
  else {
        echo "Error deleting record: " . $con->error;
       }
}

elseif($productType == 'graphic')
{
  $sql2 = "DELETE FROM graphic_novel WHERE product_ID = $dID";
  if ($con->query($sql2) === TRUE)
  {
         echo "Records deleted successfully from Comics";
     }
  else {
      echo "Error deleting record: " . $con->error;
     }
     $sql1 = "DELETE FROM frequent_orders_products WHERE  product_ID = $dID";
     if ($con->query($sql1) === TRUE)
        {
         echo "Record deleted successfully from Products <br><br>";
       }
    else {
      echo "Error deleting record: " . $con->error;
     }

     $sql = "DELETE FROM products WHERE  product_ID = $dID";
     if ($con->query($sql) === TRUE)
        {
         echo "Record deleted successfully from Products <br><br>";
       }
    else {
      echo "Error deleting record: " . $con->error;
     }
}

$con->close();

echo "</body>
    <html>";
?>