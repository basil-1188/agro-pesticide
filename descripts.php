<?php
session_start();
error_reporting(0);
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,'project');
if (isset($_POST['submit'])) 
{
  $productid = $_POST['productid'];
  $userid = $_SESSION['bis'];
  $quantiti = $_POST['quantiti'];
  $res = mysqli_query($con, "INSERT INTO `cart`(`userid`,`productid`,`quantiti`) VALUES ('$userid','$productid',$quantiti)");
  if ($res) {
    echo "<script>alert('Product has been added in to the cart');</script>";
   
  } else {
    
    echo "<script>alert('Something went wrong.');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DESCRIPTION</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="descript.css">
</head>
<body>
<?php include_once('header2.php');?>
<?php
    $uid=$_GET['viewid'];
    $query=mysqli_query($con,"SELECT * FROM inventory WHERE productid='$uid' ");
    while ($row=mysqli_fetch_array($query)){
      $maxx= $row['balance'];
      ?>
    <?php
    }
    $query=mysqli_query($con,"SELECT * FROM products WHERE ID='$uid' ");
    while ($row=mysqli_fetch_array($query)){
?>
<h4 class="m-5" ><a href="index1.php" style="text-decoration: none;" >BACK <i class="fas fa-backward"></i></a></h4>

 <div class="container text-center bg-light mt-5 mb-5">
  <div class="row row-cols-2 border border-5 border-dark">
    <div class="col border border-3 border-dark border-bottom-0 border-start-0 border-top-0 pt-3"><img class="border border-2 border-secondary border-radius-3" style="height: 250px; width: 220px;" src="images/<?php echo $row['images']?>" alt="<?php echo $row['images']?>"/><br></div>
    <div class="col pt-3 lh-lg"><?php echo "$row[descriptions]";?><br><br><br>
    DOSAGE- <?php echo "$row[amounts]";?> L
    <div id="status" style="padding-top: 10px;"></div>
    </div>

    <div class="col border border-3 border-dark border-bottom-0 border-top-0 border-start-0 p-4 fw-bolder fs-4 "> <?php echo "$row[title]";?><br>
      Rs. <?php echo "$row[prize]";?><br>
      <?php echo "$row[brandname]";?></div>
    <div class="col p-4 text-success">
<?php if($_SESSION['bis']==" "){?>

<?php } else {?>
								<form method="post"> 
    <input type="hidden" name="productid" value="<?php echo $uid;?>"> 
    NO OF ITEMS: <input type="number" class="text-center" name="quantiti" value="1" min="1" maxlength="<?php echo $maxx; ?>" step="0" data-number-to fixed="2" data-number-stepfactor
    ="15" style="width: 60px;" onchange="change(<?php echo $maxx ?>,this.value);">  <br>
<button type="submit" name="submit" class="btn btn-secondary btn-lg mt-3" id="btn-add">Add to Cart<i class="fas fa-shopping-cart"></i></button>
<p id="xv"></p>

  </form>
  <?php }?>
</div>
  </div>
</div>
<?php } ?>
<?php $query = mysqli_query($con,"SELECT * FROM inventory WHERE productid='$uid'");
while ($row = mysqli_fetch_array($query)) {

  if ($row['balance']) {
   ?>
    <script>
      document.getElementById("status").innerHTML=<?php echo $row['balance'] ?>+ ' PRODUCTS AVAILABLE';
    </script>
    <?php }
}
    ?>
<?php include_once('footer.php');?>

  <!--bootstrap js-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="/js/bootstrap.js">

    </script>
    <script>
      function change(a,b){
        if(b<=a){
          
          document.getElementById('btn-add').style.display = 'bloc';
        }else{
          
          document.getElementById('btn-add').style.display = 'none';
          alert("out of stock");
        }
}
    </script>
</body>
</html>