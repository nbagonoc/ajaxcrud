<?php include 'header.php'; ?>
<?php include 'functions.php'; ?>
<?php databaseConnect(); ?>

<div class="container">
  <div class="main">
    <h1 class="text-center">View, Edit, and Delete Users</h1>
	<?php
		
		//QUERY
		$query = mysql_query("SELECT * FROM users LIMIT 5");

	  	echo "<table class=\"table table-striped\">";
	    echo "<thead>";
		echo "<tr>";
	    echo "<th>Name</th>";
	    echo "<th>Email</th>";
	    echo "<th>Edit</th>";
	    echo "<th>Delete</th>";
		echo "</tr>";
	    echo "</thead>";
	    echo "<tbody>";

	    //RETURN
		while($read = mysql_fetch_array($query)){
			$id = $read['ID'];
			$name = $read['name'];
			$email = $read['email'];
			$password = $read['password'];
			echo "<tr><td>$name</td><td>$email</td><td><a href=\"edit.php?ID=$id\">edit</a></td><td><a href=\"delete.php?ID=$id\">delete</a></td></tr>";
		}
		echo "</tbody>";
		echo "</table>";

	?>
  </div>
  <button class="btn btn-default center-block load" id="loadEdit">Load More</button>
</div>


<?php include 'footer.php'; ?>
<?php databaseClose(); ?>