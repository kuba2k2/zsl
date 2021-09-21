<?php
$db = mysqli_connect('localhost', 'root', '', 'osoby');

if (isset($_POST['osoba'])) {
?>
<table border="1">
    <tr><th>Imię</th><th>Nazwisko</th><th>Klasa</th></tr>
<?php
    $result = mysqli_query($db, 'SELECT * FROM dane WHERE id = '.$_POST['osoba'].' ORDER BY id;');
    if ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <td><?=$row['imie']?></td>
            <td><?=$row['nazwisko']?></td>
            <td><?=$row['klasa']?></td>
        </tr>
    <?php
    }
?>
</table>
<?php
}
?>

<form method="POST"><select id="osoba" name="osoba">
<?php

$result = mysqli_query($db, 'SELECT * FROM dane ORDER BY id;');

while ($row = mysqli_fetch_assoc($result)) {
?>
    <option value="<?=$row['id'] ?>"><?=$row['nazwisko'].' klasa '.$row['klasa'] ?></option>
<?php
}
?>
</select><button type="submit">OK</button></form>
