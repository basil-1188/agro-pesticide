<?php
session_start();
error_reporting(0);
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,'project');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>SALES REPORT</title>
</head>
<body>
<?php include_once('sidebarr.php');?>

    <h2 class="text-center mt-3 mb-4 fw-bolder text-secondary">PURCHASE REPORT</h2>
    <div class="container">
            <form class="form-inline mt-3 mb-4" action="" name="form1" method="post">
  <div class="row">
    <div class="col">
    <label style="font-size: 20px; font-weight: bold;" for="email">SELECT STARTING DATE</label>
      <input type="date" style="width: 200px;" name="dt" id="dt" autocomplete="off" required class="form-control bg-info" >
    </div>
    <div class="col">
    <label style="font-size: 20px; font-weight: bold;" for="email">SELECT ENDING DATE</label>
      <input type="date" style="width: 200px;" name="dt1" id="dt1" autocomplete="off"  class="form-control bg-info" required>
    </div>
  </div>
  <div class="row">
    <div class="col text-center">
    <button type="submit" class=" mt-4 mb-4  btn btn-outline-danger" name="sub">SUBMIT</button>
    </div>
  </div>
</form>
<?php
if(isset($_POST['sub']))
{
  ?>
  <table class="table table-striped" style="  border: 1px solid; padding: 10px; box-shadow: 5px 10px 8px 10px #888888;">
    <thead>
      <tr >
        <th scope="col" >SL NO</th>
        <th scope="col" >PRODUCT COMPANY</th>
        <th scope="col" >PRODUCT NAME</th>
        <th scope="col" >NO OF ITEMS</th>
        <th scope="col" >TOTAL PRICE</th>
        <th scope="col" >EMAIL</th>
        <th scope="col" >EXPIRY DATE</th>
        <th scope="col" >PURCHASE DATE</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $pos=mysqli_query($con,"SELECT products.title,products.brandname,inventory.quantities,inventory.totalprice,inventory.email,
      inventory.expirydate,inventory.purchasedate
      FROM inventory JOIN products ON products.ID=inventory.productid WHERE (purchasedate>='$_POST[dt]' && purchasedate<='$_POST[dt1]') ");
      $slno=1;
      while($row=mysqli_fetch_array($pos))
      {
        $slno=$slno+1;
        echo "<tr>";
        echo "<td>"; echo $slno; "</td>";
        echo "<td>"; echo $row["brandname"]; echo "</td>";
        echo "<td>"; echo $row["title"]; echo "</td>";
        echo "<td>"; echo $row["quantities"]; echo "</td>";
        echo "<td>"; echo $row["totalprice"]; echo "</td>";
        echo "<td>"; echo $row["email"]; echo "</td>";
        echo "<td>"; echo $row["expirydate"]; echo "</td>";
        echo "<td>"; echo $row["purchasedate"]; echo "</td>";
        echo"</tr>";
      }
      ?>
    </tbody>
  </table>
  <?php 
}
else
{
  ?>
<table class="table table-striped" style="  border: 1px solid; padding: 10px; box-shadow: 5px 10px 8px 10px #888888;">
  <thead>
    <tr >
      <th scope="col" >SL NO</th>
      <th scope="col" >PRODUCT COMPANY</th>
      <th scope="col" >PRODUCT NAME</th>
      <th scope="col" >NO OF ITEMS</th>
      <th scope="col" >TOTAL PRICE</th>
      <th scope="col" >EMAIL</th>
      <th scope="col" >EXPIRY DATE</th>
      <th scope="col" >PURCHASE DATE</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $pos=mysqli_query($con,"SELECT products.title,products.brandname,inventory.quantities,inventory.totalprice,inventory.email,
    inventory.expirydate,inventory.purchasedate
    FROM inventory JOIN products ON products.ID=inventory.productid");
    $slno=0;
    while($row=mysqli_fetch_array($pos))
    {
      $slno=$slno+1;
      echo "<tr>";
      echo "<td>";  echo $slno; "</td>";
      echo "<td>"; echo $row["brandname"]; echo "</td>";
      echo "<td>"; echo $row["title"]; echo "</td>";
      echo "<td>"; echo $row["quantities"]; echo "</td>";
      echo "<td>"; echo $row["totalprice"]; echo "</td>";
      echo "<td>"; echo $row["email"]; echo "</td>";
      echo "<td>"; echo $row["expirydate"]; echo "</td>";
      echo "<td>"; echo $row["purchasedate"]; echo "</td>";
      echo"</tr>";
    }
    ?>
  </tbody>
</table>
<?php }?>
    </div>
    <?php include_once('footer.php');?>

    
<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="/js/bootstrap.js">

  </script>
</body>
</html>