<?php

function insert_categories(){
	global $connection;
	if (isset($_POST['submit'])) {
                               $cat_title = $_POST['cat_title'];

                            if ($cat_title =="" || empty($cat_title)) {
                                echo "This field Should not be empty";
                            }
                            else{
                                $query = "INSERT INTO categories(cat_title)";
                                $query .="VALUE ('{$cat_title}')";

                                $create_category_query = mysqli_query($connection,$query);

                                if (!$create_category_query) {
                                    die('QUERY FAILED'.mysqli_error($connection));
                                }
                            }
                        }
}

function category_list(){
	global $connection;
	 $query = "SELECT * FROM categories";
                            $select_categories = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($select_categories)){
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                            echo "<tr>";
                                            echo "<td>{$cat_id}</td>";
                                            echo "<td>{$cat_title}</td>";
                                            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                            echo "</tr>";
                                        }
}

function delete_category(){
	global $connection;
	if (isset($_GET['delete'])) {
                                     $the_cat_id = $_GET['delete'];
                                     $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
                                     $delete_query = mysqli_query($connection,$query);
                                     header("Location: categories.php");
}
}
function edit_category_call(){
	global $connection;
	if (isset($_GET['edit'])) {
                                $cat_id = $_GET['edit'];
                                include "includes/update_category.php";
                            }
}

function total_user(){
	global $connection;
	$query_user = "SELECT * FROM users ";
	$query_user_fire = mysqli_query($connection, $query_user);
	$no_of_users = mysqli_num_rows($query_user_fire);
	echo $no_of_users;
}
function total_post(){
	global $connection;
	$query_post = "SELECT * FROM posts ";
	$query_post_fire = mysqli_query($connection, $query_post);
	$no_of_posts = mysqli_num_rows($query_post_fire);
	echo $no_of_posts;
}
function total_portfolio(){
	global $connection;
	$query_portfolio = "SELECT * FROM portfolio ";
	$query_portfolio_fire = mysqli_query($connection, $query_portfolio);
	$no_of_portfolio = mysqli_num_rows($query_portfolio_fire);
	echo $no_of_portfolio;
}
function total_comments_un(){
	global $connection;
	$query_comments = "SELECT * FROM comments WHERE comment_status ='unapproved'";
	$query_comments_fire = mysqli_query($connection, $query_comments);
	$no_of_comments = mysqli_num_rows($query_comments_fire);
	echo $no_of_comments;
}






 ?>
