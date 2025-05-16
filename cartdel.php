<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con, 'project');
$ID=$_GET['deleid'];
if(isset($ID))
{
$query=mysqli_query($con,"DELETE FROM `cart` WHERE id='$ID'");
if($query)
{
    echo "<script>alert('PRODUCT HAS BEEN DELETD FROM YOUR CART .....');</script>"; 
    echo "<script>window.location.href ='cart.php'</script>";
}
else
{
    die(mysqli_error($con));
}  
}