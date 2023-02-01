<?php  
//linking database from db folder
require '../db/connection.php';

	$news_id = $_GET['id']; 

	$query = $database -> prepare('DELETE FROM `article` WHERE `article`.`id` = :id');
	if ($query->execute([':id' => $news_id])) {
		header("Location: adminArticle.php");
}?> 
