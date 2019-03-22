<?php

$title = 'Load game';

ob_start();  // Début du content
?>

<h2>Bonjour <?= $_SESSION['userName'] . " " . $_SESSION['userSurname'] ?></h2>

<div style='border: 5px solid black'>
    <form method="post" action="index.php">
        <input type="radio" name="game" value="game1"> Partie 1<br>
        <input type="radio" name="game" value="game2"> Partie 2<br>
        <input type="submit" value="Valider"/>
    </form>
</div>
<div style='border: 5px solid red'>
    <form method="post" action="index.php" enctype="multipart/form-data">
        <input type="file" name="game"/><br>
        <input type="submit" value="Valider"/>
    </form>
</div>

<?php

while ($game = $games->fetch()) {
	$link = "\"index.php?getGame=" . $game['id'] . "\"";
	//print_r($game);
?>
	<p> Partie: <?= $game['id']; ?> | <?= $game['p1name'] . " " . $game['p1surname']; ?> vs <?= $game['p2name'] . " " . $game['p2surname']; ?> | <?= $game['date']; ?></p><a href=<?= $link; ?>>Voir la partie</a>
<?php
}

$content = ob_get_clean();
//echo $content;
require('view/template.php');

?>