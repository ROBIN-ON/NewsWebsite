<?php 
 //adding header to page
 require 'layout/header.php'; 
//linking database from db folder
require '../db/connection.php';

if(isset($_GET['id'])){
    //fetching table data from respective mysql database
    $db = $database->prepare("SELECT * FROM category WHERE id=:id");
    $db->execute($_GET);
    $category = $db->fetch();
   }
   
   
   ?>


<main>
			

			<article>
				<h1>Welcome To The <?php echo $category['name']; ?> Page:</h1>
				<p><h2>List Of The Articles</h2></p>

				<?php 
                if(isset($_GET['id'])){
                    //fetching table data from respective mysql database
                     $db = $database->prepare("SELECT * FROM article WHERE category_fk=:id");
                     $db->execute($_GET);
                    //  $comment = $db->fetch();
                    }
                    
                    
                    ?>
                
            <?php while ($article = $db->fetch()) { ?>
                <h4><?php echo "<a href='view_news.php?id=".$article['id']."'>"; ?>
                    <?php echo $article["title"]; ?></a></h4>
                    <p><?php echo $article["description"];?></p>
                    <p><?php echo $article["posted_on"];}?></p>
				
             
			</article>
		</main>
<?php require 'layout/footer.php';  ?>