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
		showPage('walec', 'Walec', [
			['name' => 'r', 'title' => 'r (promień podstawy)', 'unit' => 'cm'],
			['name' => 'h', 'title' => 'h (wysokość)', 'unit' => 'cm'],
		], [
			['title' => 'Pole podstawy', 'func' => 'pole_podst', 'unit' => 'cm²', 'input' => ['r']],
			['title' => 'Pole pow. bocznej', 'func' => 'pole_pb', 'unit' => 'cm²', 'input' => ['r', 'h']],
			['title' => 'Pole pow. całkowitej', 'func' => 'pole_pc', 'unit' => 'cm²', 'input' => ['r', 'h']],
			['title' => 'Objętość', 'func' => 'objetosc', 'unit' => 'cm³', 'input' => ['r', 'h']],
		]);
	?>
</body>
</html>

