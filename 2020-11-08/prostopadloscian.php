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
		showPage('prostopadloscian', 'Prostopadłościan', [
			['name' => 'a', 'title' => 'a', 'unit' => 'cm'],
			['name' => 'b', 'title' => 'b', 'unit' => 'cm'],
			['name' => 'c', 'title' => 'c', 'unit' => 'cm'],
		], [
			['title' => 'Pole', 'func' => 'pole', 'unit' => 'cm²', 'input' => ['a', 'b', 'c']],
			['title' => 'Objętość', 'func' => 'objetosc', 'unit' => 'cm³', 'input' => ['a', 'b', 'c']],
			['title' => 'Długość przekątnej', 'func' => 'przekatna', 'unit' => 'cm', 'input' => ['a', 'b', 'c']],
		]);
	?>
</body>
</html>

