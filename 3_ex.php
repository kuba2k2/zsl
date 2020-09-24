<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<style type="text/css">
			p {
				text-decoration: underline;
			}
		</style>
	</head>
	<body>
		<p>Dane kontaktowe</p>
		<?php
			include 'katalog/name.php';
			include 'katalog/surname.php';
		?>
		<ul>
			<li>Imię: <?=$name ?></li>
			<li>Nazwisko: <?=$surname ?></li>
		</ul>
		<hr>
	</body>
</html>
