<?php  require '../db/connection.php';

	$category_id = $_GET['id']; 

	$query = $database -> prepare('DELETE FROM `category` WHERE `category`.`id` = :id');
	if ($query->execute([':id' => $category_id])) {
		header("Location: category_list.php");
}?> 
