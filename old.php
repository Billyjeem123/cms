<?php include('includes/header.php');   ?>


    <!-- Navigation -->
    <?php include('includes/navbar.php');   ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php  

                $posts = new Posts;

                $fetchAllPosts = $posts->fetchAllPosts();
                $row =  $posts->checkRows($fetchAllPosts);
                if($row == 0){

                    echo "<h1 class'text-center'> NO POSTS AVAILABLE</h1>";
                }else{
                    foreach ($fetchAllPosts as $key => $allPosts) {
                    ?>

                <!-- First Blog Post -->
                <h4>
                    <a href="#"><?php  echo  $allPosts['title']  ?></a>
                </h4>
                <p class="lead">
                    By <a href="index.php"><?php  echo  $allPosts['username']  ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php  echo  $allPosts['date']  ?></p>
                <hr>

                <?php
                if($allPosts['type'] === "ApiPosts"){

                    echo"<img class='img-responsive' src='$allPosts[image]' alt=''>";
                    
                }else{
                    
                    echo"<img class='img-responsive' src='admin/images/$allPosts[image]' alt=''>";
                }

                ?>
                <!-- <img class="img-responsive" src="admin/images/<?php //echo $allPosts['image']  ?>" alt=""> -->
                <hr>
                <p><?php echo  substr($allPosts['body'], 0, 100000) . "..." ?></p>
                <a class="btn btn-primary" href="post/<?php echo $posts->preetyUrl($allPosts['id']) ?>/<?php echo $posts->preetyUrl($allPosts['title'])   ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

               
                <?php  }   
                }
                ?>

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

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
                    <p>Copyright &copy; Your Website <?php date('h') ?></p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <?php include('includes/js.php');   ?>


 
