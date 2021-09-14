<table border="1">
    <tr><th>Imię</th><th>Nazwisko</th><th>Klasa</th></tr>
<?php

$db = mysqli_connect('localhost', 'root', '', 'osoby');

$result = mysqli_query($db, 'SELECT * FROM dane ORDER BY id;');

while ($row = mysqli_fetch_assoc($result)) {
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
