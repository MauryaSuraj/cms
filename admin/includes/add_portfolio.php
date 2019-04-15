<?php
if (isset($_POST['create_portfolio'])) {

	$portfolio_title = $_POST['portfolio_title'];
	$portfolio_link = $_POST['portfolio_link'];
	$portfolio_details = $_POST['portfolio_details'];

//image uploading to file
	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];

	$post_date = date('d-m-y');
	// $post_comment_count = 4;

	//image saving to the files another locations
move_uploaded_file($post_image_temp, "../images/$post_image");
	//insert to Database
 $query = "INSERT INTO portfolio(p_name, p_image, p_link, p_detail)";

 $query .="VALUES ('{$portfolio_title}','{$post_image}','{$portfolio_link}','{$portfolio_details}')";

$create_post_query = mysqli_query($connection,$query);
if (!$create_post_query) {
	die("Query Failed .".mysqli_error($connection));
	}
}
 ?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Portfolio Title</label>
		<input type="text" name="portfolio_title" class="form-control">
	</div>
	<div class="form-group">
		<label for="title">Portfolio Link</label>
		<input type="text" name="portfolio_link" class="form-control">
	</div>

	<div class="form-group">
		<label for="posts_image">Portfolio Image</label>
		<input type="file" name="image">
	</div>
	<div class="form-group">
		<label for="post_content">Portfolio details</label>
		<textarea class="form-control" name="portfolio_details" id="" cols="20" rows="5"></textarea>
	</div>
	<div class="form-group">

		<input type="submit" class="btn btn-primary" name="create_portfolio" value="Publish Portfolio">
	</div>


</form>
