<?php

include 'db.php';

echo '<h3>Statystyki</h3>';

echo '<h4>Zadanie 1</h4>';
$stmt = mysqli_prepare($db, 'SELECT imie, nazwisko, tytul FROM wypozyczenia NATURAL JOIN studenci WHERE pesel = (SELECT pesel FROM wypozyczenia GROUP BY pesel ORDER BY COUNT(*) DESC LIMIT 1);');
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $imie, $nazwisko, $tytul);
mysqli_stmt_fetch($stmt);

echo '<p>Imie i nazwisko: '.$imie.' '.$nazwisko.'</p>';

echo '<p>Tytuly ksiazek:</p>';

echo '<ul>';
echo '<li>'.$tytul.'</li>';
while (mysqli_stmt_fetch($stmt)) {
?>
<li><?=$tytul ?></li>
<?php
}
mysqli_stmt_close($stmt);
echo '</ul>';

echo '<h4>Zadanie 2</h4><p>Srednia liczba osob zameldowanych w jednym pokoju (wynik zaokraglonydo 4 miejsc po przecinku):';
$stmt = mysqli_prepare($db, 'SELECT ROUND(AVG(ilosc), 4) FROM (SELECT COUNT(*) AS ilosc FROM meldunek GROUP BY id_pok) a;');
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $srednia);
mysqli_stmt_fetch($stmt);
echo ' '.$srednia.'</p>';
mysqli_stmt_close($stmt);

echo '<h4>Zadanie 3</h4><p>Studenci, ktorzy nie mieszkaja w pokojach w miasteczku akademickim:</p>';
$stmt = mysqli_prepare($db, 'SELECT imie, nazwisko FROM studenci LEFT JOIN meldunek USING(pesel) WHERE id_pok IS NULL ORDER BY nazwisko ASC;');
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $imie, $nazwisko);
echo '<ul>';
while (mysqli_stmt_fetch($stmt)) {
?>
<li><?=$nazwisko.' '.$imie ?></li>
<?php
}
mysqli_stmt_close($stmt);
echo '</ul>';
mysqli_stmt_close($stmt);


?>
