<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Personalia</title>
	<style>
		ol {
			list-style-type: upper-roman;
		}
	</style>
</head>

<body>
	<form method="POST">
		<select name="zawod">
			<?php
			$db = mysqli_connect('localhost', 'zsl', '', 'zsl');
			$result = mysqli_query($db, 'SELECT zawod FROM Dane GROUP BY zawod;');
			while ($row = mysqli_fetch_assoc($result)) {
				$checked = (isset($_POST['zawod']) && $_POST['zawod'] == $row['zawod'] ? 'selected' : '');
				echo '<option value="' . $row['zawod'] . '" ' . $checked . '>' . $row['zawod'] . '</option>';
			}

			?>
		</select>
		<button>Szukaj</button>
	</form>
	<hr>
	<?php
	if (isset($_POST['zawod'])) {
		$stmt = mysqli_prepare($db, 'SELECT DISTINCT imie, nazwisko, data_ur, zawod, zdjecie FROM Osoby JOIN Dane USING(id_osoby) WHERE zawod = ?;');
		mysqli_stmt_bind_param($stmt, 's', $_POST['zawod']);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $imie, $nazwisko, $data_ur, $zawod, $zdjecie);

		echo '<table>';
		echo '<tr><th>';
		echo implode('</th><th>', ['Imię', 'Nazwisko', 'Data urodzenia', 'Zawód', 'Zdjęcie']);
		echo '</th></tr>';

		while (mysqli_stmt_fetch($stmt)) {
			$zdjecie = '<img src="'.$zdjecie.'">';
			echo '<tr><td>';
			echo implode('</td><td>', [$imie, $nazwisko, $data_ur, $zawod, $zdjecie]);
			echo '</td></tr>';
		}
		echo '</table>';
		echo '<hr>';
	}

	$stmt = mysqli_prepare($db, 'SELECT DISTINCT imie, nazwisko, data_ur FROM Osoby JOIN Dane USING(id_osoby);');
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $imie, $nazwisko, $data_ur);
	$osoby = [];
	while (mysqli_stmt_fetch($stmt)) {
		$osoba = implode(' ', [$imie, $nazwisko, $data_ur]);
		if (substr($data_ur, 5) == date('m-d')) {
			$osoba = $osoba.' (Ma urodziny)';
		}
		$osoby[] = $osoba;
	}
	$text = implode("\n", $osoby);
	echo '<textarea cols=100 rows=20>'.$text.'</textarea>';
	file_put_contents('wynik.txt', $text);

	mysqli_close($db);
	?>
	<hr>
	<ol>
		<li><?= implode('</li><li>', explode("\n", file_get_contents('wynik.txt'))) ?></li>
	</ol>
</body>

</html>
