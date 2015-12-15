<?php
require_once("templates/top.php");

if(isset($_GET['search'])) {
	$search = $_GET['search'];
	echo "<h3>Результаты поиска</h3>";
	$search = trim($search);
	$search = htmlspecialchars($search);
	$search = stripcslashes($search);
	$query = "SELECT * FROM $tbl_maintext WHERE body LIKE '%".$search."%'";
	$cat = mysql_query($query);
	if(!$cat) {
		exit("Запрос не выполнен");
	}
	if(mysql_num_rows($cat) > 0) {
		while($result = mysql_fetch_array($cat)) {
			echo "<ul>";
				echo "<li>";
					echo $result['name'];
					
                
                echo "<a href = 'article.php?url=".$result['url']."'>Читать полностью...</a>";
		
                 
				echo "</li>";
			echo "</ul>";
	
		}
		}
		else {
			echo"поиск не дал результатов.";
		}
}

require_once("templates/bottom.php");
?>