<?php
 $servername = "localhost"; 
  
 // In my case, user name will be root 
 $username = "root"; 
 

 $password = ""; 
 $dbName="estrada";
 $conn=mysqli_connect($servername,$username,$password,$dbName);

 if(isset($_POST['deleteall'])){
    
    
  $deleteall="DELETE FROM `developers` " ;
  mysqli_query($conn,$deleteall);
header("location:index.php");
  }


?>