<?php
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
    <title>STOCK LIST</title>
</head>
<body>
<?php include_once('sidebarr.php');?>
  <h1 class="fw-bold text-secondary mb-4" style="text-align: center; font-family " >MANAGE STOCK</h1>
    <div class="container ">
    <table class="table bg-light text-dark mt-5 border border-5 border-danger" style="  border: 1px solid; padding: 10px; box-shadow: 5px 10px 8px 10px #888888;">
  <thead>
    <tr class="text-center">
      <th scope="col">SL NO</th>
      <th scope="col">BATCH NO</th>
      <th scope="col">COMPANY NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE</th>
      <th scope="col">PRODUCT NAME</th>
      <th scope="col">NO OF ITEMS</th>
      <th scope="col">TOTAL PRICE</th>
      <th scope="col">PURCHASE DATE</th>
      <th scope="col">EXPIRY DATE</th>
      <th scope="col">BALANCE PRODUCTS</th>
        </tr>
  </thead>
  <tbody>
    <?php
  $query="SELECT products.title,products.brandname,
  inventory.email,inventory.quantities,inventory.totalprice,
  inventory.expirydate,inventory.purchasedate,inventory.phone,inventory.batchid,inventory.balance
   FROM inventory JOIN products ON inventory.productid = products.ID ORDER BY balance ";
  $num=mysqli_query($con,$query);
    $slno = 1;
     while($row=mysqli_fetch_array($num))
            {
             ?>

            <tr class="text-center">
                <th scope="row"> <?php echo "$slno";?></th>
                <td> <?php echo "$row[batchid]";?></td>
                <td> <?php echo $pro=$row['title'];?></td>
                <td> <?php echo "$row[brandname]";?></td>
                <td> <?php echo "$row[email]";?></td>
                <td> <?php echo "$row[phone]";?></td>
                <td> <?php echo "$row[quantities]";?></td>
                <td> <?php echo "$row[totalprice]";?></td>
                <td> <?php echo "$row[purchasedate]";?></td>
                <td> <?php echo "$row[expirydate]";?></td>
                <td> <?php echo $bal=$row['balance'];?></td>
           <?php
            $slno = $slno + 1;
           if($bal<=5){
            echo "<script>alert('$pro')</script>";
           }
           }?> 
            <!-- <?php
            
            if($bal<=10)
          
              echo "<script>alert($pro)</script>";
           ?> -->
  </tbody>
</table>
    </div>
    <?php include_once('footer.php');?>

</body>
</html>
