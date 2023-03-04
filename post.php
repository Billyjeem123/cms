<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" contennt="">
    <title>Post-details</title>

    <!-- Bootstrap Core CSS -->
    <link href="/cms/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/cms/css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <?php include('admin/modules/init.php')  ;
    
    session_start();
    ?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/cms/index.php">Boomerang</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <?php 
                    if(!isset($_SESSION['name'])){

                        echo "
                        <li>
                        <a href='/cms/login.php'>Login</a>
                    </li>";
                    }else{

                        echo "
                        <li>
                        <a href='/cms/logout.php'>Logout</a>
                    </li>";
                    }

                    ?>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->
                <?php
              $posts = new  Posts;
              $posts->updateViews($_GET['id']);

                $getById = $posts->getPostById($_GET['id']);
                foreach ($getById as $key => $allPosts) {

                ?>

                    <!-- Title -->
                    <h1> <a href="#"><?php echo  $allPosts['title']  ?></a></h1>

                    <!-- Author -->
                    <p class="lead">
                        by <a href="#"><?php echo  $allPosts['username']  ?></a>
                    </p>

                    <hr>

                    <!-- Date/Time -->
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo  $allPosts['date']  ?></p>

                    <hr>

                    <!-- Preview Image -->

                    <?php
                if($allPosts['type'] === "ApiPosts"){

                    echo"<img class='img-responsive' src='$allPosts[image]' alt=''>";
                    
                }else{
                    
                    echo"<img class='img-responsive' src='/cms/admin/images/$allPosts[image]' alt=''>";
                }

                ?>

                    <hr>

                    <!-- Post Content -->
                    <p class="lead">
                        <?php echo  $allPosts['body'] ?>
                    </p>

                    <hr>'
                <?php     } ?>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="POST">

                        <?php



                        if (isset($_POST['submit'])) {

                            $createComment =  $posts->createComment($_POST['postid'], $_POST['body'], time(), $_POST['username']);
                            if ($createComment) {
                                # code...
                                echo "Comment created";
                            } else {
                                # code...
                                echo "Unable to process requests";
                            }
                        }

                        ?>
                        <div class="form-group">
                            <input type="hidden" name="postid" value="<?php echo $_GET['id']  ?>">
                            <input type="hidden" name="username" value="<?php echo $_SESSION['name']  ?? 0?>">
                            <textarea class="form-control" rows="3" name="body"></textarea>
                        </div>

                        <?php 
                        if(!isset($_SESSION['name'])){
                           
                            $page = (empty($_SESSION['page'])) ? (0) : $_SESSION['page'];
                            echo "<a href='/cms/login.php?redirect=$page&&id=$_GET[id]&&title=$_GET[title]' class='btn btn-primary'>Login to continue</a>";

                        }else{

                            echo "<button type='submit'  name='submit' class=btn btn-primary'>Create</button>";


                        }


  ?>
                        
            <!-- <button type="button" name="submit" class="<?php // if (!empty($_SESSION['userid']) && $_SESSION['userid'])?>"  id="commentHere" class="btn btn-primary">Submit</button> -->
                    </form>
                </div>

                <hr>
                

                <div class="media">
                    <?php

                    $posts = new Posts;

                    $getCommentPost = $posts->getCommentPost($_GET['id']);
                    $rows = $posts->checkRows($getCommentPost);
                    if ($rows === 0) {

                        echo "<h1>No comment Available</h1>";
                    } else {

                        foreach ($getCommentPost as $key => $value) {
                    ?>
                            <a class="pull-right" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $_SESSION['name'] ?? 0 ?>
                                    <small> <?php echo   date("D d M, Y: H", $value['time']) ?> </small>
                                </h4>
                                <?php echo $value['body']  ?>
                            </div>
                    <?php   }
                    }
                    ?>
                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                           <?php 
                            $posts = new Posts;

                            $allcategory = $posts->getAllCategories();
                           while ($row = mysqli_fetch_assoc($allcategory)) {

                            echo  "<li>$row[name]</li>";
                            # code...
                           }

                            ?>
                                
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <?php  include('modal.php')  ?>

    <!-- jQuery -->
    <script src="/cms/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/cms/js/bootstrap.min.js"></script>


    <script>
		$(document).ready(function(){

			$("#commentHere").click(function() {

				// alert("k")
				if (!$(this).hasClass('PaypalLogin')) {
					$('#loginModal').modal('show');
				} else {
					(window.location.href = 'payment.php');
					// alert('online')
				}
			});

		})
	</script>


</body>

</html>