<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>piłka nożna</title>
	<link rel="stylesheet" href="styl2.css">
</head>
<body>
	<?php
		$db = mysqli_connect('localhost', 'zsl', '', 'zsl');
	?>
	<div class="baner">
		<h3>Reprezentacja polski w piłce nożnej</h3>
		<img src="obraz1.jpg" alt="reprezentacja">
	</div>
	<div class="blok lewy">
		<form action="liga.php" method="post">
			<select name="pozycja" id="pozycja">
				<option value="1">Bramkarze</option>
				<option value="2">Obrońcy</option>
				<option value="3">Pomocnicy</option>
				<option value="4">Napastnicy</option>
			</select>
			<button>Zobacz</button>
		</form>
		<img src="zad2.png" alt="piłka">
		<p>Autor: 12345678910</p>
	</div>
	<div class="blok prawy">
		<ol>
			<?php
				if (isset($_POST['pozycja'])) {
					$stmt = mysqli_prepare($db, 'SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = ?;');
					mysqli_stmt_bind_param($stmt, 'i', $_POST['pozycja']);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt, $imie, $nazwisko);
					while (mysqli_stmt_fetch($stmt)) {
						echo '<li><p>'.$imie.' '.$nazwisko.'</p></li>';
					}
				}
			?>
		</ol>
	</div>
	<div class="glowny">
		<h3>Liga mistrzów</h3>
	</div>
	<div class="liga">
		<?php
			$result = mysqli_query($db, 'SELECT zespol, punkty, grupa FROM liga ORDER BY punkty DESC;');
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<div><h2>'.$row['zespol'].'</h2><h1>'.$row['punkty'].'</h1><p>grupa: '.$row['grupa'].'</p></div>';
			}
		?>
	</div>
	<?php
		mysqli_close($db);
	?>
</body>
</html>
