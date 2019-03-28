<?php
	include_once 'dbconfig.php';
	$query = "SELECT id,listofcoutry FROM country";
	$result = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con));
	//action="task2-1.php"
//onchange="ajax('task2-1.php')
?>

<form action="task2.php"  method="POST" id="task2">
<select name="countryis">
<option>Выберите страну</option>
<?php while($row=$result->fetch_array(MYSQLI_ASSOC)) { 
	if(isset($_GET['countryis']) && $_GET['countryis'] == $row['id']):?> <option value=<?php echo $row['id']?> selected><?php echo $row['listofcoutry']?></option>
	<?php
else:?>
<option value=<?php echo $row['id']?>><?php echo $row['listofcoutry']?></option>
<?php
endif;} ?>
</select>
</form>

<?php
if(isset($_GET['countryis'])){
	$value = $_GET["countryis"];
	$query = "SELECT listofcity FROM city WHERE country_id=$value";
	$result = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con));
	echo "<ol>";
		while ($row = mysqli_fetch_row($result)){
			echo "<li>$row[0]</li>";
		}
		echo "</ol>";
		
		mysqli_free_result($result);
}





