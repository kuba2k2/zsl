<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka</title>
    <style>
        body {
            background: #DCDCDC;
            text-align: center;
            color: black;
        }

        header {
            width: 1000px;
            height: 100px;
            background-color: #483D8B;
            color:white;
        }

        header h1 {
            position: relative;
            top: 50%;
            transform: translateY(-50%);
            display: inline-block;
            margin: 0;
        }

        nav {
            float: left;
            width: 200px;
            height: 600px;
            background-color: #70B090;
            box-sizing: border-box;
            padding: 20px;
        }

        section {
            float: left;
            background-color: lightgrey;
            padding: 20px;
            width: 600px;
            height: 600px;
            box-sizing: border-box;
        }

        footer {
            clear: both;
            width: 1000px;
            height: 50px;
            background-color: #483D8B;
            color:white;
        }

        footer span {
            position: relative;
            top: 50%;
            transform: translateY(-50%);
            display: inline-block;
        }

        table, tr, td {
            border: 1px solid;
            border-collapse: collapse;
        }

        section table {
            margin: 0 auto;
        }

        td {
            padding: 5px;
        }

        a {
            text-decoration: none;
        }

        section h3 {
            color: red;
        }
    </style>
</head>
<body>
<?php
    if (!isset($_GET['page'])) {
        $_GET['page'] = 'statystyki';
    }
?>
    <div class="container">
        <header>
            <h1>Biblioteka podrecznikow</h1>
        </header>

        <nav>
            <a href="index.php?page=spis">Spis wypozyczen</a><br>
            <a href="index.php?page=statystyki">Statystyki</a><br>
            <a href="index.php?page=pesel">Sprawdz pesel</a><br>
        </nav>
        <section>
<?php
    include $_GET['page'] . '.php';
?>
        </section>
        <nav>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque et mollitia itaque eos! Beatae, asperiores aliquam. Blanditiis quas culpa expedita mollitia voluptatem, eos eius ratione repellendus nobis eligendi excepturi reprehenderit.
        </nav>
        <footer>
            <span>Biblioteka podrecznikow &copy; Wszelkie prawa zastrzezone</span>
        </footer>
    </div>
</body>
</html>
