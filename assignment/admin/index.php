<?php 
  require 'layout/header.php';
//linking database from db folder
require '../db/connection.php';
//fetching table data from respective mysql database in descending order
				$db = 'SELECT * FROM article ORDER BY id DESC';

				$news = $database->query($db);
				//adding header to page


?>
<main>
			<!-- Delete the <nav> element if the sidebar is not required -->
			<nav>
				<ul>
                    <li><b style="color: #ffffff;">Management</b></li>
					<li><a href="category_list.php">Category</a></li>
					<li><a href="adminArticle.php">News</a></li>
				</ul>
			</nav>

			<article>
				<h1>Welcome To The Home Page:</h1>
				<p><h2>List Of The Articles</h2></p>
				<?php foreach($news as $article): ?>
                <h4><?php echo "<a href='view_news.php?id=".$article['id']."'>"; ?>
						<?php echo $article["title"]; ?></a></h4>
                        <p><?php echo $article["description"];?></p>
                        <p><?php echo $article["posted_on"];?></p>
                
			<?php endforeach; ?>
			</article>
		</main>
<?php require 'layout/footer.php';  ?>