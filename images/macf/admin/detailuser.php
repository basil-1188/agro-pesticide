<?php
session_start();
error_reporting(0);
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,'project');
$uid=$_GET['showid'];
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
        <h2 class="mt-3 mb-5 fw-bold" style="text-align: center;" >USER DETAILS</h2>

        <?php

$sql=mysqli_query($con,"SELECT * FROM `ulogins` WHERE `ID`='$uid'");
while ($row=mysqli_fetch_array($sql)) {

?>
<table class="table table-dark table-striped mt-5 mb-5 text-center" style="  border: 1px solid; padding: 10px; box-shadow: 5px 10px 8px 10px #888888;">
    <tr>
        <th class="border border-light text-info">FULL NAME</th>
        <td style="color: #ffc107;" ><?php  echo $row['fullname'];?></td>
    </tr>
    <tr>
        <th class="border border-light text-info">PHONE NUMBER</th>
        <td style="color: #ffc107;" ><?php  echo $row['pnum'];?></td>
    </tr>
    <tr>
        <th class="border border-light text-info">REGIETERED DATE</th>
        <td style="color: #ffc107;" ><?php  echo $row['regdate'];?></td>
    </tr>
    <tr>
        <th class="border border-light text-info">EMAIL</th>
        <td style="color: #ffc107;" ><?php  echo $row['email'];?></td>
    </tr>
        </table>
        <?php } ?>
    </div>
    <?php include_once('footer.php');?>




<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="/js/bootstrap.js">

  </script>
</body>
</html>