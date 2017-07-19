<?php include 'functions.php'; ?>
<?php databaseConnect(); ?>

	<?php
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		//QUERY
		if((trim($name) != "") && (trim($email) != "") && (trim($password) != "")){
			if(filter_var($email, FILTER_VALIDATE_EMAIL)){
				$create = mysql_query("INSERT INTO users(name,email,password) VALUES('$name','$email','$password')");
				if(!$create) {
					die("<h3 class=\"error\">Registration Failed</h3><p class=\"error\">User Was Not Added to Database</p>" .mysql_error());
				}
				else{
					echo "<h3>Registration Successful</h3>";
					echo "<p>{$name} added to database.</p>";
					echo "<a href=\"index.php\" class=\"btn btn-default\">Ok</a>";
				}
			}
			else{
				echo "<h3 class=\"error\">Registration Failed</h3>";
				echo "<p class=\"error\">Invalid email address.</p>";
				echo "<p class=\"error\">Please enable your javascript to improve user experience within this site.</p>";			
			}
		}
		else{
			echo "<h3 class=\"error\">Registration Failed</h3>";
			echo "<p class=\"error\">Kindly fill-in all forms.</p>";
			echo "<p class=\"error\">Please enable your javascript to improve user experience within this site.</p>";
		}
	?>
<?php databaseClose(); ?>