<?php
$host='canary.simmons.edu';
$user= 'allwarde';
$password='1709544';
$database='lis458olsp20_allwarde_1';

$con = mysqli_connect($host,$user,$password,$database)
     or die ("Couldn't connect to server");
// this page updates a product inventory
echo "<html>
          <head>
          <link rel='stylesheet' type='text/css' href='stairway.css'>
          </head>
          <body>";
echo  "<center><h2>Stairway to Heaven Comics</h2></center>";
echo  "<center><h3>Update Product Inventory </h3></center></h3><br><br>";
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
$dtitle = $_POST['title'];
$dfirstname = $_POST['authfname'];
$dlastname = $_POST['authlname'];
$dpub = $_POST['pub'];
$stock = $_POST['stock'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];


if ($productType == 'comic'){

  $sql1 = "UPDATE comics SET comictitle = '$dtitle' WHERE product_ID = $dID";

  if ($con->query($sql1) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $con->error;

    }

    $sql2 = "UPDATE comics SET comicfnamewriter = '$dfirstname' WHERE product_ID = $dID";


    if ($con->query($sql2) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $con->error;
    }

    $sql3 = "UPDATE comics SET comiclnamewriter = '$dlastname' WHERE product_ID = $dID";

    if ($con->query($sql3) === TRUE) {
      echo "Record updated successfully";
    }   else {
      echo "Error updating record: " . $con->error;
    }

    $sql4 = "UPDATE comics SET comicpub = '$dpub' WHERE product_ID = $dID";

    if ($con->query($sql4) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $con->error;
    }
    $sql5 = "UPDATE products SET product_stock = '$stock' WHERE product_ID = $dID";

    if ($con->query($sql5) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $con->error;
    }
    $sql6 = "UPDATE products SET product_count = '$quantity' WHERE product_ID = $dID";

    if ($con->query($sql6) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $con->error;
    }
    $sql7 = "UPDATE products SET product_cost = '$price' WHERE product_ID = $dID";

    if ($con->query($sql7) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $con->error;
    }

}

if ($productType == 'graphic'){

  $sql1 = "UPDATE graphic_novel SET graphic_noveltitle = '$dtitle' WHERE product_ID = $dID";

  if ($con->query($sql1) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $con->error;

    }

    $sql2 = "UPDATE graphic_novel SET graphic_novelfnamewriter = '$dfirstname' WHERE product_ID = $dID";


    if ($con->query($sql2) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $con->error;
    }

    $sql3 = "UPDATE graphic_novel SET graphic_novelfnamewriter = '$dlastname' WHERE product_ID = $dID";

    if ($con->query($sql3) === TRUE) {
      echo "Record updated successfully";
    }   else {
      echo "Error updating record: " . $con->error;
    }

    $sql4 = "UPDATE graphic_novel SET graphic_novelpub = '$dpub' WHERE product_ID = $dID";

    if ($con->query($sql4) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $con->error;
    }
    $sql5 = "UPDATE products SET product_stock = '$stock' WHERE product_ID = $dID";

    if ($con->query($sql5) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $con->error;
    }
    $sql6 = "UPDATE products SET product_count = '$quantity' WHERE product_ID = $dID";

    if ($con->query($sql6) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $con->error;
    }
    $sql7 = "UPDATE products SET product_cost = '$price' WHERE product_ID = $dID";

    if ($con->query($sql7) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $con->error;
    }

}
echo "</body>
    <html>";
$con->close();
?>
