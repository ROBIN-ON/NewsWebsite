<?php 
session_start();
//adding header to page
require 'layout/header.php';  
//linking database from db folder
require '../db/connection.php';
//fetching table data from respective mysql database
				$db = 'SELECT * FROM article ORDER BY id DESC';

				$news = $database->query($db);

?>
<main>
			

			<article>
				<h1>Welcome To The Home Page:</h1>
				<p><h2>List Of The Articles</h2></p>
				<?php foreach($news as $article): ?>
                <h4><?php echo "<a href='../user/viewArticle.php?id=".$article['id']."'>"; ?>
						<?php echo $article["title"]; ?></a></h4>
                        <p><?php echo $article["description"];?></p>
                        <p><?php echo $article["posted_on"];?></p>
                
			<?php endforeach; ?>
			</article>
		</main>
<?php require 'layout/footer.php';  ?>