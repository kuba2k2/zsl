<h2>SPIS WYPOZYCZONYCH KSIAZEK</h2>
<br>
<br>
<form method="POST">
    <label for="pesel">PESEL:</label>
    <input type="number" minlength="11" maxlength="11" name="pesel" id="pesel" value="<?=$_POST['pesel'] ?>">
    <button>Przeslij</button>
</form>
<br>
<br>
<?php

if (isset($_POST['pesel'])) {
    include 'db.php';

    echo '<p>PESEL: '.$_POST['pesel'].'<p>';

    $stmt = mysqli_prepare($db, 'SELECT tytul FROM wypozyczenia WHERE pesel = ?;');
    mysqli_stmt_bind_param($stmt, 's', $_POST['pesel']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $tytul);

    echo '<table>';
    $i = 0;
    while (mysqli_stmt_fetch($stmt)) {
?>
        <tr>
            <td><?= $tytul ?></td>
        </tr>
<?php
        $i++;
    }
    mysqli_stmt_close($stmt);
    echo '</table>';

    echo '<p>Liczba wypozyczonych ksiazek: '.$i.'</p>';
}

?>
