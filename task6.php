<?php
	include_once 'dbconfig.php';
	function form($val = ''){
		echo "<form action=task6.php' method='GET' class='search-form' id='task6'>";
		echo "<input type='text' name='search' class='search-form-input search-form-input-big' value='$val' placeholder='Введите страну'/>";
		echo "</form>";
		echo "<div class='wraplist'></div>";
	}
	
	function truePage($con, $country, $page){
		$query = "SELECT c.listofcity FROM city AS c LEFT JOIN country AS co ON c.country_id = co.id WHERE co.listofcoutry LIKE '$country%'";
		$result = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con));
		$numRows = $result->num_rows;
		if($page >= ceil($numRows/5)): return false;
		else: return true;
		endif;
	}
	
	function sqlQuery($con, $country, $page = 1){
		$startId = ($page-1)*5;
		$query = "SELECT c.listofcity FROM city AS c LEFT JOIN country AS co ON c.country_id = co.id WHERE co.listofcoutry LIKE '$country%' LIMIT $startId,5";
		$result = mysqli_query($con, $query) or die("Ошибка " . mysqli_error($con));
		echo "<ul>";
		if($result->num_rows != 0):
			while ($row = mysqli_fetch_row($result)){
				echo "<li>$row[0]</li>";
			}
		else: echo "<p>Стран начинающихся на $country нет в базе</p>";
		endif;
		echo "</ul>";
		if(truePage($con,$country,$page) && $page == 1):  echo "<button class='nextpage' id='nextpage-task6'>Next</button>"; 
		elseif(truePage($con,$country,$page) == false && $page > 1): echo "<button class='prevpage' id='prevpage-task6'>Prev</button>";
		elseif(truePage($con,$country,$page) && $page > 1): 
			echo "<button class='prevpage' id='prevpage-task6'>Prev</button>";
			echo "<button class='nextpage' id='nextpage-task6'>Next</button>";
		endif;
		echo "<script>var variable = $page</script>";
		
		mysqli_free_result($result);
	}
	
	
	if(isset($_GET['search']) && isset($_GET['page'])): sqlQuery($con, $_GET['search'],$_GET['page']);
	elseif(isset($_GET['search'])): 
		if($_GET['search'] != ''): sqlQuery($con, $_GET['search']);
		else: echo "";
		endif;
	else: form();
	endif;