<?php
session_start();
error_reporting(0);
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,'project');


if(isset($_POST['sub']))
{
  $userid = $_SESSION['bis'];
    $sql = mysqli_query($con, "SELECT * FROM ulogins WHERE ID='$userid'");
  $query=mysqli_query($con,"SELECT products.ID,products.images,products.title,products.size,products.prize
  ,products.brandname,cart.id,cart.productid,cart.quantiti FROM cart JOIN products ON products.ID=cart.productid 
  WHERE cart.userid='$userid' AND cart.isorderplaced IS NULL");
    while ($row=mysqli_fetch_array($query))
    {
     $fetch=$row['ID'];
     $fetchq="SELECT * FROM inventory WHERE productid LIKE $fetch";
     $qf=mysqli_query($con,$fetchq);
     $ans=mysqli_fetch_array($qf);
     //$ans['quantities'];->product quantity
     //$row['quantiti']->cart quantity
     //$fetch->product id
     $pq=$ans['balance'];
     $cq=$row['quantiti'];
     $final_price=$pq-$cq;
     $update=mysqli_query($con, "UPDATE `inventory` SET `balance`=$final_price WHERE `productid` LIKE $fetch");
    } 

  $productid = $_POST['productid'];
    $userid = $_SESSION['bis'];
    $qtity=$_POST['main'];
    $uname=$_POST['uname'];
    $mobno=$_POST['mobno'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $city = $_POST['city'];
    $landmark=$_POST['landmark'];
    $pincode=$_POST['pincode'];
    $altno=$_POST['altno'];
    $orderid= mt_rand(10000000, 70000000);
    $chkAddr = mysqli_query($con, "SELECT * FROM `details` WHERE userid LIKE '$userid'");
    $fetchAddr=mysqli_fetch_array($chkAddr);
  $currentAddr = $fetchAddr['address'];
  if($currentAddr==$address){
    $sql=mysqli_query($con,"INSERT INTO `details`(`userid`, `orderid`,`aaddress`) VALUES ('$userid','$orderid','1')");
    if($sql)
    {


      echo '<script>alert("YOUR ORDER HAS BEEN SUCCESSFULLY PLACED. YOUR ORDER NUMBER IS "+"'.$orderid.'")</script>';
      $sql=mysqli_query($con,"UPDATE `cart` SET `orderid`='$orderid',`isorderplaced`='1' WHERE `userid`='$userid' AND `isorderplaced` IS NULL;");
      echo "<script>window.location.href ='order.php'</script>";
      
    }
    else
    {
        echo "<script>alert('SOMETHING WENT WRONG')</script>";

    }
  }else{
    $sql=mysqli_query($con,"INSERT INTO `details`(`userid`, `orderid`,`aaddress`) VALUES ('$userid','$orderid','$address')");
    if($sql)
    {
      $sql=mysqli_query($con,"UPDATE `cart` SET `orderid`='$orderid',`isorderplaced`='1' WHERE `userid`='$userid' AND `isorderplaced` IS NULL;");
      echo '<script>alert("YOUR ORDER HAS BEEN SUCCESSFULLY PLACED. YOUR ORDER NUMBER IS "+"'.$orderid.'")</script>';
      echo "<script>window.location.href ='order.php'</script>";
      //product id
      //cart qunatity
      
    }
    else
   {
        echo "<script>alert('SOMETHING WENT WRONG')</script>";

    }
  }
   /* $sql=mysqli_query($con,"UPDATE `cart` SET `orderid`='$orderid',`isorderplaced`='1' WHERE `userid`='$userid' AND `isorderplaced` IS NULL;");
    $sql=mysqli_query($con,"INSERT INTO `details`(`userid`, `orderid`, `qtity`, `uname`, `mobno`, `email`, `address`, `city`, `landmark`, `pincode`, `altno`)
     VALUES ('$userid','$orderid','$qtity','$uname','$mobno','$email','$address','$city','$landmark','$pincode','$altno')");
    if($sql)
    {
      echo '<script>alert("YOUR ORDER HAS BEEN SUCCESSFULLY PLACED. YOUR ORDER NUMBER IS "+"'.$orderid.'")</script>';
      echo "<script>window.location.href ='order.php'</script>";
    }
    else
    {
        echo "<script>alert('SOMETHING WENT WRONG')</script>";

    }
    mysqli_close($con);*/
}
$total=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY CART</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="descript.css">
</head>
<body onload="mainload()">
    <!--modal-->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Change Your Address</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="body1"> <textarea name="newaddr" id="newaddr" cols="44" rows="5">

</textarea>
<img src="images\Change-of-address_.jpg" style="width: 460px;" alt="">
</div>
     <div class="body2 ml-auto">      
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveaddr();" data-bs-dismiss="modal">update</button>
      </div>
    </div>
  </div>
</div>
  <!-- -->
<?php include_once('header2.php');?>

<h1 class="fw-bold text-secondary text-center mt-3 text-decoration-underline" style="" >MY CART</h1>
<h4 class="m-5" ><a href="index1.php" style="text-decoration: none;" >BACK <i class="fas fa-backward"></i></a></h4>

<div class="container">
  
<?php
$userid = $_SESSION['bis'];
$sql = mysqli_query($con, "SELECT * FROM ulogins WHERE ID='$userid'");
  $query=mysqli_query($con,"SELECT products.ID,products.images,products.title,products.size,products.prize
  ,products.brandname,cart.id,cart.productid,cart.quantiti FROM cart JOIN products ON products.ID=cart.productid 
  WHERE cart.userid='$userid' AND cart.isorderplaced IS NULL");
 $num=mysqli_num_rows($query);
 if($num>0)
 {
 
  ?> 
  <table class="table border border-5 border-success " style="  border: 1px solid; padding: 10px; box-shadow: 5px 10px 8px 10px #888888;">
  <thead>
    <tr class="border border-3 border-success text-center">
<th class="border border-3 border-success">PRODUCT IMAGE</th>	
<th class="border border-3 border-success">PRODUCT NAME</th>	
<th class="border border-3 border-success">COMPANY</th>
<th class="border border-3 border-success">NO OF ITEMS</th>	
<th class="border border-3 border-success">SIZE</th>	
<th class="border border-3 border-success">ITEM PRICE</th>	
<th class="border border-3 border-success">TOTAL</th>
<th class="border border-3 border-success">ACTION</th>
</tr>
  </thead>
  <tbody>
<?php

  while ($row=mysqli_fetch_array($query))
   {
    $fetch=$row['ID'];
    $fetchq="SELECT * FROM inventory WHERE productid LIKE $fetch";
    $qf=mysqli_query($con,$fetchq);
    $ans=mysqli_fetch_array($qf);
    
?>
<tr class="text-center" >
<td class="border border-3 border-success"><img class="border border-2 border-secondary border-radius-3" style="height: 250px; width: 220px;" src="images/<?php echo $row['images'] ?>" alt="<?php echo $row['images'] ?>"/></td>
<td class="border border-3 border-success"><?php echo "$row[title]"; ?></td>	
<td class="border border-3 border-success"><?php echo "$row[brandname]"; ?></td>	
<td class="border border-3 border-success text-center">
  <form action="" method="post">
    <input type="number" style="width: 60px; border: none;" name="modquantiti" class="iquantity" onchange="subtotal(),qty(this.value,<?php echo $ans['balance']?>)" min="1" max="10" value="<?php echo $row['quantiti'];?>" disabled/>
  </form>
</td>
<td class="border border-3 border-success "><?php echo "$row[size]"; ?></td>

<td class="border border-3 border-success"><?php echo $total=$row['prize'];?><input type="hidden" class="iprice" value="<?php echo "$row[prize]";?>" ></td>	
<td class="border border-3 border-success itotal"></td>	
<td class="border border-3 border-success"><a href="cartdel.php?deleid=<?php echo $row['id']; ?>" onclick="return confirm('DO YOU REALLY WANT TO DELETE....?');"><i class="fa fa-trash fa-delete" aria-hidden="true"></i></a></td>		
 <form action="" method="post">
    <input type="hidden" name="productid" value="<?php echo "$row[productid]"; ?>">  
    </form> 

</tr>
<?php
$alltotal+=$total;

  } ?> 
</table>
</div>
<div class="container text-center pb-5">
  <div class="row">
   
    <div class="col">
    
    </div>
    <div class="col border border-2 border-secondary bg-light" style="  border: 1px solid; padding: 10px; box-shadow: 5px 10px 8px 10px #888888;">
    <h4 style="font-family: 'Kenia', cursive; font-weight: bolder;" >GRAND TOTAL:</h4>
    <h5 class="text-center" id="gtotal"><?php echo number_format($alltotal,2);?></h5>
  <br>
  <form>
    <input type="radio" class="form-check-input" name="flexRadioDefault" id="flexRadioDefault2" checked>
    <label class="form-check-label" for="flexRadioDefault2">CASH ON DELIVERY</label>
</form>
    </div>
    <div class="col">
      
    </div>
  </div>
</div>
<button type="submit" href="#" style="margin-left: 600px;" class="popup btn btn-primary text-center mb-4" name="sub" id="close">PROCEED TO BUY</button></a>



<?php
  while ($row=mysqli_fetch_array($sql))
   {
?> 
 <div class="maincal">
 <div class="container popup bg-light kollada" id="popup">
<form method="post" class="m-5" >
<h1 class="fw-bold text-secondary pt-5" style="text-align: center; font-family " >ENTER YOUR DETAILS</h1>
    <div class="row ">
    <div class="col  mt-4 fs-4 text-danger">
      <input type="text" class="form-control" value="<?php echo "$row[fullname]"; ?>" placeholder="NAME" name="uname" disabled required>
    </div>
    <div class="col  mt-4 fs-4 text-danger">
      <input type="number" class="form-control" value="<?php echo "$row[pnum]"; ?>" placeholder="MOBILE NO" name="mobno" disabled required>
    </div>
  <div class=" col mt-4 fs-4 text-danger">
    <input type="email" class="form-control" value="<?php echo "$row[email]"; ?>"  placeholder="EMAIL" name="email" disabled required >
  </div>
    </div>
<div class="row ">
  <div class="col mt-4 fs-4 text-danger">
  <input type="text"  style="width: 790px;" class="form-control" id="data" value="<?php echo "$row[address]"; ?>" placeholder="ADDRESS" name="address" disabled required >
  <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">change address</button>
</div>
  
</div>
<br><br>
<a href="#" onclick="hide('popup')">
  <button type="submit" style="margin-left: 480px;" class="btn btn-outline-primary " name="sub">BUY NOW</button></a>
</form>
<?php } ?>
<br><br>

   <?php  } else { ?>
    
    <hr/>
    <h3 class="text-center">You cart is empty.</h3>
    <?php  } ?> 
   </div>
 </div>
    

<script>
  var gt=0;
  var iprice=document.getElementsByClassName('iprice');
  var iquantity=document.getElementsByClassName('iquantity');
  var itotal=document.getElementsByClassName('itotal');
  var gtotal=document.getElementById('gtotal');

  function subtotal()
  {
    gt=0;
    for(i=0;i<iprice.length;i++)
    {
      itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);

      gt=gt+(iprice[i].value)*(iquantity[i].value);
    }
    gtotal.innerText=gt;
  }

  subtotal();
</script>

  <!--bootstrap js-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="/js/bootstrap.js">


    </script>
    <?php include_once('footer.php');?>
<script>
  function changeAddr(){
    document.getElementById("mymodal").style.display='block';
  }
  function saveaddr(){
    $new=document.getElementById("newaddr").value;
    document.getElementById("data").value=$new;

  }
</script>
<script>
$(document).ready(function(){
  $(".popup").click(function(){
    $('.maincal').show(1000);
    $('#close').hide(100);
  });
});
function mainload(){
  $('.maincal').hide();
 
}
function qty(a,b){
if(a<=b){
  document.getElementById('btn-add').style.display = 'none';
          alert("out of stock");
          $('#close').hide(100);
}else{
  document.getElementById('btn-add').style.display = 'block';

}
}
</script>
</body>
</html>
