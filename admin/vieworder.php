<?php
session_start();
error_reporting(0);
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,'project');

if(isset($_POST['submit']))
  {
    
   $uid=$_GET['showid'];
    $bcsta=$_POST['status'];
    $query=mysqli_query($con, "UPDATE details SET orderfinalstatus='$bcsta' WHERE orderid='$uid'");
    if ($query) 
    {
        echo "<script>alert('ORDER HAS BEEN UPDATED')</script>";

  }
  else
    {
        echo "<script>alert('SOMETHING WENT WRONG')</script>";
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
    <link rel="stylesheet" href="descript.css">
    <title>USER DETAILS</title>
</head>
<body>
<?php include_once('sidebarr.php');?>
    <div class="container">
        <h2 class="mt-3 mb-5 fw-bold" style="text-align: center;" ><?php echo $_GET['orderid'] ?>ORDER DETAILS</h2>

        <?php
$uid=$_GET['showid'];
$sql=mysqli_query($con,"SELECT * FROM `details` JOIN `ulogins` ON ulogins.ID=details.userid WHERE details.orderid='$uid' ");
while ($row=mysqli_fetch_array($sql)) {

?>
<table class="table table-dark table-striped mt-5 mb-5 text-center" style="  border: 1px solid; padding: 10px; box-shadow: 5px 10px 8px 10px #888888;">
    <tr>
        <th class="border border-light text-info">ORDER NO</th>
        <td style="color: #ffc107;" ><?php  echo $row['orderid'];?></td>
    </tr>    
    <tr>
        <th class="border border-light text-info">FULL NAME</th>
        <td style="color: #ffc107;" ><?php  echo $row['fullname'];?></td>
    </tr>
    <tr>
        <th class="border border-light text-info">PHONE NUMBER</th>
        <td style="color: #ffc107;" ><?php  echo $row['pnum'];?></td>
    </tr>
    <tr>
        <th class="border border-light text-info">EMAIL</th>
        <td style="color: #ffc107;" ><?php  echo $row['email'];?></td>
    </tr>
    <tr>
        <?php
        if($row['aaddress']=="1")
        {
            ?>
             <th class="border border-light text-info">ADDRESS</th>
            <td style="color: #ffc107;" ><?php echo $row['address'] ?></td>
            
            <?php
        }
        else
        { 
            ?>
           <th class="border border-light text-info">ADDRESS</th>
            <td style="color: #ffc107;" ><?php echo $row['aaddress'] ?></td>
       <?php
        }
        ?>
    </tr>
    <tr>
    <tr>
        <th class="border border-light text-info">ORDER DATE</th>
        <td style="color: #ffc107;" ><?php  echo $row['ordertime'];?></td>
    </tr>
    <tr>
        <th class="border border-light text-info">ORDER FINAL STATUS</th>
        <td style="color: #ffc107;">
        <?php 
        $orserstatus= $row['orderfinalstatus'];
        if($row['orderfinalstatus']=="Accepted")
        {
                echo "ORDER ACCEPTED";
        }
        if($row['orderfinalstatus']=="")
        {
                echo "WAITING FOR FOR APPROVAL";
        }
        if($row['orderfinalstatus']=="Delivered")
        {
                echo "ORDER DELIVERED";
        }
        if($row['orderfinalstatus']=="On the way")
        {
                echo "ORDER ON THE WAY";
        }
        if($row['orderfinalstatus']=="Cancelled")
        {
                echo "ORDER CANCELLED";
        }
        ?></td>
    </tr>

        </table>
        <?php }?>
  
        
<?php
        $query = mysqli_query($con, "SELECT products.images,products.title,products.size,products.prize,products.brandname,cart.productid,cart.quantiti FROM cart JOIN products ON products.ID=cart.productid WHERE cart.orderid='$uid' AND cart.isorderplaced =1");
        $num = mysqli_num_rows($query);
        ?>
          <table class="table border border-5 border-success bg-light " style="  border: 1px solid; padding: 10px; box-shadow: 5px 10px 8px 10px #888888;">
  <thead>
    <tr class=" text-center">
<th >PRODUCT IMAGE</th>	
<th >PRODUCT NAME</th>	
<th >COMPANY</th>	
<th>QUANTITY</th>
<th >SIZE</th>		
<th >PRIZE</th>	
</tr>
  </thead>
  <tbody>
<?php
  while ($row = mysqli_fetch_array($query)) {
?>

<tr class="text-center" >
<td ><img class="border border-2 border-secondary border-radius-3" style="height: 150px; width: 120px;" src="images/<?php echo $row['images'] ?>" alt="<?php echo $row['images'] ?>"/></td>
<td ><?php echo "$row[title]"; ?></td>	
<td ><?php echo "$row[brandname]"; ?></td>
<td ><?php echo "$row[quantiti]"; ?></td>
<td ><?php echo "$row[size]"; ?></td>	

<td ><?php echo "$row[prize]";?></td>	

</tr>
<?php
  } ?>
</table>
<?php if($orserstatus=="Accepted" || $orserstatus=="On the way" ||  $orserstatus=="" ){ ?> 

<table class="table table-info table-striped mt-5 mb-5 text-center" style=" height: 200px; width: 200px; margin-left: 400px; border: 1px solid; padding: 10px; box-shadow: 5px 10px 8px 10px #888888;"">
   <form name="submit" method="post">

<tbody>
<tr>
   <td scope="col" colspan="1" >STATUS:</td>
   <td scope="col" colspan="1">
       <select style="width: 190px; margin-left: 50px;" name="status" class="form-control" required>
           <option value="Accepted" selected>ORDER ACCEPTED</option>
           <option value="On the way">ORDER ON THE WAY</option>
           <option value="Delivered">ORDER DELIVERED</option>
           <option value="Cancelled">ORDER CANCELLED</option>
       </select>
   </td>
</tr>
<tr align="center" >
   <td colspan="2"><button type="submit" name="submit" class="btn btn-primary">UPDATE ORDER</button></td>
</tr>
</tbody>  
</form>
<?php } ?>

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