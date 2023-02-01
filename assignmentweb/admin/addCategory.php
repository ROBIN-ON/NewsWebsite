<?php 

//linking database from db folder
require '../db/connection.php';

if (isset($_POST['submit'])) {
    extract($_POST);
    $fault = '';
   
       if($name == '') $fault = $fault . '<p>Enter all info</p>';

       if(empty($fault)){
// adding data to table in mysql database
           $sql = "INSERT INTO category (name) VALUES (:name)";
           $query = $database->prepare($sql);
           $required = [
            'name' => $_POST['name']
            ];	

           if($query->execute($required)) {
            header('Location:category_list.php?msg=success');
           }
       }
       else{
           echo $fault;
       }
}
//adding header to page
require 'layout/header.php'; 
?>


<main>
<h2>Add Category</h2>
			<article>
                <!-- from this form admin is able to put the categories  -->
				<form action="addCategory.php" method="POST">
					<p>Enter your information</p>

					<label>Name</label> <input type="text" name="name" placeholder="Name" />
					

					<input type="submit" name="submit" value="Add" />
				</form>
			</article>
		</main>

<?php 
require 'layout/footer.php'; 
?>