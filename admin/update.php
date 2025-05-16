<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,'project');
$ID =$_GET['updateid'];
$res = "SELECT * FROM products WHERE ID=$ID";
$resu = mysqli_query($con, $res);
$row = mysqli_fetch_array($resu);

  $title=$row['title'];
  $prize=$row['prize'];
  $brandname=$row['brandname'];
  $descriptions=$row['descriptions'];
  $size=$row['size'];
  $amounts=$row['amounts'];
  $category=$row['category'];

if(isset($_POST['submit']))
{
  $title=$_POST['title'];
  $prize=$_POST['prize'];
  $brandname=$_POST['brandname'];
  $descriptions=$_POST['descriptions'];
  $size=$_POST['size'];
  $amounts= $_POST['amounts'];
  $category= $_POST['$category'];
    $result = mysqli_query($con,"UPDATE `products` SET `title`='$title',`prize`='$prize',`brandname`='$brandname',`category`='$category',`descriptions`='$descriptions',`size`='$size',`amounts`='$amounts' WHERE ID =$ID");
    if($result)
    {
      echo "<script>alert('Sucessfully Updated')</script>";
      echo "<script>window.location.href ='display.php'</script>";
    }
    else
    {
        die(mysqli_error($con));
    }
}
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
    <title>UPDATE PRODUCTS</title>
</head>
<body>
<?php include_once('sidebarr.php');?>
<p class="fs-1 fw-bold text-secondary" style="text-align: center; " >UPDATE</p>
<form method="post">

    <div class="container bg-light border border-3 border-danger mb-5" style="  border: 1px solid; padding: 10px; box-shadow: 5px 10px 8px 10px #888888;" >
    
    <div class="row mt-3">
    <div class="col  mt-4 fs-4 text-danger">
    <input type="text" class="form-control" placeholder="TITLE" name="title" value="<?php echo $title; ?>">
  </div>
  <div class="col mt-4 fs-4 text-danger">
    <input type="int" class="form-control" placeholder="PRICE" name="prize" value="<?php echo $prize; ?>">
  </div>
  <div class="col mt-4 fs-4 text-danger">
    <input type="text" class="form-control" placeholder="BRANDNAME" name="brandname" value="<?php echo $brandname; ?>">
  </div>
  <div class="col mt-4 fs-4 text-danger">
    <input type="text" class="form-control" placeholder="SIZE" name="size" value="<?php echo $size; ?>">
  </div>
    </div>
    <div class="row mt-3">
  <div class="col mt-4 fs-4 text-danger">
    <input type="text" class="form-control" placeholder="AMOUNTS" name="amounts" value="<?php echo $amounts; ?>">
  </div>
  <div class="col mt-4 fs-4 text-danger">
  <input type="text" class="form-control" placeholder="CATEGORY" name="categori" value="<?php echo $category; ?>">
  </div>
  </div>
  <div class="row mt-3 mb-3">
  <div class="col mt-4 mb-4 fs-4 text-danger">
    <input type="text" class="form-control"  placeholder="DESCRIPTIONS" name="descriptions" value="<?php echo $descriptions; ?>">
  </div>
  </div> 
  <button type="submit" style="margin-left: 490px;" class="mb-3 btn btn-outline-dark" name="submit">UPDATE</button>
  </div>
</form>

<?php include_once('footer.php');?>
</body>
</html>