<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="h.css">
    <title>HEADER</title>
</head>
<body>
<div class="superNav border-bottom py-2 text-light" style="height: 70px; background-image: linear-gradient(#507DA4, #39936B);">
  <div class="container" >
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 centerOnMobile mt-3">
      <a class="navbar-brand" style="font-size: 22px;" href="#"><i class="fa-solid fa-shop me-2"></i> <strong>AGRO FERTILIZER & CHEMICAL ONLINE SHOPPING</strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>  
    </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-none d-lg-block d-md-block-d-sm-block d-xs-none text-end mt-3">
        <span class="me-3 text-light"><i class="fas fa-sign-in-alt  me-2"></i><a class="text-light" style="text-decoration:none;" href="ulogin.php">LOGIN</a></span>/
        <span class="me-3 text-light"><i class="fas fa-registered me-2"></i><a class="text-light" style="text-decoration:none;" href="registration.php">REGISTER</a></span>
      </div>
    </div>
  </div>
</div>
<nav class="navbar" style="background-image: linear-gradient(#F3CEF4, #639369);">
  <div class="container">
    <a class="navbar-brand">    <h6 class="fw-bold mt-1 text-center text-dark">CATEGORY</h6>
                 <form  action="index.php" method="POST" class="text-dark">
                    <label class="radio-inline" for="flexRadioDefault1">
                    <h6><input type="radio" name="category" value="C" <?php if(isset($category) && $category=='C'){echo 'checked';} ?> >    
                    CARDAMOM
                    </label>
                    <label class="radio-inline ms-5" for="flexRadioDefault2">
                    <input  type="radio" name="category" value="P" <?php if(isset($category) && $category=='P'){echo 'checked';} ?>>
                    PADDY
                    </label>
                    <label class="radio-inline ms-5" for="flexRadioDefault2">
                    <input  type="radio" name="category" value="O" <?php if(isset($category) && $category=='O'){echo 'checked';} ?> >
                    OTHER COMMODITIES
                    </label></h6>
                
                <div class="text-center">
                <input type="submit" style="width: 100px;" value="SEARCH" name="fsearch" class="form-control mt-3 mb-2 btn btn-light">
                </form>
                </div></a>
    <form class="d-flex" role="search">
    <span class="border-warning input-group-text bg-warning text-white"><i class="fa-solid fa-magnifying-glass"></i></span>
    <form action="index.php" method="POST" class="form-group">
      <input class="form-control me-2 border-warning" type="search" aria-label="Search" name="psearch" required style="color:#7a7a7a">
      <button class="btn btn-success" type="submit" name="psubmit">Search</button>
    </form>
  </div>
</nav>


     <!--bootstrap js-->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="/js/bootstrap.js">

    </script>
</body>
</html>