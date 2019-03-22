<?php

function getUserInfo($userMail) {
	try {

		$go_bdd = new PDO('mysql:host=localhost;dbname=go_games;charset=utf8', 'root', '');
	}
	catch (Exception $e) {

		die('Erreur : ' . $e->getMessages());
	}

	$request = $go_bdd->prepare('SELECT id,password,name,surname,rank FROM players WHERE mail = :mail');

	$request->execute(array(
		':mail' => htmlentities($userMail)
	));
	$userInfo = $request->fetch();
	return $userInfo;

}

function getGame($id) {
	try {

		$go_bdd = new PDO('mysql:host=localhost;dbname=go_games;charset=utf8', 'root', '');
	}
	catch (Exception $e) {

		die('Erreur : ' . $e->getMessages());

	}
	try {
		$response = $go_bdd->query('SELECT id,json FROM games WHERE id = ' . $id);
	}
	catch (Exception $e) {

		die('Erreur : Cette partie n\'existe pas :' . $e->getMessages());

	}
	$jsonGame = $response->fetch();

	return $jsonGame;
}

function getLastGames() {
	try {

		$go_bdd = new PDO('mysql:host=localhost;dbname=go_games;charset=utf8', 'root', '');
	}
	catch (Exception $e) {

		die('Erreur : ' . $e->getMessages());

	}
	$request = $go_bdd->prepare('SELECT games.id,games.json,games.date,playerone.name as p1name,playerone.surname as p1surname,playertwo.name as p2name,playertwo.surname as p2surname FROM games JOIN players AS playerone ON games.id_player1 = playerone.id JOIN players playertwo ON games.id_player2 = playertwo.id WHERE playerone.id = :userId OR playertwo.id = :userId LIMIT 10');

	$request->execute(array(
		'userId' => $_SESSION['userId']
	));
	
	return $request;
}

function getHardCodedGame($gameId) {
	if ($gameId == 'game1') {
        $game = [
            [NULL,true,true,false,NULL],
            [NULL,true,false,false,NULL],
            [NULL,true,true,false,NULL],
            [NULL,true,false,NULL,false],
            [NULL,true,false,NULL,NULL]
        ];
    }
    elseif ($gameId == 'game2') {
        $game = [
            [NULL,true,false,false,true,NULL,NULL],
            [NULL,true,false,false,true,true,NULL],
            [NULL,true,false,NULL,false,true,NULL],
            [true,false,false,NULL,false,true,NULL],
            [true,true,false,NULL,false,false,true],
            [NULL,true,false,NULL,false,true,NULL],
            [NULL,true,false,NULL,false,true,NULL] 
        ];
    }

    return $game;

}

function getJsonImportGame($gameJson) {
	$game = json_decode(file_get_contents($gameJson),true);

	return $game;
}

