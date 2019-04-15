
<?php include 'includes/admin_header.php'; ?>
<?php
if (!$_SESSION['username']) {
  header("Location: ../index.php");
}

 ?>
    <div id="wrapper">
       <?php include 'includes/admin_navigation.php'; ?>
        <div id="page-wrapper">
            <div class="container">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="page-header"> Welcome,  <small><?php echo $_SESSION['username'] ?></small> </h3>
                    </div>
                </div>
                <!-- /.row -->
            </div>
          </div>

            <div class="container mt-5">
              <div class="row ">
                <div class="col-md-3 bg-primary">
                  <h4>Total Post</h4><br>
                  <p><?php total_post(); ?> </p>
                </div>
                <div class="col-md-3">
                  <h4>Total Portfolio</h4><br>
                  <p> <?php total_portfolio(); ?> </p>
                </div>
                <div class="col-md-3 bg-primary">
                  <h4>Total Unapprove comments</h4><br>
                  <p> <?php total_comments_un(); ?> </p>
                </div>
                <div class="col-md-3">
                  <h4>Total Users</h4><br>
                  <p> <?php total_user(); ?> </p>
                </div>
              </div>
            </div>

            <div class="container mt-5">
              <h3>Un published Post</h3>
              <div class="row">
                <div class="col-md-12">
                  <?php include 'includes/view_all_posts.php' ?>
                </div>
              </div>
            </div>

            <div class="container mt-5">
              <h3>Comments </h3>
              <div class="row">
                <div class="col-md-12">
                  <?php include 'includes/view_all_comments.php' ?>
                </div>
              </div>
            </div>
            <div class="container mt-5">
              <h3>Portfolio </h3>
              <div class="row">
                <div class="col-md-12">
                  <?php include 'includes/view_all_portfolio.php' ?>
                </div>
              </div>
            </div>


    </div>
    <!-- /#wrapper -->
<?php include 'includes/admin_footer.php'; ?>
