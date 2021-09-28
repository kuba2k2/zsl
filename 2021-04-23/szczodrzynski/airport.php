<?php
    $db = mysqli_connect('localhost', 'root', '', 'egzamin');

    $msg = '<b>Miło nam, że nas znowu odwiedziłeś</b>';
    if (!isset($_COOKIE['komunikat'])) {
        $msg = '<i>Dzień dobry! Sprawdź regulamin naszej strony</i>';
        setcookie('komunikat', '1', time() + 60 * 60);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odloty samolotów</title>
    <link rel="stylesheet" href="styl6.css">
</head>

<body>
    <header>
        <div class="first">
            <h2>Odloty z lotniska</h2>
        </div>
        <div class="second"><img src="zad6.png" alt="logotyp"></div>
    </header>
    <div style="clear: both;"></div>
    <section>
        <h4>tabela odlotów</h4>
        <table>
            <tr>
                <th>lp.</th>
                <th>numer rejsu</th>
                <th>czas</th>
                <th>kierunek</th>
                <th>status</th>
            </tr>
            <?php
                $query = mysqli_query($db, "SELECT id, nr_rejsu, czas, kierunek, status_lotu FROM odloty ORDER BY czas DESC;");
                while ($row = mysqli_fetch_array($query)) {
                    echo <<<E
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[nr_rejsu]</td>
                        <td>$row[czas]</td>
                        <td>$row[kierunek]</td>
                        <td>$row[status_lotu]</td>
                    </tr>
                    E;
                }
                mysqli_close($db);
            ?>
        </table>
    </section>
    <footer>
        <div class="first">
            <a href="kw1.jpg" target="_blank">Pobierz obraz</a>
        </div>
        <div class="second">
            <p><?=$msg ?></p>
        </div>
        <div class="third">
            Autor: Kuba Szczodrzyński
        </div>
    </footer>
</body>

</html>
