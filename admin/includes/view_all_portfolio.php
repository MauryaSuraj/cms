<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Portfolio Name</th>
                                    <th>Portfolio Link</th>
                                    <th>Portfolio details</th>
                                    <th>Portfolio Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                               $query = "SELECT * FROM portfolio";
                               $select_posts = mysqli_query($connection , $query);
                               while ($row = mysqli_fetch_assoc($select_posts)) {
                                   $portfolio_id = $row['portfolio_id'];
                                   $p_name = $row['p_name'];
                                   $p_image = $row['p_image'];
                                   $p_link = $row['p_link'];
                                   $p_detail = $row['p_detail'];
                                   echo "<tr>";
                                    echo "<td>{$portfolio_id}</td>";
                                    echo "<td>{$p_name}</td>";
                                    echo "<td>{$p_link}</td>";
                                    echo "<td>{$p_detail}</td>";
                                    echo "<td><img src='../images/{$p_image}' alt='images' class='img-responsive' width='100'></td>";
                                    echo "<td><a href='portfolio.php?source=edit_portfolio&p_id={$portfolio_id}'>Edit</a> </td>";
                                    echo "<td><a href='portfolio.php?delete={$portfolio_id}'>Delete</a> </td>";
                                echo "</tr>";
                               }
                                ?>
                            </tbody>
                        </table>
                        <?php
                        if (isset($_GET['delete'])) {
                          $the_post_id = $_GET['delete'];
                          $query = "DELETE FROM portfolio WHERE portfolio_id = {$the_post_id} ";
                          $delete_query = mysqli_query($connection,$query);
                        }
                        ?>
