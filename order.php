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
    <title>MY ORDERS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="descript.css">
</head>
<body>
<?php include_once('header2.php');?>
<h1 class="fw-bold text-secondary text-center mt-3 text-decoration-underline" style="font-family: 'Kenia', cursive;" >MY ORDERS</h1>
<h4 class="m-5" ><a href="index1.php" style="text-decoration: none;" >BACK <i class="fas fa-backward"></i></a></h4>
<div class="container">
<table class="table table-dark table-hover">
  <thead>
    <tr class="text-center">
<th>#</th>	
<th>ORDER ID</th>
<th>USER NAME</th>	
<th>ORDER DATE TIME</th>	
<th>ORDER DETAILS</th>	
<th>ORDER STATUS</th>	
</tr>
  </thead>
  <tbody class="text-center">
    <tr >
   <?php $userid= $_SESSION['bis'];
 $query=mysqli_query($con,"SELECT details.orderid,details.ordertime,details.orderfinalstatus,ulogins.fullname 
 FROM details JOIN ulogins ON details.userid = ulogins.ID WHERE `userid`='$userid'");
$sl=1;
              while($row=mysqli_fetch_array($query))
              { ?>
	<td><?php echo $sl;?></td>
<td><?php echo $row['orderid'];?></td>
<td><?php echo $row['fullname'];?></td>
<td> <?php echo $row['ordertime']?></td>
<td><a href="orderdetail.php?orderid=<?php echo $row['orderid'];?>" style="text-decoration: none;" >VIEW DETAILS</a></td>
<td><?php echo $row['orderfinalstatus'];?></td>	
    </tr>
    <?php $sl=$sl+1; } ?>
</table>

</div>
<?php include_once('footer.php');?>

<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="/js/bootstrap.js">

    </script>
</body>
</html>