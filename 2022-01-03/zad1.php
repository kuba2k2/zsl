<p>Podaj listę zakupów po przecinku</p>
<form action="zad1.php" method="post">
	<textarea name="lista" id="lista" cols="30" rows="10"><?=isset($_POST['lista']) ? $_POST['lista'] : '' ?></textarea>
	<br>
	<button>Prześlij</button>
</form>

<style>
	ol {
		list-style-type: upper-roman;
	}
</style>

<?php
if (isset($_POST['lista'])) {
	$arr = explode(',', $_POST['lista']);
	if (!$arr) {
		return;
	}
	echo '<ol><li>';
	echo implode('</li><li>', $arr);
	echo '</li></ol>';
}
?>
