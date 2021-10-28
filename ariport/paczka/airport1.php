<!DOCTYPE html><html lang="en"><head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AIRPODS1</title>
	<link rel="stylesheet" href="styl.css">
</head><body><div class="BANER">
<h1>TABELA ODLOTÓW</h1>
<p>W DNIU 12 kwietnia 2017r.</p>
</div>
<div class="BLOKLEWY">
<form action="airport1.php" method="POST">
<select name="SELECT" id="SELECT">
<option <?=$_POST['SELECT'] == '1' ? "selected" : "" ?> value="1">ZAPYTANIE 1</option>
<option <?=$_POST['SELECT'] == '2' ? "selected" : "" ?> value="2">ZAPYTANIE 2</option>
<option <?=$_POST['SELECT'] == '3' ? "selected" : "" ?> value="3">ZAPYTANIE 3</option>
<option <?=$_POST['SELECT'] == '4' ? "selected" : "" ?> value="4">ZAPYTANIE 4</option>
<option <?=$_POST['SELECT'] == '5' ? "selected" : "" ?> value="5">ZAPYTANIE 5</option>
<option <?=$_POST['SELECT'] == '6' ? "selected" : "" ?> value="6">ZAPYTANIE 6</option>
</select>
<button id="PRZYCISK">WYKONAJ</button>
</form>
</div>

<?php
$ZAPYTANIA = [
	"SELECT code, destination, date_, depart_t, comment FROM DEPARTURES WHERE depart_t BETWEEN '10:00' AND '11:30' AND date_ = '2017-04-12' AND code LIKE 'LH%';",
	"SELECT country, COUNT(*) as `liczba pasażerów` FROM PASSENGERS WHERE age BETWEEN 18 AND 45 GROUP BY country;",
	"SELECT id_p, surname AS nazwisko, code AS kod_lotu, destination, depart_t FROM PASSENGERS JOIN TICKETS USING(id_p) JOIN DEPARTURES USING(id_f)",
	"SELECT code AS kod_lotu, destination, COUNT(*) AS liczba_pasażerów FROM DEPARTURES JOIN TICKETS USING(id_f) GROUP BY id_f;",
	"SELECT id_p, name, surname FROM PASSENGERS JOIN TICKETS USING(id_p) JOIN DEPARTURES USING(id_f) WHERE country = 'Poland' AND comment = 'BOARDING'",
	"SELECT code, destination, date_, depart_t, comment FROM DEPARTURES LEFT JOIN TICKETS USING(id_f) WHERE id_t IS NULL;",
];

?>

<div class="BLOKPRAWY">

<?php

if (isset($_POST['SELECT'])) {
echo '<table border="10">';
$BAZA_DANYCH = mysqli_connect('localhost', 'flightOperator', 'ariport1', 'zsl');
$ZAPYTANIE_WYBRANE = $ZAPYTANIA[$_POST['SELECT']-1];
$WYNIK_WYKONYWANIA_ZAPYTANIA = mysqli_query($BAZA_DANYCH, $ZAPYTANIE_WYBRANE);
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
}

?>

</div>
</body>
</html>
