<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <?php
        $db = @mysqli_connect('localhost', 'root', '', 'dane3');
        if (!$db) {
            echo 'Błąd łączenia z bazą danych.';
            exit;
        }

        function filmy($query) {
            global $db;
            $result = mysqli_query($db, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="film">
                    <h4><?=$row['id'] ?>. <?=$row['nazwa'] ?></h4>
                    <img src="<?=$row['zdjecie'] ?>" title="film">
                    <p><?=$row['opis'] ?></p>
                </div>
            <?php
            }
        }
    ?>
    <div class="baner lewy">
        <h1><a href="skrypt.html">Internetowa wypożyczalnia filmów</a></h1>
    </div>
    <div class="baner prawy">
        <table>
            <tr>
                <th>Kryminał</th>
                <th>Horror</th>
                <th>Przygodowy</th>
            </tr>
            <tr>
                <td>20</td>
                <td>30</td>
                <td>20</td>
            </tr>
        </table>
    </div>
    <div class="lista polecamy">
        <h3>Polecamy</h3>
        <?php
            filmy('SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN (18, 22, 23, 25);');
        ?>
    </div>
    <div class="lista filmy">
        <h2>Filmy fantastyczne</h2>
        <?php
            filmy('SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id = 12;');
        ?>
    </div>
    <div class="stopka">
        <form action="usun.php" method="post">
            Usuń film nr.: <input type="number" name="film" id="film">
            <button>Usuń film</button>
        </form>
        <p><i>Stronę wykonał: <a href="mailto:ja@poczta.com">Szczodrzyński</a></i></p>
    </div>
    <?php
        mysqli_close($db);
    ?>
</body>
</html>
