<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $name = 'Janusz';
        $surname = 'Ultra';
        echo "Imię: $name<br>";
        echo "Nazwisko: $surname<br>";

        $imienazwisko = $surname . ' + ' . $name;

        echo "<h1>";
        echo 'żabi skrypt';
        echo '<br>' . $imienazwisko;
        echo "</h1>";

        //typy danych
        //boolean
        $prawda = false; // nic nie wświetliy
        $fłsz = true; // 1
        echo $fłsz;

        //integer
        $binarna = 0b10011;
        $minuta = 0x000001;
        echo 'siedzimy w szkole tutaj o godzinie '.$binarna.':0'.$minuta;
        echo '<hr>';

        //składnia heredoc (hirdok)
        // nie wiedziłem w sumieże tak tos ęnazywai a
        $hirdok = <<< HYPER
        Imie: hirdok
        HYPER;
        echo nl2br($hirdok);

    ?>
</body>
</html>