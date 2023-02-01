<?php 
//adding header to page
require 'layout/header.php';
//linking database from db folder
				require '../db/connection.php';
                if(isset($_GET['id'])){
                    //fetching table data from respective mysql database
                     $db = $database->prepare("SELECT * FROM article WHERE id=:id");
                     $db->execute($_GET);
                     $article = $db->fetch();
                    }?>



<?php echo "<a href='add_comment.php?id=".$article['id']."'>"; ?>New Comment</a>

<article>
				<h1><?php echo $article['title']; ?></h1>
				<p><?php echo $article['description']; ?></p>
				<h3>Comments</h3>
                <?php 
                if(isset($_GET['id'])){
                    //fetching table data from respective mysql database
                     $db = $database->prepare("SELECT * FROM comment WHERE article_fk=:id");
                     $db->execute($_GET);
                    //  $comment = $db->fetch();
                    }?>
                
                
                    
                    <?php while ($comment = $db->fetch()) { ?>
				
                   <li><?php
					echo $comment['body']; 
                    echo $comment['comment_date']; 
					}
            
				?></li> 
                
			
			</article>


<?php 

require '../layout/footer.php';

?>