<?php
    session_start();
    error_reporting(0);
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,'project');
    if(isset($_POST['sub']))
    {
        $pnum=$_POST['pnum'];
        $sql=mysqli_query($con,(" SELECT ID FROM ulogins WHERE pnum='$pnum'"));
        $anso=mysqli_fetch_array($sql);
        if($anso>0)
        {
            $_SESSION['pnum']=$pnum;
            header('location:reset.php');
        }
        else
        {
            echo "<script>alert('WRONG DETAILS')</script>";
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
    <link rel="stylesheet" href="th.css">
    <title>CHANGE PASSWORD</title>
</head>
<body>
<div class="container text-center">
  <div class="row">
    <div class="col ">
    </div>
    <div class="col mt-5">
    <form method="post" class="mt-5" action="" >
      <img src="images\forgot.png" alt="login" class="rounded mt-3 mb-3" style="height: 120px; width: 120px;" >
      <h4 class="mt-3" >FORGOT PASSWORD </h4>
    <div class="mb-5 mt-5">
    <i class="fas fa-user" > </i>:
  <input type="text" placeholder="USER NAME" name="user" class="no-outline text-center" required >
  </div>
  <div class="mb-4 mt-5">
  <i class="fas fa-lock"></i>:
    <input type="number" placeholder="PHONE NUMBER" name="pnum" class="no-outline text-center" required>
  </div>

  <button type="submit" class=" button mb-3" name="sub">SUBMIT</button>

         
</form>
    </div>
    <div class="col mt-5 mb-4">
    
    </div>
  </div>
</div>
</body>
</html>