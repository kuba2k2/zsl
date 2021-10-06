<style>
	table, th, td {
		border: 2px #666 solid;
		border-collapse: collapse;
	}
	td {
		padding: 5px;
	}
	th {
		padding: 10px;
	}
</style>

<?php

$db = mysqli_connect('localhost', 'zsl', '', 'zsl');

$result = mysqli_query($db, 'SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis ASC;');
while ($row = mysqli_fetch_assoc($result)) {
	echo '<img src="'.$row['nazwaPliku'].'" title="'.$row['podpis'].'">';
}

echo '<hr>';

$result = mysqli_query($db, 'SELECT id, dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna = 1;');
while ($row = mysqli_fetch_assoc($result)) {
	echo $row['id'].'. '.$row['dataWyjazdu'].', '.$row['cel'].', cena: '.$row['cena'].'<br>';
}

echo '<hr><table>';

$result = mysqli_query($db, 'SELECT id, dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna = 1;');
$h = false;
while ($row = mysqli_fetch_assoc($result)) {
	if (!$h) {
		echo '<tr>';
		foreach (array_keys($row) as $key) {
			echo '<th>'.$key.'</th>';
		}
		echo '</tr>';
		$h = true;
	}

	echo '<tr>';
	foreach (array_values($row) as $value) {
		echo '<td>'.$value.'</td>';
	}
	echo '</tr>';
}

echo '</table>';

mysqli_close($db);
