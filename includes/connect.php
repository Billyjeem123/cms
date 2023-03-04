

<?php


$localhost = "localhost";
$password = "";
$username = "root";
$db_name=  "cms_gallery";

 $connect = mysqli_connect($localhost, $username, $password, $db_name);

 if($connect){

   //  echo "Connected sucssfully";
 }else{

    echo "Unable to connect to the database";
 }






?>