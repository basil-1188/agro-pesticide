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
    <title>DESCRIPTION</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="descript.css">
</head>
<body>
<?php include_once('header.php'); ?>
<?php
    $uid = $_GET['viewid'];
$query = mysqli_query($con, "SELECT* FROM products WHERE ID='$uid'");

    while ($row = mysqli_fetch_array($query)) {
      ?>
<div class="container text-center bg-light mt-5 mb-5">
  <div class="row row-cols-2 border border-5 border-dark">
    <div class="col border border-3 border-dark border-bottom-0 border-start-0 border-top-0 pt-3"><img class="border border-2 border-secondary border-radius-3" style="height: 250px; width: 220px;" src="images/<?php echo $row['images'] ?>" alt="<?php echo $row['images'] ?>"/><br></div>
    <div class="col pt-3 lh-lg" ><?php echo "$row[descriptions]"; ?><br><br>
    SIZE-<?php echo "$row[size]"; ?>
    <br><br>
    DOSAGE- <?php echo "$row[amounts]"; ?>L
    <div id="status" style="padding-top: 10px;"></div>
</div>
    <div class="col border border-3 border-dark border-bottom-0 border-top-0 border-start-0 p-4 fw-bolder fs-4 "> <?php echo "$row[title]"; ?><br>
      Rs. <?php echo "$row[prize]"; ?><br>
      <?php echo "$row[brandname]"; ?><br>
    </div>
    <div class="col p-4 text-success">
  
    <button type="button" class="btn btn-secondary btn-lg"><a href="ulogin.php" style="text-decoration: none; color: #fff;"> ADD TO CART <i class="fas fa-shopping-cart"></i></a></button>
</div>
  </div>
</div>
<?php } ?>
<?php $query = mysqli_query($con,"SELECT * FROM inventory WHERE productid='$uid'");
while ($row = mysqli_fetch_array($query)) {

  if ($row['balance']) {
    echo 'ONLY ' . $row['balance'] . ' PRODUCT';
    ?>
    <script>
      document.getElementById("status").innerHTML=<?php echo $row['balance'] ?>+ ' PRODUCTS AVAILABLE';
    </script>
    <?php }
}
    ?>
  
    <!-- }else if($row['quantities']=='0'){
    echo 'zero';
     }else{
    echo 'stock available';-->
     
  



<?php include_once('foooter.php'); ?>
  <!--bootstrap js-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="/js/bootstrap.js">

    </script>
</body>
</html>
