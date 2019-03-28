<?php
include_once 'dbconfig.php';
	$query = "SELECT id,listofcoutry FROM country";
	$result = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con));
	echo $_POST["countryis"];
//if(isset($_GET['country'])){
	$value = $_POST["countryis"];
	$query = "SELECT listofcity FROM city WHERE country_id='$value'";
	$result = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con));
	echo "<ol>";
		while ($row = mysqli_fetch_row($result)){
			echo "<li>$row[0]</li>";
		}
		echo "</ol>";
		
		mysqli_free_result($result);
//}