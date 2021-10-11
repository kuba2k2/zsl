<h2>STATYSTYKI</h2>
<br>
<br>
<?php

include 'db.php';

echo '<b>Odp 1</b><br><br>';
$stmt = mysqli_prepare($db, 'SELECT Imie, Nazwisko, COUNT(*) AS Ilosc FROM obrazy NATURAL JOIN malarze WHERE Stan = "ekspozycja czasowa" OR Stan = "ekspozycja stala" GROUP BY ID_malarza ORDER BY Ilosc DESC LIMIT 2;');
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $imie, $nazwisko, $ilosc);

echo '<table>';
while (mysqli_stmt_fetch($stmt)) {
?>
    <tr>
        <td><?= $imie ?></td>
        <td><?= $nazwisko ?></td>
        <td><?= $ilosc ?></td>
    </tr>
<?php
}
mysqli_stmt_close($stmt);
echo '</table>';

echo '<br><br><b>Odp 2</b><br><br>';
$stmt = mysqli_prepare($db, 'SELECT LEFT(Tytul, 1) AS Litera, COUNT(*) AS Liczba FROM obrazy NATURAL JOIN oddzialy WHERE Miejscowosc = "Warszawa" GROUP BY LEFT(Tytul, 1) ORDER BY COUNT(*) DESC;');
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $litera, $liczba);
mysqli_stmt_fetch($stmt);
echo '<p>'.$litera.'</p>';
mysqli_stmt_close($stmt);



echo '<br><br><b>Odp 3</b><br><br>';
$stmt = mysqli_prepare($db, 'SELECT Imie, Nazwisko, COUNT(*) AS Ilosc FROM obrazy NATURAL JOIN malarze WHERE Stan = "wypozyczony" GROUP BY ID_malarza ORDER BY Ilosc DESC LIMIT 1;');
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $imie, $nazwisko, $ilosc);
mysqli_stmt_fetch($stmt);
echo '<p>'.$imie.' '.$nazwisko.'</p>';
?>
