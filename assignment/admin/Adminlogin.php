<?php 
session_start();


//linking database from db folder
require '../db/connection.php';

		if (isset($_POST['submit'])) {
            //fetching table data from respective mysql database
		$querry=$database->prepare("SELECT * FROM admin where username=:username");
		
		$required = [
			'username'=>$_POST['username']
		];
		$querry->execute($required);
		if ($querry->rowCount()>0) {
			$login=$querry->fetch();
            // password vefification
			if (password_verify($_POST['password'],$login['password'])) {
			$_SESSION['sessionId']='loggedIn';
			header('location:index.php');
			}
			else{
				echo 'Incorrect username and password';
			}
			
		}
		else{
			echo 'Incorrect username and password';
		}
	}
     //adding header to page
       require '../layout/header.php'; 
?>


<main>
<h2>Admin Login</h2>
			<article>
				<form action="Adminlogin.php" method="POST">
					<p>Enter your information</p>

					<label>Username</label> <input type="text" name="username" placeholder="Username" />
					<label>Password</label> <input type="password" name="password" placeholder="Password" />

					<input type="submit" name="submit" value="Login" />
				</form>
			</article>
		</main>

        <?php 
require 'layout/footer.php'; 
?>