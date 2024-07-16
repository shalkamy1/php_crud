<?php
 $servername = "localhost"; 
  
 // In my case, user name will be root 
 $username = "root"; 
 

 $password = ""; 
 $dbName="estrada";
 $conn=mysqli_connect($servername,$username,$password,$dbName);

// create
if(isset($_POST['send'])){
  $name=$_POST['devname'];
  $project=$_POST['ProjectName'];
  $area=$_POST['area'];
  $budget=$_POST['budget'];
  $create="INSERT INTO `developers` VALUES(NULL,'$name','$project','$area','$budget')";
  mysqli_query($conn,$create);
}
 
if(isset($_POST['searchBtn'])){
    $searchvalue=$_POST['search'];
    $select="SELECT * FROM `developers` where `name` like '%$searchvalue%' ";
    $data=mysqli_query($conn,$select);
}



 ?>
 


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="./css/bootstrap.min.css" rel="stylesheet" >

  <!-- Font Awesome -->
  

  <title>PHP CRUD Application</title>
</head>

<body>

 <div class="container col-md-6">
<h1 class="text-center text priamry">crud operation </h1>
  <div class="card">
    
    <div class="card-body">
      <form method="POST">
      <div class="form-group">
        <label for="">devolper Name</label>
        <input type="text" name="devname" class="form-control"> </div>  

        <div class="form-group">
        <label for="">devolper project name</label>
        <input type="text" name="ProjectName" class="form-control"> </div>

        <div class="form-group">
        <label for="">area</label>
        <input type="text" name="area" class="form-control" type="number"> </div>

        <div class="form-group">
        <label for="">budget</label>
        <input type="text" name="budget" class="form-control" type="number"> </div>

        <div class="d-grid">
          <button class="btn btn-info" name='send'>create</button>
        </div>
      </form>

    </div>
  </div>



 </div>
 <?php

$index=1;
?>

<div class="container col md-5">
<h1 class="text-center text-primary">list all employees</h1>
<div class="card">
<div class="form-grop">
      <input type="text" class="form-control" placholder="search">
      <button class="btn btn-info">search</button>
    </div>
  <div class="card-body">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">ProjectName</th>
      <th scope="col">area</th>
      <th scope="col">budget</th>
      <th  colspan="2">action</th>
     
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $item) :?>
        <tr>
      <th ><?= $index++;?> </th>
      <td><?= $item['name']?></td>
      <td><?= $item['project_name']?></td>
      <td><?= $item['area']?></td>
      <td> <?= $item['budget']?></td>
      <th><a name="delete" href="index.php?<?=$item['id']  ?>"  class="btn btn-danger"  >delete</a> </th>
      <td><button class="btn btn-primary">update</button> </td>
    </tr>
    <?php endforeach ;?>
    <?php if(isset($_get['delete'])){
  $id=$item['id'];
  
$delete="DELETE FROM `developers` WHERE id = $id ";
mysqli_query($conn,$delete);
}
  ?>
  
    
    
  </tbody>
</table>
  </div>
</div>

</div>


 
  <!-- Bootstrap -->
  <script src="./js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>