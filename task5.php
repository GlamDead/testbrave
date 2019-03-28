<?php
	include_once 'dbconfig.php';
	

function form($con){
	$query = "SELECT id,listofcoutry FROM country";
	$result = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con));	
	?>

<form action="task5.php"  method="GET" id="task5">
<select name="countryis">
<option label>Выберите страну</option>
<?php while($row=$result->fetch_array(MYSQLI_ASSOC)) { 
	if(isset($_GET['countryis']) && $_GET['countryis'] == $row['id']):?> <option value=<?php echo $row['id']?> selected><?php echo $row['listofcoutry']?></option>
	<?php
else:?>
<option value=<?php echo $row['id']?>><?php echo $row['listofcoutry']?></option>
<?php
endif;} ?>
</select>
</form>
<div class="wraplist"></div>
<?php
}

function truePage($con, $country, $page){
	$query = "SELECT COUNT(id) FROM city WHERE country_id=$country";
	$result = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con));
	$number = implode($result->fetch_assoc());
	if($page >= ceil($number/5)): return false;
	else: return true;
	endif;
}

function sqlQuery($con, $country, $page = 1){
	$startId = ($page-1)*5;
	$query = "SELECT listofcity FROM city WHERE country_id=$country LIMIT $startId,5";
	$result = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con));
	echo "<ul>";
	while ($row = mysqli_fetch_row($result)){
		echo "<li>$row[0]</li>";
	}
	echo "</ul>";
	if(truePage($con,$country,$page) && $page == 1):  echo "<button class='nextpage' id='nextpage-task4'>Next</button>"; 
	elseif(truePage($con,$country,$page) == false && $page > 1): echo "<button class='prevpage' id='prevpage-task4'>Prev</button>";
	elseif(truePage($con,$country,$page) && $page > 1): 
		echo "<button class='prevpage' id='prevpage-task4'>Prev</button>";
		echo "<button class='nextpage' id='nextpage-task4'>Next</button>";
	endif;
	echo "<script>var variable = $page</script>";
		
	mysqli_free_result($result);
}


if(isset($_GET['countryis']) && isset($_GET['page'])): sqlQuery($con, $_GET['countryis'],$_GET['page']);
elseif(isset($_GET['countryis'])): sqlQuery($con, $_GET['countryis']);
else: form($con);
endif;