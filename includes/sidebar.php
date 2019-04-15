<!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                 
           <!--      //if (isset($_POST['submit'])) {
                    //$search = $_POST['search'];

                    //$query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                    //$search_query = mysqli_query($connection,$query);
                    //if (!$search_query) {
                      //  die("Query Failed".mysqli_error($connection));
                    //}

                    //$count = mysqli_num_rows($search_query);
                    //if($count == 0){
                     //   echo "<h1>No result</h1>";
                   // }
                    //else{
                    //    echo "Some reslut";
                  //  }
                //} -->
               

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                </form>
                <!-- Form ends here -->
                    <!-- /.input-group -->
                </div>
                <!-- login form -->
                <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Enter user name">
                        
                    </div>
                     <div class="input-group">
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" name="login" type="submit">
                                LogIn
                            </button>
                        </span>
                        
                    </div>
                </form>
                <!-- Form ends here -->
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                



                <div class="well">
                    <?php 
                    //SELECT *FROM categories LIMIT 3
                    $query = "SELECT * FROM categories";
                    $select_categories_sidebar  = mysqli_query($connection, $query);
                    
                     ?>
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php 
                                while ($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                                    $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                    }
                                 ?>
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include 'widget.php'; ?>

            </div>