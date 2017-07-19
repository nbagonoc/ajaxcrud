<?php include 'functions.php'; ?>
<?php databaseConnect(); ?>

	<?php
		
		$loadCounterNew = $_POST['loadCounterNew'];

		//QUERY
		$query = mysql_query("SELECT * FROM users LIMIT $loadCounterNew");

	  	echo "<table class=\"table table-striped\">";
	    echo "<thead>";
		echo "<tr>";
	    echo "<th>Name</th>";
	    echo "<th>Email</th>";
		echo "</tr>";
	    echo "</thead>";
	    echo "<tbody>";

	    //RETURN
		while($read = mysql_fetch_array($query)){
			$name = $read['name'];
			$email = $read['email'];
			echo "<tr><td>$name</td><td>$email</td></tr>";
		}
		
		echo "</tbody>";
		echo "</table>";

	?>

<?php databaseClose(); ?>