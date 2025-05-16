<?php
    session_start();
    error_reporting(0);
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,'project');
    if(strlen($_SESSION['pnum']==0))
    {
        header('location:ulogin.php');
    }
    else
    {
        if(isset($_POST['sub']))
        {
            $pass=($_POST['password1']);
            $pnum=$_SESSION['pnum'];
           
            $sql=mysqli_query($con,"UPDATE `ulogins` SET `pass`='$pass' WHERE pnum='$pnum'");
            if($sql)
            {
                echo "<script>alert('NEW PASSWORD HAS BEEN UPDATED')</script>";
                echo "<script>window.location.href = 'ulogin.php'</script>";

            }
            else
            {
              echo "<script>alert('PASSWORD HAS NOT BEEN UPDATED')</script>";     
            }
            mysqli_close($con);
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
    <title>RESET</title>
</head>
<body>
<div class="container text-center">
  <div class="row">
    <div class="col">
    </div>
    <div class="col mt-5">
    <form method="post" class="mt-3" action="" onsubmit="return checkPassword" >
      <img src="images\reset.png" alt="login" class="rounded mt-3 mb-3" style="height: 120px; width: 260px;" >
      <h4 class="mt-3" >RESET PASSWORD </h4>
    <div class="mb-5 mt-5">
    <i class="fas fa-user" > </i>:
  <input type="password" placeholder="ENTER NEW PASSWORD" name="password1" id="password" class="no-outline text-center" required ><i id="show-password" style="opacity: 0.5;" class="fas fa-eye"></i>
  </div>
  <div class="mb-4 mt-5">
  <i class="fas fa-lock"></i>:
    <input type="password" placeholder="RE ENTER THE NEW PASSWORD" name="password2" id="password" class="no-outline text-center" required><i id="show-password" style="opacity: 0.5;" class="fas fa-eye"></i>
  </div>

  <button type="submit" class=" button mb-3" name="sub">SUBMIT</button>

            <div class="mb-3 mt-3">
                <h6 class="mb-5"><i class="fas fa-backward"></i> <a href="index.php" style="text-decoration: none;">BACK TO HOME</a></h6>
            </div>
</form>
    </div>
    <div class="col mt-5 mb-4">
    
    </div>
  </div>
</div>
<script type="text/javascript" >
        function checkPassword(form) 
        {
            password1 = form.password1.value;
            password2 = form.password2.value;
               if (password1 != password2) 
               {
                alert ("PASSWORD DID NOT MATCH. PLEASE TRY AGAIN......")
                return false;
            }
            else{
                return true;
            }
        }
      </script>

</body>
</html>