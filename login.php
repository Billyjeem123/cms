<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="includes/style.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>


</head>

<body>
  <?php include('admin/modules/init.php'); ?>


  <?php

  if (isset($_POST['submit'])) {
    $auth = new Auth;
    $posts = new Posts;

    $login = $auth->tryLogin($_POST['username'], $_POST['password']);
    if ($auth->checkRows($login) == 0) {

      echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Invalid',
                text:  'No user found'
            })
        </script>";
    } else {

      $fetch = $auth->fetch($login);
      $dbusername = $fetch['name'];
      $dbrole = $fetch['role'];
      if (isset($_GET['redirect']) || !empty($_GET['redirect'])) {
        $_SESSION['name'] = $dbusername;
        ?>
        <script>window.location = "/cms/post/<?php echo $posts->preetyUrl($_GET['id']) ?>/<?php echo $posts->preetyUrl($_GET['title']) ?>"</script>
      <?php 
    
      } elseif ($dbrole == 'admin') {
        $_SESSION['name'] = $dbusername;
        header('location: admin/index.php');

      } elseif ($dbrole == "user") {
        $_SESSION['name'] = $dbusername;
        header('location: subscriber/index.php');

      } else {

        return false;
      }
    }

  }





  ?>


  <div class="log-form">
    <h2>Login Here</h2>
    <form action="" method="POST">
      <div class="form-group">
        <input type="text" name="username" placeholder="username" class="form-control"> <br>
      </div>

      <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="password">
      </div>

      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary p-0 m-0">Login</button>
      </div>
      <a class="forgot" href="#">Forgot Username?</a>
    </form>
  </div><!--end log form -->
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>

</html>