<?php 
    //adding header to page
require 'layout/header.php'; 
//linking database from db folders
require '../db/connection.php';
//fetching table data from respective mysql database
				$db = 'SELECT * FROM category';

				$category = $database->query($db);

     

?>
<main>
    
			<nav>
            
				<ul>
                    <li><b style="color: #ffffff;">Management</b></li>
					<li><a href="category_list.php">Category</a></li>
					<li><a href="adminArticle.php">News</a></li>
				</ul>
			</nav>

			<article>
            <a href="addCategory.php">Add new category!</a>
				<p><h2>List Of The Categories</h2></p>
				<table>
  <tr>
    <th>Name</th>
    <th>Actions</th>
  </tr>
  <!-- fetching table data from respective mysql database -->
  <?php foreach ($category as $list): ?>
  <tr>
  
    <td>
    <?php
						 echo $list["name"]; 
						 ?></td>
						
    <td><a href="editCategory.php?id= <?php echo $list["id"] ?>">Edit</a></td>
    <td><a href="deleteCategory.php?id= <?php echo $list["id"] ?>">Delete</a></td>
    
  </tr>
  <?php endforeach; ?>

</table>
			
			</article>
		</main>
<?php require 'layout/footer.php';  ?>