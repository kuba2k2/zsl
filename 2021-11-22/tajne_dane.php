<?php
session_start();
if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] ==1) {
	echo 'jest dostęp admina :)';
}
else if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] ==2) {
	echo 'jest dostęp :)';
}
else {
	echo 'brak dostępu :(';
}
