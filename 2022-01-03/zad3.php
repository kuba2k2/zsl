<form action="zad3.php" method="get">
	Ile: <input type="number" name="ile" id="ile" min="1" max="100" required value="50"><br>
	Min: <input type="number" name="min" id="min" min="5" max="99" required value="5"><br>
	Max: <input type="number" name="max" id="max" min="5" max="99" required value="99"><br>
	<button>Losuj</button>
</form>

<?php
if(isset($_GET['ile'])) {
	$ile = $_GET['ile'];
	$min = $_GET['min'];
	$max = $_GET['max'];
	for ($i = 0; $i < $ile; $i++) { 
		echo rand($min, $max).'<br>';
	}
}
