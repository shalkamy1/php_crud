<?php 
 $servername = "localhost"; 
  
 // In my case, user name will be root 
 $username = "root"; 
 

 $password = ""; 
 $dbName="estrada";
 $conn=mysqli_connect($servername,$username,$password,$dbName);

 if(isset($_POST['idveiw'])){
    $id=$_POST['idveiw'];
    $data="SELECT * FROM `developers`where id='$id'";
  $veiwQyery=mysqli_query($conn,$data);
    $veiw=mysqli_fetch_assoc($veiwQyery);

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
  
<style>
    /*
*
* ==========================================
* FOR DEMO PURPOSE
* ==========================================
*
*/
body {
    background: #e8cbc0;
    background: -webkit-linear-gradient(to right, #e8cbc0, #636fa4);
    background: linear-gradient(to right, #e8cbc0, #636fa4);
    min-height: 100vh;
}

.social-link {
    width: 30px;
    height: 30px;
    border: 1px solid #ddd;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #666;
    border-radius: 50%;
    transition: all 0.3s;
    font-size: 0.9rem;
}

.social-link:hover, .social-link:focus {
    background: #ddd;
    text-decoration: none;
    color: #555;
}
</style>
  <title>PHP CRUD Application</title>
</head>

<body>

<!-- For demo purpose -->
<div class="container py-5">
    <div class="row text-center text-white">
        <div class="col-lg-8 mx-auto">
            <h1 class="display-4">Team Page</h1>
            <p class="lead mb-0">Using Bootstrap 4 grid and utilities, create a nice team page.</p>
            <p class="lead">Snippet by<a href="https://bootstrapious.com/snippets" class="text-white">
                <u>Bootstrapious</u></a>
            </p>
        </div>
    </div>
</div><!-- End -->


<div class="container">
    <div class="row text-center">

        
    <div class="d-flex justify-content-center">
  <div class="p-2">


  
  </div>
</div>


        <!-- Team item -->
        <div class="col-xl-3  col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4"><img src="./upload/<?= $item['image']?>" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0">Tom Sunderland</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
                <ul class="social mb-0 list-inline mt-3">
                    <li class="list-inline-item"><i class=""></i> devolperName: <?= $veiw['name']?></li>
                    <li class="list-inline-item"><i class=""></i> devolperprojectName: <?= $veiw['project_name']?></li>
                    <li class="list-inline-item"><i class=""></i> area: <?= $veiw['area']?></li>
                    <li class="list-inline-item"><i class=""></i> budget: <?= $veiw['budget']?></li>
                </ul>
            </div>
        </div><!-- End -->

        <!-- Team item -->
       
    </div>
</div>
  <!-- Bootstrap -->
  <script src="./js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>