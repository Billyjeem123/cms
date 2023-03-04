<?php include("includes/header.php")  ?>
<div id="wrapper">


    <?php include("includes/nav.php")  ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        All pending posts
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
                            <th>Title</th>
                            <th>Author</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Approve</th>
                            <th>Dissaprove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $post = new Posts;
                        $fetch = $post->fetchAllPendingPosts();
                        $rows = $post->checkRows($fetch);
                        if ($rows === 0) {

                            echo "<h1>No Post Available</h1>";
                        } else {
                            while ($row = mysqli_fetch_assoc($fetch)) {
                        ?>
                                <tr>
                                    <td><?php echo $row['title'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><img src="images/<?php echo $row['image'] ?>" width="60px" alt="alt"></td>
                                    <td><?php echo $post->postStatus( $row['status']) ?></td>
                                    <td><a href="approve.php?id=<?php  echo $row['id']  ?>" class="btn btn-primary">Approve</a></td>
                                    <td><a href="disapprove.php?id=<?php  echo $row['id']  ?>" class="btn btn-danger">Disaaprove</a></td>
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