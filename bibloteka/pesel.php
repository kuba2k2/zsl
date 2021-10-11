<h2>PESEL</h2>
<br>
<br>
<form method="POST">
    <label for="pesel">W numerze PESEL zawarta jest informacja o płci osoby. Jeżeli przedostatnia cyfra numeru
jest parzysta, to PESEL należy do kobiety, jeśli nieparzysta, to do mężczyzny. Formularz ma wyswietlac plec osoby ktorej pesel wpisany w formularzu.</label>
    <br>
    <br>
    <input type="number" minlength="11" maxlength="11" name="pesel" id="pesel" value="<?=$_POST['pesel'] ?>">
    <button>Przeslij</button>
</form>
<br>
<br>
<?php

include 'db.php';
if (isset($_POST['pesel'])) {
    if ($_POST['pesel'][9] % 2 == 0) {
        echo '<p>Kobieta</p>';
    }
    else {
        echo '<p>Mezczyzna</p>';
    }
}
echo '<p><b>Liczba kobiet i liczba mezczyzn wsrod studentow.</b></p>';
    $stmt = mysqli_prepare($db, 'SELECT SUBSTRING(pesel, 10, 1) % 2 = 0 AS mezczyzna, COUNT(*) AS ilosc FROM studenci GROUP BY mezczyzna ORDER BY mezczyzna ASC;');
    mysqli_stmt_execute($stmt);
    echo '<ul>';
    mysqli_stmt_bind_result($stmt, $mezczyzna, $ilosc);
    mysqli_stmt_fetch($stmt);
    echo '<li>KOBIET: '.$ilosc.'</li>';
    mysqli_stmt_fetch($stmt);
    echo '<li>MEZCZYZN: '.$ilosc.'</li>';

    mysqli_stmt_close($stmt);

?>
