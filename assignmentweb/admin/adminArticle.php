<?php 
 
//linking database from db folder
require '../db/connection.php';
//fetching table data from respective mysql database
				$db = 'SELECT * FROM article';

				$news = $database->query($db);

        //adding header to page
require 'layout/header.php'; 

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
            <a href="addArticle.php">Add new news!</a>
				<p><h2>List Of The News</h2></p>
				<table>
  <tr>
    <th>Title</th>
    <th>Description</th>
    <th>Actions</th>
  </tr>
  <?php foreach ($news as $art): ?>
  <tr>
  
    <td>
    <?php echo "<a href='view_news.php?id=".$art['id']."'>"; ?>
						<?php echo $art["title"]; ?></a>
   </td>
    <td><?php echo $art["description"] ?></td>
						
    <td><a href="editArticle.php?id= <?php echo $art["id"] ?>">Edit</a></td>
    <td><a href="deleteArticle.php?id= <?php echo $art["id"] ?>">Delete</a></td>
    
  </tr>
  <?php endforeach; ?>

</table>
			
			</article>
		</main>
<?php require 'layout/footer.php';  ?>