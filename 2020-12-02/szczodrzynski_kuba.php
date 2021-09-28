<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela</title>
    <style>
        td {
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php
        ini_set('display_errors', 'on');
        error_reporting(E_ALL);

        $valid = [
            isset($_GET['name']),
            isset($_GET['surname']),
            isset($_GET['a']),
            isset($_GET['b']),
            !empty($_GET['name']),
            !empty($_GET['surname']),
            !empty($_GET['a']),
            !empty($_GET['b']),
            preg_match('/^[0-9]*.?[0-9]+$/', $_GET['a']),
            preg_match('/^[0-9]*.?[0-9]+$/', $_GET['b'])
        ];

        if (in_array(false, $valid)) {
            echo 'Wprowadzono nieprawidłowe dane.';
            exit;
        }

        $_GET['name'] = ucwords(trim($_GET['name']));
        $_GET['surname'] = ucwords(trim($_GET['surname']));
        $_GET['name'] = substr($_GET['name'], 0, 10);

        echo '<h1>'.$_GET['surname'].'_'.$_GET['name'].'_gr_3</h1>';

        setlocale(LC_ALL, 'pl');
    ?>

    <table border="1" width="100%" style="text-align: center; ">
        <tr>
            <th colspan="2">

                Data: <?=iconv('windows-1250', 'utf-8', strftime("%e %B %G | %A | godzina: %H:%M:%S")) ?>
            </th>
        </tr>
        <tr>
            <td>Klasa: 3b3t_g2</td>
            <td>
                <?php
                    $n = 'pokaz_wynik';
                    $q = str_replace($n, '', $_SERVER['REQUEST_URI']);
                    if ($q[strlen($q) - 1] == '&') {
                        $q = substr($q, 0, strlen($q) - 1);
                    }
                ?>
                <a href="<?=$q.(isset($_GET[$n]) ? '' : '&'.$n) ?>">
                    <?=(isset($_GET[$n]) ? 'ukryj ' : '') ?>wzór
                </a>
            </td>
        </tr>
    </table>
    <?php
        if (isset($_GET[$n])) {
            include 'function.php';
            echo '<p>Wynik: '.oblicz($_GET['a'], $_GET['b']).'</p>';
        }
    ?>
</body>
</html>
