<?php include("includes/header.php") ?>
<div id="wrapper">


    <?php include("includes/nav.php") ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Category Page
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Category Page
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <!-- #region -->



            <form action="" method="post">

                <?php
                if (isset($_POST['submit'])) {

                    $posts = new Posts;

                    $create = $posts->createCategory($posts->escape_string($_POST['catname']));

                    if ($create) {

                        echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Valid',
                        text:  'Category created successfully'
                    })
                </script>";
                    } else {

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

                <div class="form-group">
                    <label for="Catname">catname</label>
                    <input type="text" class="form-control" name="catname">
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary p-0 m-0">Submit</button>
                </div>
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