<?php 

//linking database from db folder
require '../db/connection.php';

global $news;
				if(isset($_GET['id'])){
                    //fetching table data from respective mysql database
			 	$querry = $database->prepare("SELECT * FROM article WHERE id=:id");
			 	$querry->execute($_GET);
			 	$news = $querry->fetch();
				}

				if (isset($_POST['submit'])) {
					$modify = $database->prepare("UPDATE article SET title=:title, description=:description, category_fk=:category_fk WHERE id=:id");

					$required=[
						'id' =>$_POST['id'],
						'title'=>$_POST['title'],
						'description'=>$_POST['description'],
                        'category_fk'=>$_POST['category_fk']

					];

					if ($modify->execute($required)) {
						header('Location:adminArticle.php');
					}
					
				}

				//adding header to page
require 'layout/header.php'; 

?>


<main>
<h2>Edit Category</h2>
			<article>
				<form action="editArticle.php" method="POST">
                <p>Enter article information</p>
                <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
					<label>Title</label> <input type="text" name="title" value="<?php echo $news['title']?>" />
					<label>Description</label> <textarea name="description"><?php echo $news['description']?></textarea>
                    <label>Category</label> 
                    <?php 
                    
                    $db = 'SELECT * FROM category';
				    $category = $database->query($db);
                    
                    ?>
                    <select name="category_fk">
                    <?php foreach ($category as $dropdown): ?>
                        <?php echo "<option value=".$dropdown['id'].">" ?>
                        <?php echo $dropdown["name"]; ?>
                        </option> 
                        
                    <?php endforeach; ?>
                    </select>
					<input type="submit" name="submit" value="Edit" />
				</form>
			</article>
		</main>

<?php 
require 'layout/footer.php'; 
?>