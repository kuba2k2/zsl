<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Zabiegi</title>
</head>
<body>
	<form method="POST">
	<select name="dzial">
	<?php
	$db = mysqli_connect('localhost', 'zsl', '', 'zsl');
	$result = mysqli_query($db, 'SELECT dzial FROM zabiegi GROUP BY dzial;');
	while ($row = mysqli_fetch_assoc($result)) {
		$checked = ($_POST['dzial'] == $row['dzial'] ? 'selected' : '');
		echo '<option value="'.$row['dzial'].'" '.$checked.'>'.$row['dzial'].'</option>';
	}

	?>
	</select>
	<button>Szukaj</button>
	</form>
	<hr>
	<?php
	if (isset($_POST['dzial'])) {
		$stmt = mysqli_prepare($db, 'SELECT DISTINCT nazwisko, imie FROM wizytyzabiegi
		JOIN zabiegi USING(kod_zabiegu)
		JOIN wizytydane USING(id_wizyty)
		JOIN klienci USING(id_klienta)
		WHERE dzial = ?
		ORDER BY nazwisko, imie;');
		mysqli_stmt_bind_param($stmt, 's', $_POST['dzial']);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $nazwisko, $imie);
		while (mysqli_stmt_fetch($stmt)) {
			echo $nazwisko.' '.$imie.'<br>';
		}
	}

	mysqli_close($db);
	?>
</body>
</html>
