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
    <title>MORE DETAIL OF ORDER</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="descript.css">
</head>
<script language="javascript" type="text/javascript">
function f3()
{
window.print(); 
}
</script>
<body>

<?php include_once('header2.php');?>

<h3 class="fw-bold text-secondary text-center mt-3" style="" >#<?php echo $oid=$_GET['orderid'];?>  ORDER DETAILS</h3>
<h4 class="m-5" ><a href="index1.php" style="text-decoration: none;" >BACK <i class="fas fa-backward"></i></a></h4><br>

<?php
$userid= $_SESSION['bis'];

$ret=mysqli_query($con,"SELECT ordertime,orderfinalstatus FROM details WHERE userid='$userid' and orderid='$oid'");
while($result=mysqli_fetch_array($ret)) {
?>
<p class="ms-5" style="color:#000;"><b>Order #</b><?php echo $oid?><br>
<b>Order Date : </b><?php echo $od=$result['ordertime'];?><br>
<b>Order Status :</b><?php echo $pi=$result['orderfinalstatus'];?></p>
<?php } ?>
<br><br>

<?php 
 $query=mysqli_query($con,"SELECT products.ID,products.title,products.images,products.brandname,products.size,products.prize,cart.productid,cart.orderid,cart.quantiti
  FROM products JOIN cart ON products.ID=cart.productid WHERE cart.userid='$userid' AND cart.orderid=$oid");
 $num=mysqli_num_rows($query);
if($num>0){

    $cnt=1;
    ?>
<table class="table table-striped ">
<thead>
    <tr class="text-center" >
      <th scope="col">#</th>
      <th scope="col">Order Number</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Image</th>
      <th scope="col">Company</th>
      <th scope="col">Quantity</th>
      <th scope="col">Size</th>
      <th scope="col">Prize</th>
    </tr>
  </thead>
  <tbody>
  <?php	
 while ($row=mysqli_fetch_array($query))
 {
	?>
    <tr class="text-center" >
        <td><?php echo $cnt;?></td>
        <td><?php echo $row['orderid'];?></td>
        <td><?php echo $row['title']; ?></td>
        <td ><img  style="height: 100px; width: 90px;" src="images/<?php echo $row['images'] ?>" alt="<?php echo $row['images'] ?>"/></td>
        <td ><?php echo $row['brandname']; ?></td>
        <td ><?php echo $tot = $row['quantiti']; ?></td>
        <td ><?php echo $row['size']; ?></td>	
        <td>Rs.<?php echo $row['prize'];?><?php $tat = $row['ID']; ?></td>
        <?php 
    $cnt=$cnt+1;
    }
    ?></td>
    </tr>
  </tbody>
<?php } ?>
</table><br><br>

<button type="button" style="margin-left: 70px;" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
BILL <i class="fas fa-file-invoice-dollar"></i>
</button>
<?php
$quer=mysqli_query($con,"SELECT * FROM ulogins WHERE ID = '$userid'");
$query=mysqli_query($con,"SELECT products.title,products.brandname,products.size,products.prize,
cart.productid,cart.orderid,cart.quantiti FROM cart JOIN products ON products.ID=cart.productid
 WHERE cart.orderid='$oid' AND cart.isorderplaced=1");
 while ($row=mysqli_fetch_array($quer))
 {

     ?>
     
    
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="0" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" style="text-align: center;" id="staticBackdropLabel"><spam class="fw-bolder me-3"><?php echo $row['fullname']; ?></spam><spam class="ms-5">Date:
     <?php echo $od; ?></spam></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php } ?>
      <div class="modal-body">
      <table class="table text-center" colspan="6">
  <thead>
    <tr>
      <div id="name"></div>
      <div id="p"></div>
    </tr>
    <tr>
      <th scope="col">TITLE</th>
      <th scope="col">COMPANY</th>
      <th scope="col">QUANTITY</th>
      <th scope="col">SIZE</th>
      <th scope="col">PRICE</th>
    </tr>
  </thead>
  <?php
    $num=mysqli_num_rows($query);
    if($num>0){
  
  while ($row=mysqli_fetch_array($query))
{
?>
  <tbody>
    <tr>

    <td><?php echo $row['title']; ?></td>
    <td ><?php echo $row['brandname']; ?></td>
    <td><?php echo $row['quantiti']; ?></td>
    <td ><?php echo $row['size']; ?></td>	
    <td>Rs.<?php echo $total=$row['prize'];?>
        <?php
        $grandtotal+=$total;
    ?></td>
    </tr>
    <?php } ?>
    <tr>
        <th colspan="3">GRAND TOTAL :</th>
        <td colspan="2" class="text-primary fw-bolder"><?php echo number_format($grandtotal,2);?></td>
    </tr>

    <?php } ?>
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        <input type="button" class="btn btn-secondary" value="Print" onClick="return f3();" />
            </div>
    </div>
  </div>
</div>
<?php if($pi=="Accepted" || $pi=="On the way" ||  $pi=="" ){ ?> 
<a href="cancel.php?oid=<?php echo $oid;?>">
<button type="button" style="margin-left: 70px;" onclick="return confirm('DO YOU REALLY WANT TO CANCEL THE ORDER....?'),rebal();" class="btn btn-outline-success">CANCEL ORDER <i class="fas fa-ban"></i></button><br><br>
</a>
<?php } ?>
<?php
$query= mysqli_query($con,"SELECT * FROM inventory WHERE productid=$tat");  
while($row=mysqli_fetch_array($query))
{
  $tet= $row['balance'];
  $tip= $tot+$tet;
}
?>
<script>
function rebal() 
{
  <?php $query = mysqli_query($con,"UPDATE inventory SET balance='$tip' WHERE productid='$tat'");  ?>
}
</script>

<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="/js/bootstrap.js">

  </script>
  <?php include_once('footer.php');?>
  <?php echo $tot; ?>
  <?php echo $tat; ?>
  <?php echo $tet; ?>
  <?php echo $tip; ?>

</body>
</html>