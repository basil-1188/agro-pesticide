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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>INVENTORY LIST</title>
</head>
<body>
<?php include_once('sidebarr.php');?>
  <h1 class="fw-bold text-secondary mb-4" style="text-align: center; font-family " >MANAGE COMPANY</h1>
    <div class="container ">
    <table class="table bg-light text-dark mt-5 border border-5 border-danger" style="  border: 1px solid; padding: 10px; box-shadow: 5px 10px 8px 10px #888888;">
  <thead>
    <tr class="">
      <th scope="col" class="">ID</th>
      <th scope="col" class="">COMPANY NAME</th>
      <th scope="col" class="">IMAGE</th>
      <th scope="col" class="">ADDRESS</th>
      <th scope="col" class="">EMAIL</th>
      <th scope="col" class="">PHONE</th>
      <th scope="col" class="">NO OF ITEMS</th>
    </tr>
  </thead>
  <tbody>
    <?php
  $query="SELECT * FROM `inventory`";
  $num=mysqli_query($con,$query);
     while($row=mysqli_fetch_array($num))
            {
             ?>

            <tr class="">
                <th scope="row"> <?php echo "$row[ID]";?></th>
                <td class=""> <?php echo "$row[companyname]";?></td>
                <td class=""> <img class="border border-2 border-secondary border-radius-3" style="height: 120px; width: 120px;" src="images/<?php echo $row['cimage']?>" alt="<?php echo $row['cimage']?>"/></td>
                <td class=""> <?php echo "$row[address]";?></td>
                <td class=""> <?php echo "$row[email]";?></td>
                <td class=""> <?php echo "$row[phone]";?></td>
                <td class=""> <?php echo "$row[noofitem]";?></td>
            </tr>
            <?php
            }
             ?>
  </tbody>
</table>
    </div>
    <?php include_once('footer.php');?>

</body>
</html>
