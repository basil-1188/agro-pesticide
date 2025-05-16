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
    <title>INVENTORY</title>
</head>
<body>
<?php include_once('sidebarr.php');?>
<?php
if(isset($_POST['submit']))
{
    $companyname=$_POST['companyname'];
    $cimage=$_POST['cimage'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $noofitem=$_POST['noofitem'];
    $sql=mysqli_query($con,"INSERT INTO `inventory`(`companyname`,`cimage`, `address`,`email`,`phone`,`noofitem`) VALUES ('$companyname','$cimage','$address','$email','$phone','$noofitem')");
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
<h1 class="fw-bold text-secondary mb-5" style="text-align: center; font-family " >COMPANY DETAILS</h1>
<form method="post">
    <div class="container bg-light mt-5 "style="  border: 1px solid; padding: 10px; box-shadow: 5px 10px 8px 10px #888888;" >
      <div class="row mt-3">
  <div class="col mt-3 fs-4 text-danger">
    <input type="text" class="form-control" placeholder="COMPANY NAME" name="companyname">
  </div>
  <div class="col mt-3 fs-4 text-danger">
    <input type="int" placeholder="IMAGE" class="form-control" name="cimage">
  </div>
  <div class="col mt-3 fs-4 text-danger">
    <input type="text" class="form-control" placeholder="ADDRESS" name="address">
  </div>
  </div>
  <div class="row mt-3">
  <div class="col mt-3 fs-4 text-danger">
    <input type="text" class="form-control" placeholder="EMAIL" name="email">
</div>
  <div class="col mt-3 fs-4 text-danger">
    <input type="number" class="form-control" placeholder="PHONE NO" name="phone">
  </div>
  <div class="col mt-3 fs-4 text-danger">
    <input type="text" class="form-control" placeholder="NO OF ITEMS OF THE COMPANY" name="noofitem">
  </div>
  </div>
  <button type="submit" style="margin-left: 490px;" class="mt-4 mb-3 btn btn-outline-dark" name="submit">SUBMIT</button>
  </div>
</form>

  <!--bootstrap js-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="/js/bootstrap.js">

    </script>

<?php include_once('footer.php');?>
</body>
</html>