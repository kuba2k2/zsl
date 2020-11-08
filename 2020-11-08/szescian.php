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
		showPage('szescian', 'Sześcian', [
			['name' => 'a', 'title' => 'a', 'unit' => 'cm'],
		], [
			['title' => 'Pole', 'func' => 'pole', 'unit' => 'cm²', 'input' => ['a']],
			['title' => 'Objętość', 'func' => 'objetosc', 'unit' => 'cm³', 'input' => ['a']],
			['title' => 'Długość przekątnej', 'func' => 'przekatna', 'unit' => 'cm', 'input' => ['a']],
			['title' => 'Promień kuli wpisanej', 'func' => 'pr_wpisanej', 'unit' => 'cm', 'input' => ['a']],
			['title' => 'Promień kuli opisanej', 'func' => 'pr_opisanej', 'unit' => 'cm', 'input' => ['a']],
		]);
	?>
</body>
</html>

