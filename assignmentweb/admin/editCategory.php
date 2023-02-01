<?php 
//adding header to page
require 'layout/header.php'; 
//linking database from db folder
require '../db/connection.php';

global $category;
				if(isset($_GET['id'])){
                    //fetching table data from respective mysql database
			 	$querry = $database->prepare("SELECT * FROM category WHERE id=:id");
			 	$querry->execute($_GET);
			 	$category = $querry->fetch();
				}

				if (isset($_POST['submit'])) {
					$modify = $database->prepare("UPDATE category SET name=:name WHERE id=:id");

					$required=[
						'id' =>$_POST['id'],
						'name'=>$_POST['name']
					];

					if ($modify->execute($required)) {
						header('Location:category_list.php');
					}
					
				}
				

?>


<main>
<h2>Edit Category</h2>
			<article>
				<form action="editCategory.php" method="POST">
					<p>Enter your information</p>

					<label>Name</label> <input type="text" name="name" value="<?php echo $category['name']?>" />
					
                    <input type="hidden" name="id" value="<?php echo $_GET['id']?>">

					<input type="submit" name="submit" value="Edit" />
				</form>
			</article>
		</main>

<?php 
require 'layout/footer.php'; 
?>