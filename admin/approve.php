<?php  
include("includes/header.php");
 session_start();
 $posts = new Posts;

 $id = $_GET['id'];

 $sql = " UPDATE tblposts SET status = 1 WHERE id = ' $id' ";
 $query = $posts->query($sql);
 header('location:pendingPosts.php');


  


?>