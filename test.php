<?php

if (isset($_GET['gameId']) && $_GET['gameId'] == 1) {
	echo 'Partie: ' . $_GET['gameId'];
    $game = [
        [NULL,true,true,false,NULL],
        [NULL,true,false,false,NULL],
        [NULL,true,true,false,NULL],
        [NULL,true,false,NULL,false],
        [NULL,true,false,NULL,NULL]
    ];
    include('view/frontend/gobanView.php');
}
elseif (isset($_GET['gameId']) && $_GET['gameId'] == 2) {
	echo 'Partie: ' . $_GET['gameId'];
    $game = [
    [NULL,true,false,false,true,NULL,NULL],
    [NULL,true,false,false,true,true,NULL],
    [NULL,true,false,NULL,false,true,NULL],
    [true,false,false,NULL,false,true,NULL],
    [true,true,false,NULL,false,false,true],
    [NULL,true,false,NULL,false,true,NULL],
    [NULL,true,false,NULL,false,true,NULL] 
    ];
    include('view/frontend/gobanView.php');
}
else{
?>


<a href="test.php?gameId=1">Partie 1</a>
<a href="test.php?gameId=2">Partie 2</a>

<?php
}

