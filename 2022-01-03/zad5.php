<?php

$x = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus fugiat libero, excepturi dolorem ex quaerat inventore totam dolore. Perspiciatis quisquam a ipsum mollitia nesciunt culpa sequi deserunt aliquam nobis quidem.';

if(isset($_POST['wyraz']) && $_POST['wyraz']) {
	$w = $_POST['wyraz'];
	$l = explode(' ', $x);
	$n = 0;
	foreach ($l as $i => $s) {
		if (strtolower($w) == strtolower($s)) {
			$n ++;
			$l[$i] = '<b>'.$s.'</b>';
		}
	}
	$x = implode(' ', $l);
	echo 'Wyraz "<b>'.$w.'</b>" występuje w tekście <b>'.$n.'</b> raz(y).<br>';
}

echo 'Tekst: '.$x.'<br>';
?>

<form action="zad5.php" method="post">
	Wyraz: <input type="text" name="wyraz" id="wyraz"><br>
	<button>Szukaj</button>
</form>
