<?php include 'header.php'; ?>
<?php include 'functions.php'; ?>
<?php databaseConnect(); ?>

<div class="container">
  <div class="main">
    <h1 class="text-center">Welcome to BootsCRUD</h1>
	<?php
		
		//QUERY
		$query = mysql_query("SELECT * FROM users LIMIT 5");

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
  </div>
  <button class="btn btn-default center-block load" id="load">Load More</button>
</div>

<?php include 'footer.php'; ?>
<?php databaseClose(); ?>