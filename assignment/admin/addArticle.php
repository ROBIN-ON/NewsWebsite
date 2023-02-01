<?php 
//adding header to page
require 'layout/header.php'; 

//linking database from db folder
require '../db/connection.php';
$id = '';
if (isset($_POST['submit'])) {
    extract($_POST);
    $fault = '';
   
       if($title == '' || $description == '') $fault = $fault . '<p>Enter all info</p>';

       if(empty($fault)){

        $posted_on = date('Y-m-d');
			// this helps to add the details which is added bby the admin 	into the database					
        $article = $database->prepare("INSERT INTO article (title,description,posted_on,category_fk) VALUES (:title, :description, '$posted_on', :category_fk) ");
               $required=[
                   'title'=>$_POST['title'],
                   'description'=>$_POST['description'],
                   'category_fk'=>$_POST['category_fk']
               ];

           if($article->execute($required)) {
            // header('Location:adminArticle.php?msg=added');
            print_r('<p style="text-align: center; background-color:green;">Successfully logged in</p>');
           }
       }
       else{
           echo $fault;
       }
}


    $view = $category->fetch();
    
    
    ?>



<main>
<h2>Add News Article</h2>
			<article>
                <!-- this form is for the adding the article -->
				<form action="addArticle.php" method="POST">
					<p>Enter article information</p>
					<label>Title</label> <input type="text" name="title" placeholder="Title" />
					<label>Description</label> <textarea name="description"></textarea>
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
					<input type="submit" name="submit" value="Add" />
				</form>
		    </article>
</main>

<?php 
require 'layout/footer.php'; 
?>