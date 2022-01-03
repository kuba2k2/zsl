<style>
	b{
		color:red;
	}
	</style>

<?php
$suma = rand(1, 20);
echo $suma;
while ($suma < 100) {
	$x = rand(1, 20);
	if ($x % 2 == 0) {
		echo '+' . '<b>'.$x.'</b>';
	} else {
		echo '+' . $x;
	}
	$suma += $x;
}
echo '=' . $suma;
