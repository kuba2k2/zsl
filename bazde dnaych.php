<?php
$db = mysqli_connect('localhost', 'root', '', 'osoby');

if (isset($_POST['osoba'])) {
    var_dump($_POST['osoba']);
?>
<table border="1">
    <tr><th>Imię</th><th>Nazwisko</th><th>ID</th></tr>
<?php
    $result = mysqli_query($db, 'SELECT * FROM kandydaci ORDER BY idosoby;');
    while ($row = mysqli_fetch_assoc($result)) {
        if (array_search($row['idosoby'], $_POST['osoba']) === false)
            continue;
    ?>
        <tr>
            <td><?=$row['imie']?></td>
            <td><?=$row['nazwisko']?></td>
            <td><?=$row['idosoby']?></td>
        </tr>
    <?php
    }
?>
</table>
<?php
}
?>

<form method="POST">
<?php

$result = mysqli_query($db, 'SELECT * FROM kandydaci ORDER BY idosoby;');

while ($row = mysqli_fetch_assoc($result)) {
?>
    <input type="checkbox" name="osoba[]" value="<?=$row['idosoby'] ?>">
    <label for="<?=$row['idosoby'] ?>"><?=$row['imie'].' '.$row['nazwisko'] ?></label>
    <br>
<?php
}
?>
<button type="submit">OK</button></form>
