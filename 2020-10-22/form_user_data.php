<?php
	$invalid = [
		empty($_POST['firstName']),
		empty($_POST['lastName']),
		empty($_POST['address1']),
		empty($_POST['city']),
		empty($_POST['zip']),
		empty($_POST['phone']),
		!is_numeric($_POST['zip']),
		strlen($_POST['zip']) != 5,
		!preg_match('/^[A-ZŻÓŁĆĘŚĄŹŃ][a-zżółćęśążń]{1,9}$/', $_POST['firstName']),
		!preg_match('/^[A-ZŻÓŁĆĘŚĄŹŃ][a-zżółćęśążń]{1,19}$/', $_POST['lastName']),
		!in_array($_POST['country'], ['Polska', 'USA', 'Grecja']),
		!in_array($_POST['state'], ['Wielkopolskie', 'Zachodniopomorskie', 'Małopolskie']),
		!in_array($_POST['accountType'], ['personal', 'business'])
	];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
	<?php
		if (in_array(true, $invalid)) {
	?>
	Niepoprawne dane. Wracam za 3 sekundy.
	<script type="text/javascript">
		setTimeout(function() {
			history.back();
		}, 3000); 
	</script>
	<?php
		}
		else {
			echo 'Konto: '.$_POST['accountType'].'<br>';
			echo 'Imię i nazwisko: '.$_POST['firstName'].' '.$_POST['lastName'].'<br>';
			echo 'Kraj: '.$_POST['country'].'<br>';
			echo 'Adres 1: '.$_POST['address1'].'<br>';
			echo 'Adres 2: '.$_POST['address2'].'<br>';
			echo 'Kod pocztowy i miasto: ';
			echo substr($_POST['zip'], 0, 2);
			echo '-';
			echo substr($_POST['zip'], 2, 3);
			echo ' '.$_POST['city'].'<br>';
			echo 'Województwo: '.$_POST['state'].'<br>';
			echo 'Numer telefonu: '.$_POST['phone'].'<br>';
		}
	?>
</body>
</html>

