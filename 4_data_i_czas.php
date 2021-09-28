<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function days_in_year() {
            return cal_days_in_month(CAL_GREGORIAN, 2, date('Y')) == 29 ? 366 : 365;
        }

        function day_of_year() {
            return date('z') + 1;
        }
    ?>
    <h1>Data i czas</h1>
    <form>
        <input type="date" value="<?=date('Y-m-d') ?>"><br>
        <input type="time" value="<?=date('H:i') ?>"><br>
        <?php
            setlocale(LC_TIME, 'PL');
        ?>
        <input type="text" value="<?=strftime('%A') ?>"><br>
        <input type="text" value="<?=strftime('%d %B %Y, %H:%M:%S | %A') ?>"><br>
    </form>
    <ul>
        <li><?=days_in_year() ?> dni w roku</li>
        <li><?=day_of_year() ?> dzień roku</li>
        <li><?=strftime('%U') ?> tydzień roku</li>
        <li><?=days_in_year() - day_of_year() ?> dni do końca roku</li>
    </ul>
</body>
</html>
