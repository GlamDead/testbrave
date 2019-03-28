<?php
	include_once 'dbconfig.php';
	$query = "SELECT listofcoutry FROM country";
	$result = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con));
	if ($result){
		echo "<ol>";
		while ($row = mysqli_fetch_row($result)){
			echo "<li>$row[0]</li>";
		}
		echo "</ol>";
		
		mysqli_free_result($result);
	}
	