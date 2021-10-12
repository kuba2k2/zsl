<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista przyjaciół</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div class="baner">
        <h1>Portal Społecznościowy - moje konto</h1>
    </div>
    <div class="glowny">
        <h2>Moje zainteresowania</h2>
        <ul>
            <li>muzyka</li>
            <li>film</li>
            <li>komputery</li>
        </ul>
        <h2>Moi znajomi</h2>
        <?php
            $db = new mysqli('localhost', 'root', '', 'dane');

            $result = $db->query('SELECT imie, nazwisko, opis, zdjecie FROM osoby JOIN hobby ON Hobby_id = hobby.id WHERE hobby.id IN (1, 2, 6);');

            while ($row = $result->fetch_assoc()) { ?>
                <div class="zdjecie">
                    <img src="<?=$row['zdjecie'] ?>" alt="przyjaciel">
                </div>
                <div class="opis">
                    <h3><?=$row['imie'].' '.$row['nazwisko'] ?></h3>
                    <p>Ostatni wpis: <?=$row['opis'] ?></p>
                </div>
                <div class="linia"><hr></div>
            <?php }

            $db->close();
        ?>
    </div>
    <div class="stopka lewy">
        <span>Stronę wykonał: 02291101234</span>
    </div>
    <div class="stopka prawy">
        <a href="mailto:ja@portal.pl">napisz do mnie</a>
    </div>
</body>
</html>