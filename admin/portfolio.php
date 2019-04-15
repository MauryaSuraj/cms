
<?php include 'includes/admin_header.php'; ?>
    <div id="wrapper">
       <?php include 'includes/admin_navigation.php'; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                         <h1 class="page-header">
                             Welcome To Admin <small><?php echo $_SESSION['username'] ?></small>
                         </h1>
                        <?php
                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }else{
                            $source = '';
                        }
                        switch ($source) {
                           case 'add_portfolio':
                               include "includes/add_portfolio.php";
                               break;
                            case 'edit_portfolio':
                                include "includes/edit_portfolio.php";
                                break;

                            default:
                                include 'includes/view_all_portfolio.php';
                        }
                        ?>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include 'includes/admin_footer.php'; ?>
