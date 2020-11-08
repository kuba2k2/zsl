<?php

	function showPage($name, $title, $data, $results) {
		session_start();
		// var_dump($_SESSION);
		echo "<h3>$title</h3>";
		echo "<img src=\"$name.png\">";
		echo "<hr>";

		echo "<h4>Dane</h4>";
		echo "<form action=\"$name.php\" method=\"POST\">";
		echo '
		<table border="0">
			<tr>
				<th style="min-width: 50px;">&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>
		';
		$hasAll = true;
		$errors = [];
		foreach ($data as $item) {
			$itemName = $name.'_'.$item['name'];
			$value = isset($_POST[$itemName]) ? $_POST[$itemName] : (isset($_SESSION[$itemName]) ? $_SESSION[$itemName] : '');

			echo <<<E
			<tr>
				<td><label for="$itemName">{$item['title']}</label></td>
				<td><input type="text" pattern="[0-9]*[.,]?[0-9]+" id="$itemName" name="$itemName" placeholder="{$item['title']}" value="$value"></td>
				<td>{$item['unit']}</td>
			</tr>
E;
			if ($_SERVER['REQUEST_METHOD'] == 'POST' || !empty($value)) {
				if (empty($value) && $value !== '0') {
					$errors[] = "{$item['title']}: nie podano wartości.";
					continue;
				}
				$value = str_replace(',', '.', $value);
				if (!is_numeric($value)) {
					$errors[] = "{$item['title']}: musi być liczbą.";
					continue;
				}
				$value = floatval($value);
				if ($value == 0) {
					$errors[] = "{$item['title']}: nie może być 0.";
					continue;
				}
				if ($value < 0) {
					$errors[] = "{$item['title']}: musi być liczbą dodatnią.";
					continue;
				}
				$_SESSION[$itemName] = $value;
			}
			else {
				$hasAll = false;
			}
		}
		echo '</table>';
		echo '<button type="submit">Oblicz</button>';
		echo '</form>';

		foreach ($errors as $error) {
			echo "<h4 style=\"color: red;\">$error</h4>";
		}

		if ($hasAll && empty($errors)) {
			include "scripts/$name.php";
			echo '<ul>';
			foreach ($results as $result) {
				$func = $name.'_'.$result['func'];
				$input = [];
				foreach ($result['input'] as $key) {
					$input[] = $_SESSION[$name.'_'.$key];
				}
				$value = $func(...$input);
				$value = number_format($value, 2, ',', ' ');
				echo "<li>{$result['title']}: $value {$result['unit']}</li>";
			}
			echo '</ul>';
		}

		echo '<a href="3_zadanie_formularze_geometria.php"><h3>Powrót</h3></a>';
	}
