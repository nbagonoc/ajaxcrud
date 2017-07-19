<?php include 'functions.php'; ?>
<?php databaseConnect(); ?>

		<?php
			$newId = $_POST['newID'];
			$newName = $_POST['newname'];
			$newEmail = $_POST['newemail'];
			$newPassword = $_POST['newpassword'];

			//QUERY
			if((trim($newName) != "") && (trim($newEmail) != "") && (trim($newPassword) != "")){
				if(filter_var($newEmail, FILTER_VALIDATE_EMAIL)){
					$update = mysql_query("UPDATE users SET name='$newName',email='$newEmail',password='$newPassword' WHERE ID='$newId'");
					if(!$update) {
						die("<h3>Update Failed</h3><p>User was not updated.</p>" .mysql_error());
					}
					else{
						echo "<h3>Update Successful</h3><p>{$newName} updated successfuly</p>";
						echo "<a href=\"index.php\" class=\"btn btn-default\">Ok</a>";
					}
				}
				else{
					echo "<h3>Update Failed</h3>";
					echo "<p>Invalid email address.</p>";
					echo "<p>Please enable your javascript to improve user experience within this site.</p>";			
				}
			}
			else{
					echo "<h3>Update Failed</h3>";
					echo "<p>Kindly fill-in all forms.</p>";
					echo "<p>Please enable your javascript to improve user experience within this site.</p>";
			}
		?>

<?php databaseClose(); ?>