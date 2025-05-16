<?php
session_start();
error_reporting(0);
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,'project');
    if(isset($_POST['sub']))
    { 
        $user=$_POST['user'];
        $fullname=$_POST['fullname'];
        $pass=$_POST['pass'];
        $pnum=$_POST['pnum'];
        $email=$_POST['email'];
        $address = $_POST['address'];
        $ret=mysqli_query($con,"SELECT user FROM ulogins WHERE user='$user' || pnum='$pnum'");
        $result=mysqli_fetch_array($ret);
        if($result>0)
          {
            echo "<script>alert('THIS ID OR PHONE NUMBER IS ALREADY EXISTED')</script>";
          }
        else
          {
            $query=mysqli_query($con, "INSERT INTO `ulogins`(`fullname`, `user`, `pass`, `pnum`, `email`, `address`) 
            VALUES ('$fullname','$user','$pass','$pnum','$email','$address')");   
          if($query) 
            {
              echo "<script>alert('YOUR ACCOUNT HAS BEEN SUCCESSFULY REGISTERED')</script>";      
            }
            else
            {
            echo "<script>alert('SOMETHING WENT WRONG')</script>";
            }
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
    <title>REGISTRATION</title>
</head>
<body>
<div class="container text-center">
  <div class="row">
    <div class="col">
    </div>
    <div class="col mt-5">
    <form method="post" class="mt-3" action="" >
      <img src="images\registration.jpg" alt="login" class="rounded mt-3 mb-3" style="height: 120px; width: 120px;" >
      <h4 class="mt-3" >SIGN UP </h4>
    <div class="mb-5 mt-5">
    <i class="fas fa-user" > </i>:
  <input type="text" placeholder="USER NAME" name="user" class=" no-outline text-center" required >
  </div>
  <div class="mb-4 mt-5">
  <i class="fas fa-lock"></i>:
    <input type="password" placeholder="PASSWORD" id="password" name="pass" class="no-outline text-center" required><i id="show-password" style="opacity: 0.5;" class="fas fa-eye"></i>
  </div>
  <div class="mb-4 mt-5">
  <i class="fas fa-file-signature"></i>:
    <input type="text" placeholder="FULL NAME" name="fullname" class="no-outline text-center" required>
  </div>
  <div class="mb-4 mt-5">
  <i class="fas fa-phone"></i>:
    <input type="text" placeholder="PHONE NUMBER" name="pnum" pattern="[0-9]{10}" class="no-outline text-center" required>
  </div>
  <div class="mb-4 mt-5">
  <i class="fas fa-at"></i>:
  <input type="text" placeholder="EMAIL" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="no-outline text-center" required>
  </div>
  <div class="mb-4 mt-5">
  <i class="fas fa-address-card"></i>:
  <input type="text" placeholder="ADDRESS,CITY,LANDMARK" name="address" class="no-outline text-center" required>
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