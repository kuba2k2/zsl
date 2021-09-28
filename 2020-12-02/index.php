<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz</title>
</head>
<body>
    <form action="szczodrzynski_kuba.php" method="get">
        <label for="name">Imię:</label><br>
        <input type="text" name="name" id="name" required><br>
        <label for="surname">Nazwisko:</label><br>
        <input type="text" name="surname" id="surname" required><br>

        <label for="a">Liczba a:</label><br>
        <input type="text" name="a" id="a" required pattern="[0-9]*.?[0-9]+"><br>
        <label for="b">Liczba b:</label><br>
        <input type="text" name="b" id="b" required pattern="[0-9]*.?[0-9]+"><br>

        <button type="submit">Prześlij</button>
    </form>
</body>
</html>
