<?php

$db_name = "mysql:host=db;dbname=article";
$username = "root";
$password = "root";

    $database = new PDO($db_name, $username , $password);

    if(!$database){
        die("Fatal Error:connection Failed!");
    }
    

?>
