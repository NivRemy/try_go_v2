<?php

$title = "Login";

ob_start();
?>

<form action="index.php" method="post">
	<div>
		<label for="username">Username</label>
	<input type="text" name="userMail" required></div>
	<div>
		<label for="password">Password</label>
		<input type="password" name="password" required>
	</div>
	<div>
		<button type="submit">Login</button>
	</div>
</form>

<?php
$content = ob_get_clean();

include('view/template.php');
?>