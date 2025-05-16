<?php
session_start();
error_reporting(0);
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,'project'); 

if (strlen($_SESSION['bis']=="0")) {
    header('location:logout.php');
    } else{ 

  if(isset($_POST['fsearch']))  {

      

       if(isset($_POST['category'])){
        $category =$_POST['category'];
        
        $qry = "SELECT * FROM products WHERE category='$category'";
        $result = mysqli_query($con, $qry);
       }
  
  }else{
    $qry = "SELECT * FROM products";
    $result = mysqli_query($con, $qry);
  }
  if(isset($_POST['psubmit']))
  {
    $psearch= $_POST['psearch'];
    $result = mysqli_query($con,"SELECT * FROM products WHERE title LIKE '%$psearch%' OR brandname LIKE '%$psearch%'");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="descript.css">

</head>
<body>
<?php include_once('header1.php');?>
                <div class="container">
                <div class="row">
                <?php
            while ($row=mysqli_fetch_array($result)){
        ?>
            <div class="col-md-3 mt-3">
        
                <div class="card text-center mt-3 mb-3 bg-secondary border border-3 border-dark" style="width: 17rem;">
                    <img class="card-img-top m-4 border border-4 border-dark" src="images/<?php echo $row['images']?>" alt="<?php echo $row['images']?>" style="width: 220px; height: 250px;"/>
                    <div class="card-body">
                        <a href="descripts.php?viewid=<?php echo $row['ID'];?>" class="thirdd" style="text-decoration:none">
                        <h4 class="card-title text-white"> <?php echo "$row[title]";?><br></h4>
                        <p class="card-text text-white"> Rs. <?php echo "$row[prize]";?><br> </p>
                        <h7 class="text-white"><?php echo "$row[brandname]";?><br></h7>
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        
    </div>
    <?php include_once('footer.php');?>
     <!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

<script src="/js/bootstrap.js">

    </script>

</body>
</html>
<?php }?>