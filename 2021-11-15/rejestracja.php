<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nasze hobby</title>
	<link rel="stylesheet" href="hobby.css">
</head>
<body>
	<div class="baner"><h1>FORUM HOBBYSTYCZNE</h1></div>
	<div class="panel lewy">
		<?php
		if (isset($_POST['nick'])) {
			$nick = $_POST['nick'];
			$hobby = $_POST['hobby'];
			$zawod = $_POST['zawod'];
			$plec = $_POST['plec'];
			$login = $_POST['login'];
			$haslo = $_POST['haslo'];

			echo '<span>Konto '.$nick.' zostało zarejestrowane na forum hobbystycznym</span>';

			$db = mysqli_connect('localhost', 'zsl', '', 'zsl');
			$stmt = mysqli_prepare($db, 'INSERT INTO Uzytkownicy (nick, zainteresowania, zawod, plec) VALUES (?, ?, ?, ?);');
			mysqli_stmt_bind_param($stmt, 'ssss', $nick, $hobby, $zawod, $plec);
			mysqli_stmt_execute($stmt);
			$stmt = mysqli_prepare($db, 'INSERT INTO Konta (login, haslo) VALUES (?, ?);');
			mysqli_stmt_bind_param($stmt, 'ss', $login, $haslo);
			mysqli_stmt_execute($stmt);
			mysqli_close($db);
		}
		?>
	</div>
	<div class="panel prawy">
		<h3>TEMATYKA FORUM</h3>
		<ul>
			<li>Hodowla zwierząt
				<ul>
					<li>psy</li>
					<li>koty</li>
				</ul>
			</li>
			<li>Muzyka</li>
			<li>Gry komputerowe</li>
		</ul>
	</div>
</body>
</html>
