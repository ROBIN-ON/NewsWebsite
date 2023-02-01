<?php 
//adding header to page
require 'layout/header.php';
//linking database from db folder 
require '../db/connection.php';
$id='';
if (isset($_POST['submit'])) {
    extract($_POST);
    $id = $_POST['id'];
    $fault = '';
   
       if($body == '') $fault = $fault . '<p>Enter all info</p>';

       if(empty($fault)){
        
        // $article_fk = "SELECT id from article where id=$id";
        $comment_date = date('Y-m-d');
        //    $sql = "INSERT INTO comment (comment,artice_fk) VALUES (:comment, :artice_fk)";
           $query = $database->prepare("INSERT INTO comment (body, comment_date, article_fk) VALUES (:body, '$comment_date', (SELECT id from article where id=$id))");
           $required = [
            'body' => $_POST['body']           
            ];	

           if($query->execute($required)) {
            echo '<p>Added</p>'; 
            header('Location:viewArticle.php?id='.$id);
           }
       }
       else{
           echo $fault;
       }
}

?>

<?php 
require '../db/connection.php';
						
							if(isset($_GET['id'])){
								$id = $_GET['id'];}						
								//fetching table data from respective mysql database
                                $db = $database->prepare("SELECT * FROM article WHERE id=$id");
								
								$db->execute();
							
								$article=$db->fetch();?>

<main>
<h2>Add Comment</h2>
			<article>
				<form action="userComments.php" method="POST" enctype="multipart/form-data">
					<p>Enter your information</p>
                    <?php echo "<input type='hidden' name='id' value=".$article['id'].">" ?>
					<label>Comment</label> <input type="text" name="body" placeholder="Comment" />
					

					<input type="submit" name="submit" value="Add" />
				</form>
			</article>
		</main>

<?php 
require 'layout/footer.php'; 
?>