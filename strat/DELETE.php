<?php
 $servername = "localhost"; 
  
 // In my case, user name will be root 
 $username = "root"; 
 

 $password = ""; 
 $dbName="estrada";
 $conn=mysqli_connect($servername,$username,$password,$dbName);

 if(isset($_POST['iddelte'])){
    $id=$_POST['iddelte'];
    
  $delete="DELETE FROM `developers` WHERE id ='$id' " ;
  mysqli_query($conn,$delete);
header("location:index.php");
  }


?>