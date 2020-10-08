<?php
	if (!empty($_GET['surname']) && !empty($_GET['name'])) {
		$name = trim($_GET['name']);
		$surname = trim($_GET['surname']);
		$name = strtoupper($name[0]).strtolower(substr($name, 1));
		$surname = strtoupper($surname[0]).strtolower(substr($surname, 1));
		echo "Imię i nazwisko: $name $surname<hr>";
		echo '<a href="'.basename($_SERVER['SCRIPT_FILENAME']).'">Powrót do formularza</a>';
		exit;
	}
?>

<form method="get">
<input type="text" name="name" autofocus /><br><br>
<input type="text" name="surname" autofocus /><br><br>
<input type="submit" value="Wyślij" /><hr>
</form>
