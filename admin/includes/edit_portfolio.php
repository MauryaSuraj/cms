<?php
if (isset($_GET['p_id'])) {
	$the_post_id = $_GET['p_id'];
}
$query = "SELECT * FROM portfolio WHERE portfolio_id ={$the_post_id}";
   $select_posts_by_id = mysqli_query($connection , $query);
    while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
      $portfolio_id = $row['portfolio_id'];
        $p_name = $row['p_name'];
        $p_link = $row['p_link'];
        $p_image = $row['p_image'];
        $p_detail = $row['p_detail'];
    }
    if (isset($_POST['update_post'])) {
    	$p_name = $_POST['p_name'];
    	$p_link = $_POST['p_link'];
    	$p_detail = $_POST['p_detail'];

    	$post_image = $_FILES['image']['name'];
    	$post_image_temp = $_FILES['image']['tmp_name'];

			move_uploaded_file($post_image_temp, "../images/$post_image");
			if (empty($post_image)) {
				$query = "SELECT * FROM portfolio WHERE portfolio_id = {$the_post_id}";
				$select_image = mysqli_query($connection , $query);
				while ($row = mysqli_fetch_array($select_image)) {
					$post_image = $row['p_image'];
				}
			}

    	$query = "UPDATE portfolio SET ";
    	$query .= "p_name ='{$p_name}', ";
    	$query .= "p_link = '{$p_link}', ";
    	$query .= "p_detail = '{$p_detail}', ";
    	$query .= "p_image = '{$post_image}' ";
    	$query .= "WHERE portfolio_id = {$the_post_id} ";
    	$update_post = mysqli_query($connection,$query);
    	if (!$update_post) {
    		die("Query Failed" .mysqli_error($connection));
    	}
    }
?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Porfolio Name</label>
		<input type="text" name="p_name" class="form-control" value="<?php echo $p_name; ?>">
	</div>
	<div class="form-group">
		<label for="title">Portfolio Link</label>
		<input type="text" name="p_link" class="form-control" value="<?php echo $p_link; ?>">
	</div>
	<div class="form-group">
		<label for="posts_status">Portfolio details</label>
		<input type="text" name="p_detail" class="form-control" value="<?php echo $p_detail; ?>">
	</div>
	<div class="form-group">
		<img width="100" src="../images/<?php echo $p_image; ?>" alt="">
		<br><br>
		<input type="file" name="image">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="update_post" value="Update Porfolio">
	</div>
</form>
