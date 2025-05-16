<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con, 'project');
if(isset($_GET['deleteid']))
{
    $ID=$_GET['deleteid'];
    $sql = "DELETE FROM products WHERE ID=$ID";
    $result = mysqli_query($con, $sql);
    if($result)
    {
        header('location:display.php');
    }
    else
    {
        die(mysqli_error($con));
    }
}
