<h2>ODDZIALY</h2>
<br>
<br>
<?php

include 'db.php';

$stmt = mysqli_prepare($db, 'SELECT Miejscowosc, COUNT(*) AS Ilosc FROM oddzialy NATURAL JOIN obrazy GROUP BY ID_oddzialu ORDER BY Miejscowosc;');
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $miejscowosc, $ilosc);

echo '<table>';
while (mysqli_stmt_fetch($stmt)) {
?>
    <tr>
        <td><?= $miejscowosc ?></td>
        <td><?= $ilosc ?></td>
    </tr>
<?php
}
mysqli_stmt_close($stmt);
echo '</table>';

?>
