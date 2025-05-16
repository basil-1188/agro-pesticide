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
    <title>CANCEL</title>
</head>
<body>
    <?php
    $orderid=$_GET['oid'];
$gg = "Cancelled";
    $sql = mysqli_query($con, "UPDATE `details` SET `orderfinalstatus`='$gg'  WHERE `orderid`='$orderid'");

    if ($sql) {
        echo '<script>alert("YOUR ORDER HAS BEEN CANCELLED")</script>';
        echo "<script>window.location.href ='order.php'</script>";
    } else {
        echo "<script>alert('SOMETHING WENT WRONG')</script>";

    }
    ?>
</body>
</html>