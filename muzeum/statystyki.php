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

 // SELECT LEFT(Tytul, 1), COUNT(*) AS Litera FROM obrazy NATURAL JOIN oddzialy WHERE Miejscowosc = "Warszawa" GROUP BY LEFT(Tytul, 1) ORDER BY COUNT(*) DESC;

?>
