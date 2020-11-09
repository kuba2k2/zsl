<?php
	session_start();
	include 'function.php';

	$x = '';
	$y = '';
	$type = '';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$_POST['x'] = str_replace(',', '.', $_POST['x']);
		$_POST['y'] = str_replace(',', '.', $_POST['y']);
		$valid = [
			isset($_POST['x']),
			isset($_POST['y']),
			in_array($_POST['type'], ['add', 'subtract', 'multiply', 'divide']),
			preg_match('/^[0-9]*\.?[0-9]+$/', $_POST['x']),
			preg_match('/^[0-9]*\.?[0-9]+$/', $_POST['y']),
			$_POST['type'] != 'divide' || $_POST['y'] != 0
		];

		$x = $_POST['x'];
		$y = $_POST['y'];
		$type = $_POST['type'];

		if (in_array(false, $valid)) {
			$result = 'Incorrect input.';
		}
		else {
			$_SESSION['x'] = $x;
			$_SESSION['y'] = $y;
			$_SESSION['type'] = $type;
			
			$result = calc($x, $y, $type);
		}
	}
	elseif (isset($_SESSION['type'])) {
		$x = $_SESSION['x'];
		$y = $_SESSION['y'];
		$type = $_SESSION['type'];

		$result = calc($x, $y, $type);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h3>Kalkulator</h3>
	<form method="POST" action="">
		<input type="text" name="x" placeholder="x" required pattern="[0-9]*[.,]?[0-9]+" value="<?=$x ?>">
		<select name="type">
			<option value="add" <?=($type == 'add' ? 'selected' : '') ?>>+</option>
			<option value="subtract" <?=($type == 'subtract' ? 'selected' : '') ?>>-</option>
			<option value="multiply" <?=($type == 'multiply' ? 'selected' : '') ?>>*</option>
			<option value="divide" <?=($type == 'divide' ? 'selected' : '') ?>>/</option>
		</select>	
		<input type="text" name="y" placeholder="y" required pattern="[0-9]*[.,]?[0-9]+" value="<?=$y ?>">
		<button>=</button>
		<input type="text" disabled placeholder="result" value="<?=isset($result) ? $result : '' ?>">
	</form>
</body>
</html>
