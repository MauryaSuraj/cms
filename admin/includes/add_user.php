<?php 
if (isset($_POST['create_user'])) {
	
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
	// 	//insert to Database 
 	$query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password, user_image) ";

 	$query .="VALUES ('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}','duumyimage')";

$create_user_query = mysqli_query($connection,$query);
if (!$create_user_query) {
	die("Query Failed .".mysqli_error($connection));
	}
	echo "User Created: "." "."<a href='users.php'>View Users</a>";
}
 ?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="firstname">First Name</label>
		<input type="text" name="user_firstname" class="form-control">
	</div>
	
	<div class="form-group">
		<label for="user_lastname">Last Name</label>
		<input type="text" name="user_lastname" class="form-control">
	</div>
	<div class="form-group">
		<label for="username">User Name</label>
		<input type="text" name="username" class="form-control">
	</div>
	<div class="form-group">
		<select name="user_role" id="">
			<option value="select option">Select Option</option>
			<option value="admin">Admin</option>
			<option value="subscriber">Subscriber</option>
		</select>
	</div>
	<!-- <div class="form-group">
		<label for="posts_image">Posts Image</label>
		<input type="file" name="image">
	</div> -->
	<div class="form-group">
		<label for="user_email">Email</label>
		<input type="email" name="user_email" class="form-control">
	</div>
	<div class="form-group">
		<label for="user_password">Password</label>
		<input type="password" name="user_password" class="form-control">
	</div>
	<div class="form-group">
		
		<input type="submit" class="btn btn-primary" name="create_user" value="Add user">
	</div>


</form>