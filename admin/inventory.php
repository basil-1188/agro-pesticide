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
    <link rel="stylesheet" href="descript.css">
    <title>INSERT DATA</title>
</head>
<body>
<?php
if(isset($_POST['sub']))
{
    $batchid = $_POST['batchid'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $quantities=$_POST['quantities'];
    $totalprice=$_POST['totalprice'];
    $expirydate=$_POST['expirydate'];
    $productid = $_POST['productid'];
    $sql=mysqli_query($con,"INSERT INTO `inventory`(`email`,`batchid`,`phone`,`quantities`,`totalprice`,`expirydate`,`productid`,`balance`) 
    VALUES ('$email','$batchid','$phone','$quantities','$totalprice','$expirydate','$productid','$quantities')");
    if($sql)
    {
        echo "<script>alert('SUCCESFULY ADDED')</script>";
    }
    else
    {
        echo "<script>alert('SOMETHING WENT WRONG')</script>";

    }
    mysqli_close($con);
}
?>

</body>
</html>
<?php include_once('sidebarr.php');?>
<h1 class="fw-bold text-secondary mb-5 mt-5" style="text-align: center; font-family " >INSERT STOCK</h1>
<form method="post" action="">
    <div class="container bg-light mt-3 border border-3 border-dark mb-5  "style="  border: 1px solid; padding: 10px; box-shadow: 5px 10px 8px 10px #888888;" >
    <div class="row mt-3">  <div class="col mt-4 fs-4 text-danger">
    <input type="number" class="form-control" placeholder="BATCH ID" name="batchid" required>
  </div>
  <div class="col mt-4 fs-4 text-danger">
    <input type="text" class="form-control" placeholder="EMAIL" name="email" required>
  </div>
  <div class="col mt-4 fs-4 text-danger">
    <input type="text" class="form-control" pattern="[0-9]{10}" placeholder="PHONE" name="phone" required>
  </div>
  <div class="col mt-4 fs-4 text-danger">
    <input type="number" class="form-control"  placeholder="NO OF ITEM" name="quantities" required>
</div>
    </div>
    <div class="row mt-3">
  <div class="col-3 mt-4 fs-4 text-danger">
    <input type="number" class="form-control" placeholder="TOTAL PRICE" name="totalprice" required>
  </div>
  <div class="col-4 mt-4 me-1 fs-4 text-danger">
    <input type="date" class="form-control" placeholder="EXPIRY DATE" name="expirydate" required>
  </div>
  <div class="col-4 mt-4 mb-4 fs-4 text-danger">
  
    <input type="number" class="form-control"  placeholder="PRODUCTID" name="productid" required>
    </div>
    <div class="col mt-4 mb-4 fs-4 text-danger">

    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><spam style="font-size:13px;">pro id</spam>
    <i class="fas fa-lightbulb"></i>
</div>

</button>


  </div>

  <button type="submit" style="margin-left: 490px;" class=" mb-4  btn btn-outline-primary" name="sub">SUBMIT</button>
  </div>
</form>
<?php
$query=mysqli_query($con,"SELECT * FROM products");
?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">PRODUCT DETAILS</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <table>
          <tr class="border border-2">
            <th class="border border-2">Product name</th>
            <th class="border border-2 me-3">Product id</th>
          </tr>
          <?php
          while($row= mysqli_fetch_array($query))
          {
            ?>
          <tr class="border border-2">
            <td class="border border-2"><?php echo"$row[title]" ?></td>
            <td class="border border-2"><?php echo"$row[ID]" ?></td>
          </tr>
          <?php } ?>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php include_once('footer.php');?>
  <!--bootstrap js-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="/js/bootstrap.js">


    </script>
</body>
</html>