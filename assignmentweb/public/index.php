<?php 

//linking database from db folder

require '../db/connection.php';

				$db = 'SELECT * FROM article ORDER BY id DESC';

				$news = $database->query($db);

?>


<?php  
//linking database from db folder

				require '../db/connection.php';

				$db = 'SELECT * FROM category';

				$category = $database->query($db);

?>	


<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../css/styles.css"/>
		<title>Northampton News - Home</title>
	</head>
	<body>
		<header>
			<section>
				<h1>Northampton News</h1>
			</section>
		</header>
		<nav>
			<ul>
				<li><a href="index.php">Latest Articles</a></li>
				<li><a href="#">Select Category</a>
                  
				    
                <ul>
					<?php foreach ($category as $dropdown): ?>
						<li>
						<?php echo "<a href='view_category.php?id=".$dropdown['id']."' class='articleLink'>"; 
						 echo $dropdown["name"]; 
						 ?></a></li>
						<?php endforeach; ?>
					</ul>
				</li>
                <li><a href="#">Login</a>		    
					<ul>
						<li><a class="articleLink" href="../admin/login.php">Admin</a></li>
						<li><a class="articleLink" href="../user/login.php">User</a></li>
					</ul>
				</li>
                <li><a href="../user/register.php">SignUp</a></li>
                
			</ul>
		</nav>
		<img src="../images/banners/randombanner.php" />
		<main>
			<!-- Delete the <nav> element if the sidebar is not required -->
			<nav>
				<ul>
					<li><a href="#">Sidebar</a></li>
					<li><a href="#">This can</a></li>
					<li><a href="#">Be removed</a></li>
					<li><a href="#">When not needed</a></li>
				</ul>
			</nav>

			<article>
				<h1>Welcome To The Home Page:</h1>
				<p><h2>List Of The Articles:</h2></p>
				
			


                <?php foreach($news as $article): ?>
                <h4><?php echo "<a href='../user/login.php'>"; ?>
						<?php echo $article["title"]; ?></a></h4>
                        <p><?php echo $article["description"];?></p>
                        <p><?php echo $article["posted_on"];?></p>
                
			<?php endforeach; ?>
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
