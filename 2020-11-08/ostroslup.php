<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
		include 'functions.php';
		showPage('ostroslup', 'Ostrosłup prawidłowy czworokątny', [
			['name' => 'a', 'title' => 'a (krawędź podstawy)', 'unit' => 'cm'],
			['name' => 'h', 'title' => 'H (wys. ostrosłupa)', 'unit' => 'cm'],
		], [
			['title' => 'Pole', 'func' => 'pole', 'unit' => 'cm²', 'input' => ['a', 'h']],
			['title' => 'Objętość', 'func' => 'objetosc', 'unit' => 'cm³', 'input' => ['a', 'h']],
		]);
	?>
</body>
</html>

