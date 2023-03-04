<?php include("includes/header.php")  ?>
<div id="wrapper">


    <?php include("includes/nav.php")  ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        All Posts
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> App Posts
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="container">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>catname</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $post = new Posts;
                        $fetch = $post->fetchAllCategory();
                        $rows = $post->checkRows($fetch);
                        if ($rows === 0) {

                            echo "<h1>No Category Available</h1>";
                        } else {
                            while ($row = mysqli_fetch_assoc($fetch)) {
                        ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                </tr>

                        <?php
                            }
                        }
                        ?>



                    </tbody>
                </table>
            </div>

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