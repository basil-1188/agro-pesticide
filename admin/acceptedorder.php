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
    <title>USER DETAILS</title>
</head>
<body class="bg-light">
<?php include_once('sidebarr.php');?>

    <div class="container mb-5">
        <h2 class="fw-bolder mt-4 mb-4" style="text-align: center;" >ACCEPTED ORDERS</h2>
    <table class="table table-dark table-striped-columns mt-5 text-center" style="  border: 1px solid; padding: 10px; box-shadow: 5px 10px 8px 10px #888888;">
    <thead>
    <tr>
      <th scope="col">SL.NO</th>
      <th scope="col">ORDER NO</th>
      <th scope="col">ORDER DATE</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <?php
  $res=mysqli_query($con,"SELECT * FROM `details` WHERE `orderfinalstatus` = 'Accepted'");
$sl=1;
while ($row=mysqli_fetch_array($res)) {

?>
  <tbody class="text-warning">
    <tr class="text-warning">
        <td scope="col"><?php echo $sl; ?></td>
        <td scope="col" class="text-warning"><?php  echo $row['orderid'];?></td>
        <td scope="col"class="text-warning"><?php  echo $row['ordertime'];?></td>
        <td scope="col"><a href="vieworder.php?showid=<?php echo $row['orderid']; ?>" style="text-decoration: none;">VIEW DETAILS</a></td>
    </tr>
    <?php $sl = $sl + 1;
} ?>
  </tbody>
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