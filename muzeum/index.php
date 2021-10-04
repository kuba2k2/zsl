<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muzeum</title>
    <style>
        body {
            background: rgb(169, 169, 169);
        }
        nav {
            float: left;
            width: 20%;
            background: rgb(0, 134, 179);
            min-height: 800px;
            padding-top: 30px;
            box-sizing: border-box;
        }

        nav a {
            color: black;
            text-decoration: none;
            margin-left: 30px;
            margin-top: 10px;
            display: inline-block;
        }

        header {
            background: rgb(0, 77, 102);
            height: 120px;
            width: 100%;
            text-align: center;
            color: white;
        }

        header h1 {
            position: relative;
            top: 50%;
            transform: translateY(-50%);
            display: inline-block;
            margin: 0;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        section {
            background: rgb(211, 211, 211);
            width: 80%;
            float: right;
            min-height: 800px;
            text-align: center;
        }

        footer {
            clear: both;
            background: rgb(0, 77, 102);
            height: 50px;
            width: 100%;
            text-align: center;
            color: white;
            box-sizing: border-box;
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

        section b {
            color: red;
        }
    </style>
</head>
<body>
<?php
    if (!isset($_GET['page'])) {
        $_GET['page'] = 'wyszukiwanie';
    }
?>
    <div class="container">
        <header>
            <h1>Muzeum Narodowe</h1>
        </header>
        <nav>
            <a href="index.php?page=wyszukiwanie">Wyszukiwanie tytulu</a><br>
            <a href="index.php?page=oddzialy">Oddzialy</a><br>
            <a href="index.php?page=statystyki">Statystyki</a><br>
        </nav>
        <section>
<?php
    include $_GET['page'] . '.php';
?>
        </section>
        <footer>
            <span>&copy; Wszelkie prawa zastrzezone</span>
        </footer>
    </div>
</body>
</html>
