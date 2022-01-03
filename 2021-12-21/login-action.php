<style>
	div {
		text-align: center;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		font-size: 30px;
		font-family: 'Comic Sans MS';
	}
</style>

<?php

if (isset($_POST['login']) && isset($_POST['password'])) {
	echo "<div>";
	$db = mysqli_connect('localhost', 'zsl', '', 'zsl');
	$stmt = mysqli_prepare($db, "SELECT loginTime, ID_U, USERNAME, COLOR
	FROM loginevents
	RIGHT JOIN users ON users.ID_U = loginevents.User
	WHERE USERNAME = ? AND PASSWORD = ?
	ORDER BY loginTime DESC
	LIMIT 1;");
	mysqli_stmt_bind_param($stmt, 'ss', $_POST['login'], $_POST['password']);
	mysqli_stmt_bind_result($stmt, $loginTime, $userId, $username, $color);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_fetch($stmt);
	if ($userId) {
		echo "User $username logged into system<br>";
		if ($loginTime) {
			echo "Last logged on $loginTime<br>";
		} else {
			echo "This is your first login<br>";
		}
		echo "You are authenticated with number $userId<br>";
		echo "Current date is ".date('Y-m-d H:i:s').'<br>';
	} else {
		echo "Login failure user $_POST[login]<br>wrong username or password";
	}
	echo "</div>";
}
