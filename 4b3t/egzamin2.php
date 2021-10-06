<style>
	table, th, td {
		border: 2px #666 solid;
		border-collapse: collapse;
	}
	td {
		padding: 5px;
		width: 12%;
		background-color: #AEEDED;
	}
	th {
		padding: 10px;
	}
	td h5 {
		text-align: center;
	}
</style>

<?php

$db = mysqli_connect('localhost', 'zsl', '', 'zsl');

if (isset($_POST['tekst'])) {
	$stmt = mysqli_prepare($db, 'UPDATE zadania SET wpis = ? WHERE dataZadania = "2020-07-13";');
    mysqli_stmt_bind_param($stmt, 's', $_POST['tekst']);
    mysqli_stmt_execute($stmt);
	echo 'Zmieniono zadanie<br>';
}

$result = mysqli_query($db, 'SELECT miesiac, rok FROM zadania WHERE dataZadania = "2020-07-01";');
if ($row = mysqli_fetch_assoc($result)) {
	echo '<h3>miesiąc: '.$row['miesiac'].', rok: '.$row['rok'].'</h3>';
}

$result = mysqli_query($db, 'SELECT dataZadania, wpis FROM zadania WHERE MONTH(dataZadania) = 7;');
echo '<table><tr>';
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
	echo '<td><h5>'.$row['dataZadania'].'</h5><p>'.$row['wpis'].'</p></td>';
	$i++;
	if ($i > 0 && ($i % 7 == 0)) {
		echo '</tr><tr>';
	}
}
echo '</tr></table>';

?>

<form method="post">
	<label for="tekst">Podaj tekst: </label><br>
	<input type="text" name="tekst" id="tekst"><br>
	<button>OK</button>
</form>

<?php

mysqli_close($db);
