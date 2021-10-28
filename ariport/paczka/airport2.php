<!DOCTYPE html><html lang="en"><head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AIRPODS2</title>
	<link rel="stylesheet" href="styl.css">
</head><body><div class="BANER">
<h1>AKTUALIZUJ LOT</h1>
</div>
<div class="BLOKLEWY">
<form action="airport2.php" method="POST">
<p>NUMER LOTU:</p>
<input type="number" name="id_f" id="id_f">
<p>KOMENTARZ:</p>
<select name="comment" id="comment">
<option value="BOARDING">BOARDING</option>
<option value="NULL">NULL</option>
<option value="CLOSED">CLOSED</option>
<option value="DELAYED">DELAYED</option>
</select>
<button id="PRZYCISK">AKTUALIZUJ</button>
</form>
</div>

<div class="BLOKPRAWY">

<?php

echo '<table border="10">';
$BAZA_DANYCH = mysqli_connect('localhost', 'flightOperator', 'ariport1', 'zsl');

if (isset($_POST['id_f'])) {
	if ($_POST['comment'] === 'NULL') {
		mysqli_query($BAZA_DANYCH, 'UPDATE DEPARTURES SET comment = NULL WHERE id_f = '.$_POST['id_f']);
	} else {
		mysqli_query($BAZA_DANYCH, 'UPDATE DEPARTURES SET comment = "'.$_POST['comment'].'" WHERE id_f = '.$_POST['id_f']);
	}
}

$WYNIK_WYKONYWANIA_ZAPYTANIA = mysqli_query($BAZA_DANYCH, 'SELECT * FROM DEPARTURES;');
$CZY_WYSWIETLIC_NAGLOWEK = true;
while ($WIERSZ_TABELI = mysqli_fetch_assoc($WYNIK_WYKONYWANIA_ZAPYTANIA)) {
if ($CZY_WYSWIETLIC_NAGLOWEK) {
$CZY_WYSWIETLIC_NAGLOWEK = false;
echo '<tr><th>';
echo implode('</th><th>', array_keys($WIERSZ_TABELI));
echo '</th></tr>';
}
echo '<tr><td>';
echo implode('</td><td>', array_values($WIERSZ_TABELI));
echo '</td></tr>';
}
echo '</table>';

?>

</div>
</body>
</html>
