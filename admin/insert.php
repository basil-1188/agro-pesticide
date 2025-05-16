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
    $title=$_POST['title'];
    $prize=$_POST['prize'];
    $brandname=$_POST['brandname'];
    $images=$_POST['images'];
    $descriptions=$_POST['descriptions'];
    $size=$_POST['size'];
    $amounts=$_POST['amounts'];
    $category = $_POST['category'];
    $sql=mysqli_query($con,"INSERT INTO `products`(`title`, `prize`, `brandname`, `images`, `descriptions`,`size`,`amounts`,`category`) 
    VALUES ('$title','$prize','$brandname','$images','$descriptions','$size','$amounts','$category')");
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
<?php include_once('sidebarr.php');?>
<h1 class="fw-bold text-secondary mb-5 mt-5" style="text-align: center; font-family " >INSERT PRODUCTS</h1>
<form method="post" action="">
    <div class="container bg-light mt-3 border border-3 border-dark mb-5  "style="  border: 1px solid; padding: 10px; box-shadow: 5px 10px 8px 10px #888888;" >
    <div class="row mt-3">
    <div class="col  mt-3 fs-4 text-danger">
    <input type="text" class="form-control" placeholder="TITLE" name="title" required>
  </div>
  <div class="col mt-4 fs-4 text-danger">
    <input type="int" class="form-control" placeholder="PRICE" name="prize" required>
  </div>
  <div class="col mt-4 fs-4 text-danger">
    <input type="text" class="form-control" placeholder="BRANDNAME" name="brandname" required>
  </div>
  <div class="col mt-4 fs-4 text-danger">
    <input type="text" class="form-control" placeholder="SIZE" name="size" required>
  </div>
    </div>
    <div class="row mt-3">
  <div class="col mt-4 fs-4 text-danger">
    <input type="text" class="form-control"  placeholder="IMAGE NAME" name="images" required>
</div>
  <div class="col mt-4 fs-4 text-danger">
    <input type="text" class="form-control" placeholder="AMOUNTS" name="amounts" required>
  </div>
  <div class="col mt-4 fs-4 text-danger">
    <input type="text" class="form-control" placeholder="CATEGORY" name="category" required>
  </div>
  </div>
  <div class="row mt-3 mb-3">
  <div class="col mt-4 mb-4 fs-4 text-danger">
    <input type="text" class="form-control"  placeholder="DESCRIPTIONS" name="descriptions" required>
  </div>
  </div>

  <button type="submit" style="margin-left: 490px;" class=" mb-4  btn btn-outline-primary" name="sub">SUBMIT</button>
  </div>
</form>

<?php include_once('footer.php');?>
</body>
</html>