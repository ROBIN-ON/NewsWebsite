

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
				<li><a href="../public/index.php">Latest Articles</a></li>
				<li><a href="#">Select Category</a>
                  
				    
					<ul>
					<?php foreach ($category as $dropdown): ?>
						<li>
						<?php echo "<a href='../public/view_category.php?id=".$dropdown['id']."' class='articleLink'>"; 
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
		<img src="images/banners/randombanner.php" />