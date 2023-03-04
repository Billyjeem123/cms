<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="includes/style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
<!-- <?php include('includes/connect.php');   ?> -->
<?php include('includes/header.php');   ?>


 <?php

 if(isset($_POST['submit'])){
   
    $username =   $_POST['username'];

   $password =   $_POST['password'];



    
    $sql = " INSERT INTO tblusers(name, pword)";
    $sql .= " VALUES('$username ', '$password') ";
    $query =  mysqli_query($connect, $sql);
    if($query){

      // echo "Registration successful";
      header("location:login.php");
    }else{

      echo "Unable to process request";
    }






 }

 


  ?>
    

<div class="log-form">
  <h2>Sign Up Here</h2>
  <form action="" method="POST">
   <div class="form-group">
   <input type="text"  name="username"  placeholder="username"  class="form-control" >  <br> 
   </div>

    <div class="form-group">
    <input type="password"  name="password" class="form-control"  placeholder="password" >
    </div>

   <div class="form-group">
   <button type="submit"  name="submit" class="btn btn-primary p-0 m-0">Register</button>
   </div>
    <a class="forgot" href="#">Forgot Username?</a>
  </form>
</div><!--end log form -->
</body>
</html>