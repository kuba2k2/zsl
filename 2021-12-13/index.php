<?php

if (isset($_GET['ok'])) {

	setcookie("KULIZJONISTA", "KULI", time() + 60);
}

var_dump($_COOKIE);

echo intval((strtotime("2022-09-11") - time()) / 60 / 60 / 24);


// echo intval(strval(intval(floor(intval("12")))));
?>
