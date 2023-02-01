
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
				<!-- <li><a href="register.php">Register</a></li> -->
				<li><a href="logout.php">SignOut</a></li>
			</ul>
		</nav>
		<img src="../images/banners/randombanner.php" />