<?php
session_start();
error_reporting(0);
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,'project');
    if(isset($_POST['sub']))
    {
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        $qry=mysqli_query($con,("SELECT ID FROM ulogins WHERE user='$user'&& pass='$pass'"));
        $sql=mysqli_fetch_array($qry);
        if($sql>0)
        {
            $_SESSION['bis']=$sql['ID'];
            header('location:index1.php');
        }
        else
        {
            echo "<script>alert('WRONG ID OR PASSWORD')</script>";
        }
        mysqli_close($con);
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
    <title>USER LOGIN</title>

</head>
<body>
  
<div class="container text-center">
  <div class="row">
    <div class="col">
    </div>
    <div class="col mt-5">
    <form method="post" class="mt-3" action="" >
      <img src="images\login.png" alt="login" class="rounded mt-3 mb-3" style="height: 120px; width: 120px;" >
      <h4 class="mt-3" >LOGIN HERE </h4>
    <div class="mb-5 mt-5">
    <i class="fas fa-user" > </i>:
  <input type="text" placeholder="USER NAME" name="user" class=" no-outline text-center" required >
  </div>
  <div class="mb-4 mt-5">
  <i class="fas fa-lock"></i>:
    <input type="password" placeholder="PASSWORD" name="pass" id="password" class=" no-outline text-center" required><i id="show-password" style="opacity: 0.5;" class="fas fa-eye"></i>
  </div>
  <button type="submit" class=" button mb-3" name="sub" >LOGIN</button>
  <div class="mt-1 mb-3" >
  <h6><a href="forgot.php" style="font-size:12px; text-decoration: none;" >FORGOT PASSWORD?</a></h6>
  </div>
  <div class="mb-2"> 
                <h6 class="message">Not registered? <a href="registration.php" style="text-decoration: none;" >SIGN UP</a></h6>
            </div>
            <div class="mb-3 mt-3">
                <h6 class="mb-5"><i class="fas fa-backward"></i> <a href="index.php" style="text-decoration: none;">BACK TO HOME</a></h6>
            </div>
</form>
    </div>
    <div class="col mt-5 mb-4">
    
    </div>
  </div>
</div>
  <script>
  const showPassword = document.querySelector
  ("#show-password");
  const passwordField = document.querySelector
  ("#password");

  showPassword.addEventListener("click",function(){
    this.classList.toggle("fa-eye-slash");
    const type = passwordField.getAttribute("type")
    === "password" ? "text" : "password";
    passwordField.setAttribute("type", type);
  })

  </script>
</body>
</html>