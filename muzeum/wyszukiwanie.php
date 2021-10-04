<h2>WYSZUKIWANIE TYTULU</h2>
<br>
<br>
<form method="POST">
    <label for="tytul">Wpisz tytul lub fragment tytulu</label>
    <br>
    <br>
    <input type="text" name="tytul" id="tytul" value="<?=$_POST['tytul'] ?>">
    <button>Przeslij</button>
</form>
<br>
<br>
<?php

if (isset($_POST['tytul'])) {
    include 'db.php';

    $stmt = mysqli_prepare($db, 'SELECT Imie, Nazwisko, Tytul FROM obrazy NATURAL JOIN malarze WHERE Tytul LIKE ?;');
    $tytul = '%' . $_POST['tytul'] . '%';
    mysqli_stmt_bind_param($stmt, 's', $tytul);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $imie, $nazwisko, $tytul);

    echo '<table>';
    while (mysqli_stmt_fetch($stmt)) {
?>
        <tr>
            <td><?= $imie ?></td>
            <td><?= $nazwisko ?></td>
            <td><?= $tytul ?></td>
        </tr>
<?php
    }
    mysqli_stmt_close($stmt);
    echo '</table>';
}

?>
