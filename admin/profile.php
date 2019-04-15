
<?php include 'includes/admin_header.php'; ?>
<?php
if (isset($_SESSION['username'])) {
    $username =  $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_profile_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($select_user_profile_query)) {
                                $user_id = $row['user_id'];
                                $username = $row['username'];
                                $user_password = $row['user_password'];
                                $user_firstname = $row['user_firstname'];
                                $user_lastname = $row['user_lastname'];
                                $user_email = $row['user_email'];
                                $user_role = $row['user_role'];
    }
}

 ?>

    <div id="wrapper">
       <?php include 'includes/admin_navigation.php'; ?>
       <?php
if (isset($_GET['edit_user'])) {
     $the_user_id = $_GET['edit_user'];

      $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
                               $select_users_query = mysqli_query($connection , $query);
                               while ($row = mysqli_fetch_assoc($select_users_query)) {
                                   $user_id = $row['user_id'];
                                   $username = $row['username'];
                                   $user_password = $row['user_password'];
                                   $user_firstname = $row['user_firstname'];
                                   $user_lastname = $row['user_lastname'];
                                   $user_email = $row['user_email'];
                                   $user_role = $row['user_role'];
}
}
if (isset($_POST['edit_user'])) {

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $user_email = $_POST['user_email'];
    //image uploading to file
    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['tmp_name'];
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    // $post_date = date('d-m-y');
    // $post_comment_count = 4;

    //image saving to the files another locations
    // move_uploaded_file($post_image_temp, "../images/$post_image");
    //  //insert to Database
    $query = "UPDATE users SET ";
        $query .= "user_firstname ='{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";

        $query .= "user_role = '{$user_role}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_password = '{$user_password}' ";

        $query .= "WHERE username = '{$username}' ";

$edit_user_query = mysqli_query($connection,$query);
if (!$edit_user_query) {
    die("Query Failed .".mysqli_error($connection));
    }
}
 ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                         <h1 class="page-header">
                             Welcome To Admin <small><?php echo $_SESSION['username'] ?></small>
                         </h1>

                        <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname; ?>">
    </div>

    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" name="user_lastname" class="form-control" value="<?php echo $user_lastname; ?>">
    </div>
    <div class="form-group">
        <label for="username">User Name</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
    </div>
    <div class="form-group">
        <select name="user_role" id="">
            <option value=""><?php echo $user_role; ?></option>
            <?php
            if ($user_role == 'admin') {
                echo "<option value='subscriber'>Subscriber</option>";
            }
            elseif($user_role == 'subscriber'){
                echo "<option value='admin'>Admin</option>";
                // echo "<option value='subscriber'>Subscriber</option>";
            }
              ?>
        </select>
    </div>

    <!-- <div class="form-group">
        <label for="posts_image">Posts Image</label>
        <input type="file" name="image">
    </div> -->
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" name="user_email" class="form-control" value="<?php echo $user_email; ?>">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="name" name="user_password" class="form-control" value="<?php echo $user_password; ?>">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
    </div>
</form>

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
