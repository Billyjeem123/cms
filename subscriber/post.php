<?php include("includes/header.php") ?>
<div id="wrapper">


    <?php include("includes/nav.php") ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Create Post
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Create post
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <?php
                $posts = new Posts;
                
            if (isset($_POST['submit'])) {
                $title = $_POST['title'];
                $username = $_POST['username'];
                $desc = $posts->escape_string($_POST['desc']);
                $imagename = $_FILES['image']['name'];
                $iamgetype = $_FILES['image']['type'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $foldername = "../admin/images/" . $imagename;
                move_uploaded_file($file_tmp, $foldername);

                $type = "BlogPosts";

                $status = 2;


                $savePosts = $posts->savePost($title, $imagename, $_SESSION['name'], $desc, $type, $status);

                if($savePosts){

                    echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Invalid',
                        text:  'Posts created.You would be notified upon approval'
                    })
                </script>";
                }else{

                    echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid',
                        text:  'Unable to perform query'
                    })
                </script>";
                }
             
        
             
            }


              ?>

                <?php 
                if(!isset($_SESSION['msg'])){
                    $_SESSION['msg'] = null;
                }else{?>
                    <div class="alert alert-success d-none" role="alert">
                <h4 class="alert-heading"><?php echo $_SESSION['msg']  ?></h4>

                </div>
                <?php }
                ?>


            <form action="" method="post" enctype='multipart/form-data'>

                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <input type="hidden" name="username" class="form-control" value="<?php echo $_SESSION['name'] ?>" >
                </div>

                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="desc" id="" class="form-control" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary p-0 m-0">Submit</button>
                </div>

            </form>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>