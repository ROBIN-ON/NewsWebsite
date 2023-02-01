<?php 
//adding header to page
require 'layout/header.php'; 
//linking database from db folder
require '../db/connection.php';

if (isset($_POST['submit'])) {
    extract($_POST);
    $fault = '';
   
       if($email == '' || $username == '' || $password == '') $fault = $fault . '<p>Enter all info</p>';

       if(empty($fault)){

           $sql = "INSERT INTO admin (email, username, password) VALUES (:email, :username, :password)";
           $query = $database->prepare($sql);
           unset($_POST['submit']);
           //password remains hidden
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

           if($query->execute($_POST)) echo '<p>Success</p>';
       }
       else{
           echo $fault;
       }
}

?>


<main>
<h2>Registartion Form</h2>
			<article>
				<form action="addAdmin.php" method="POST">
					<p>Enter your information</p>

					<label>Email</label> <input type="text" name="email" placeholder="Email" />
					<label>Username</label> <input type="text" name="username" placeholder="Username" />
					<label>Password</label> <input type="password" name="password" placeholder="Password" />

					<input type="submit" name="submit" value="Signup" />
				</form>
			</article>
		</main>

        <?php 
require 'layout/footer.php'; 
?>