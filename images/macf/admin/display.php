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
    <title>Document</title>
</head>
<body>
<?php include_once('sidebarr.php');?>
  <h1 class="fw-bold text-secondary" style="text-align: center; font-family " >MANAGE PRODUCTS</h1>
    <div class="container text-dark mt-3 mb-5">
    <table class="table table-striped" style="  border: 1px solid; padding: 10px; box-shadow: 5px 10px 8px 10px #888888;">
  <thead>
    <tr >
      <th scope="col" >ID</th>
      <th scope="col" >TITLE</th>
      <th scope="col" >PRIZE</th>
      <th scope="col" >BRANDNAME</th>
      <th scope="col" >DESCRIPTION</th>
      <th scope="col" >SIZE</th>
      <th scope="col" >AMOUNTS</th>
      <th scope="col" >OPERATIONS</th>
    </tr>
  </thead>
  <tbody>
    <?php
  $query="SELECT * FROM products ";
  $num=mysqli_query($con,$query);
        if($num)
        {
            while($row=mysqli_fetch_assoc($num))
            {
                $ID=$row['ID'];
                $title=$row['title'];
                $prize=$row['prize'];
                $brandname=$row['brandname'];
                $descriptions=$row['descriptions'];
                $size=$row['size'];
                $amounts=$row['amounts'];
                echo '

            <tr >
                <th scope="row">'.$ID.'</th>
                <td >'.$title.'</td>
                <td >'.$prize.'</td>
                <td >'.$brandname.'</td>
                <td >'.$descriptions.'</td>
                <td >'.$size.'</td>
                <td >'.$amounts.'</td>
                <td >
                <button class="btn btn-success mb-2"><a href="update.php?updateid='.$ID.'" class="text-light" style="text-decoration: none;" >UPDATE</a></button> <br>
                <button class="btn btn-warning"><a href="delete.php?deleteid='.$ID.'" class="text-light" style="text-decoration: none;" >DELETE</a></button>
                </td>
            </tr>';
            }
        }
        ?>
  </tbody>
</table>
    </div>
    
    <?php include_once('footer.php');?>
</body>
</html>