<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Układ strony</title>
    <style>
        body {
            width: 800px;
            margin: 10px auto;
            text-align: justify;
            background: url("ARGYLE.BMP");
            color: white;
        }
        .menu {
            background-color: red;
            padding: 10px;
            text-align: center;
        }
        .menu a {
            margin: 20px;
            margin-left: 70px;
            margin-right: 70px;
            color: #ffb300;
            font-family: 'Comic Sans MS';
            font-size: 18px;
            text-decoration: none;
        }

        h1 {
            text-align: center;
        }

        #img2 {
            float: left;
            margin: 10px;
            border: 10px solid #2196f3;
        }

        .iframe {
            text-align: center;
        }
    </style>
</head>
<body>
    <img src="https://picsum.photos/800/100" alt="obrazek 1">
    <div class="menu">
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
        <a href="#">Link 4</a>
    </div>
    <h1>Lorem ipsum</h1>

    <table border="1">
        <tr><th>PESEL</th><th>Data prawa jazdy</th><th>Miasto</th></tr>
    <?php
    $db = mysqli_connect('localhost', 'zsl', '', 'zsl');


    if (isset($_POST['pesel'])) {
        $stmt = mysqli_prepare($db, 'insert into kierowcy (pesel, data_prawa_jazdy, miasto) values (?, ?, ?);');
        mysqli_stmt_bind_param($stmt, 'sss', $_POST['pesel'], $_POST['data_prawa_jazdy'], $_POST['miasto']);
        mysqli_stmt_execute($stmt);
    }


    $result = mysqli_query($db, 'select * from kierowcy order by data_prawa_jazdy desc limit 10');
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr><td><?=$row['pesel'] ?></td><td><?=$row['data_prawa_jazdy'] ?></td><td><?=$row['miasto'] ?></td></tr>
    <?php
    }
    ?>
    </table>


    <ol>
    <?php
    $result = mysqli_query($db, 'select nazwa from wykroczenia where nazwa LIKE "%naruszenie zakazu%"');
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <li><?=$row['nazwa'] ?></li>
    <?php
    }
    ?>
    </ol>

    <h3>Dodaj kierowcę</h3>
    <form action="index.php" method="post">
        <label for="pesel">PESEL</label><br>
        <input type="text" name="pesel" id="pesel" minlength="11" maxlength="11" required><br>
        <label for="data_prawa_jazdy">Data prawa jazdy</label><br>
        <input type="date" name="data_prawa_jazdy" id="data_prawa_jazdy" required><br>
        <label for="miasto">Miasto</label><br>
        <input type="text" name="miasto" id="miasto" required><br>
        <button>Dodaj</button>
    </form>

    <hr>
    <img src="https://picsum.photos/200/200" alt="obrazek 2" id="img2">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita est suscipit consequatur perspiciatis, delectus voluptatibus quas! Sit, aperiam eligendi nemo earum perspiciatis repellendus at perferendis fugiat ipsa suscipit praesentium velit? Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus reiciendis sapiente minus assumenda repudiandae a maiores qui perspiciatis quo in. Eaque quasi voluptas iure. Ut, asperiores non. Fuga, corrupti earum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate eum porro, esse vel quo eveniet fuga atque, autem excepturi reprehenderit quidem ipsum repudiandae consequatur laboriosam voluptatibus voluptatem voluptas dolore nam? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum modi necessitatibus amet natus, excepturi in laboriosam earum? Fuga, dolorum rem! Ducimus recusandae dolorem autem reiciendis culpa maxime fugit officiis quidem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit tenetur magnam ipsa esse, ullam eius non eaque omnis, illum at sapiente maxime id, minus officiis nulla dignissimos numquam molestias delectus.</p>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi similique, delectus explicabo natus deleniti ducimus. Delectus ducimus doloribus, vitae necessitatibus sequi ullam cupiditate. Perspiciatis quae distinctio adipisci eum fugiat laboriosam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis consequatur repudiandae voluptatem distinctio hic placeat nesciunt cupiditate, sapiente officia iure dolore corporis voluptatibus similique rerum. Exercitationem deleniti dolorem nihil. Minima? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed quia ratione dolorum eius. Reiciendis totam sit id saepe cum sint quaerat, sapiente quidem eos voluptas tenetur blanditiis dolor aut voluptatum? Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit perferendis asperiores laboriosam a! Optio, voluptatibus iste. Aliquam magnam voluptatum, cupiditate earum atque non quod asperiores est nihil iste porro reiciendis!</p>
    <div class="iframe">
        <iframe src="https://www.youtube.com/embed/4V2C0X4qqLY" frameborder="0" width="600" height="400"></iframe>
    </div>
    <hr>
    <p style="text-align: center;">
        Strona wykonana przez Jakub Szczodrzyński
    </p>
</body>
</html>
