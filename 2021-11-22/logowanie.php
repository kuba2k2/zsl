<?php
session_start();
if (isset($_GET['akcja']) && $_GET['akcja'] == 'wyloguj') {
	unset($_SESSION['zalogowany']);
}

if (isset($_POST['login']) && isset($_POST['pass']) && $_POST['login']=="admin"&&$_POST["pass"]=="nimda") {
	$_SESSION['zalogowany']=1;
}
if (isset($_POST['login']) && isset($_POST['pass']) && $_POST['login']=="user"&&$_POST["pass"]=="resu") {
	$_SESSION['zalogowany']=2;
}

if (!isset($_SESSION['zalogowany'])) {
?>
<form method="post">
	login
	<input type="text" name="login" id="login">
	password
	<input type="text" name="pass" id="pass">
	<button>guzik</button>
</form>
<?php
}
else {
	echo "tajne dane<br>";
	echo "<a href='logowanie.php?akcja=wyloguj'>wyloguj</a>";
}
?>
