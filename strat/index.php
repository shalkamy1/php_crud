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

  $image_name= rand(0,255). rand(0,255). $_FILES['image']['name'];
  $image_temp=$_FILES['image']['tmp_name'];
  $location="./upload/".$image_name;

move_uploaded_file($image_temp,$location);

  $create="INSERT INTO `developers` VALUES(NULL,'$name','$image_name', '$project','$area','$budget')";
  mysqli_query($conn,$create);
 


}

// //update
// if(isset($_POST['update'])){
//   $id=$_POST['id'];
// $select="SELECT * FROM `developers` WHERE id ='$id' " ;
// $run=mysqli_query($conn,$select);
// $fetch=mysqli_fetch_array($run);
// header("location:index.php");
// }
$devolper_name="";
$devolper_project_name="";
$area="";
$budget="";
if(isset($_GET['edit'])){
  $id=$_GET['edit'];
  $show="SELECT * FROM `developers` where id=$id";
$run=mysqli_query($conn,$show);
$row=mysqli_fetch_assoc($run);
$devolper_name=$row['name'];
$devolper_project_name=$row['project_name'];
$area=$row['area'];
$budget=$row['budget'];
if(isset($_POST['update'])){
  $name=$_POST['devname'];
  $project=$_POST['ProjectName'];
  $area=$_POST['area'];
  $budget=$_POST['budget'];
  $updat="UPDATE developers set `name`='$name' , project_name='$project' , area='$area' ,  budget='$budget' where id=$id";
 $u= mysqli_query($conn,$updat);
 if($u){
  header("location: index.php");
 }
}

}

if(isset($_POST['deleteall'])){
$deleteall="DELETE FROM `developers` ";
mysqli_connect($conn,$deleteall);

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
      <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="">devolper Name</label>
        <input type="text" name="devname" value="<?=  $devolper_name ?>" class="form-control"> </div>  

        <div class="form-group">
        <label for="">devolper project name</label>
        <input type="text" name="ProjectName" value="<?=$devolper_project_name ?>"  class="form-control"> </div>

        <div class="form-group">
        <label for="">area</label>
        <input  name="area" class="form-control" value="<?=$area ?>"  type="number"> </div>

        <div class="form-group">
        <label for="">budget</label>
        <input  name="budget" class="form-control" value="<?=$budget ?>"  type="number"> </div>
        <div class="form-group">
        <label for="">image</label>
        <input type="file" name="image" class="form-control"   > </div>

        <div class="d-grid">
          <?php if(isset($_GET['edit'])):?>
          <button class="btn btn-warning" name='update'>update</button>
         
          <?php else:?>
            <button class="btn btn-info" name='send'>create</button>
            <?php endif;?>
        </div>
      </form>

    </div>
  </div>



 </div>
 <?php
$select="SELECT * FROM `developers`";
$data=mysqli_query($conn,$select);
$index=1;
?>

<div class="container col md-5">
<h1 class="text-center text-primary">list all employees</h1>
<div class="card">
<div class="form-grop">
  <form action="./search.php" method='post'>
      <input name="search" type="text" class="form-control" placholder="search by name">
      <button name="searchBtn" class="btn btn-info">search</button>
      </form>
    
    </div>
    <form action="deleteall.php" method="POST">
    <button class="btn btn-danger btn-lg" name="deleteall" > delete all</button>
    </form>
   
  <div class="card-body">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Develper image</th>
      <th scope="col">ProjectName</th>
      <th scope="col">area</th>
      <th scope="col">budget</th>
      <Th scope="col"></Th>
      <th scope="col">veiw</th>
      <Th scope="col"></Th>
      <th  scope="col">Delete</th>
      <th  scope="col">Update</th>
     
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $item) :?>
        <tr>
      <td ><?=$index++ ?> </td>
      <td><?= $item['name']?></td>
      <td><img width="50" src="./upload/ <?= $item['image']?>" alt=""></td>
      <td><?= $item['project_name']?></td>
      <td><?= $item['area']?></td>
      <td> <?= $item['budget']?></td>
      <form action="veiw.php" method="post">
      <td><input type="hidden" class="btn btn-danger" name="idveiw" value="<?= $item['id'] ?>"></td>
       <td> <input type="submit" class="btn btn-info" value="veiw" name="veiw" ></td>
       </form>
      <form action="delete.php" method="post">
      <td><input type="hidden" class="btn btn-danger" name="iddelte" value="<?=  $item['id'] ?>"></td>
       <td> <input type="submit" class="btn btn-danger" value="delete" name="delete" ></td>
      </form>
      <td><a href="index.php?edit=<?= $item['id']?>" class="btn btn-primary">update</a></td>
    </tr>
    <?php endforeach ;?>
    

  
  
    
    
  </tbody>
</table>
  </div>
</div>

</div>


 
  <!-- Bootstrap -->
  <script src="./js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>