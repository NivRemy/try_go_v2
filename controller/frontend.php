<?php
require('model/frontend.php');

function displayLoginMenu() {
	require('view/frontend/loginForm.php');
}

function login($userMail,$password) {
	$userInfo = getUserInfo($userMail);
	if (password_verify($password,$userInfo['password'])) {
		session_start();
		$_SESSION['userId'] = $userInfo['id'];
		$_SESSION['userRank'] = $userInfo['rank'];
		$_SESSION['userName'] = $userInfo['name'];
		$_SESSION['userSurname'] = $userInfo['surname'];
		displayMenu();
	}
	else {
		require('view/frontend/loginForm.php');
	}
}

function logout() {
	session_destroy();
}

function displayJsonGame($idJsonGame) {
	$jsonGame = (getGame($_GET['getGame']));
	$game = json_decode($jsonGame['json'],true);
	require('view/frontend/gobanView.php');
}

function displayGame($game) {
	require('view/frontend/gobanView.php');
}

function displayMenu() {

	$games = getLastGames();

	require('view/frontend/loadGameForm.php');
}

function checkGameDisplay($post,$files,$get) {
	if (isset($post['game']) && !empty($post['game'])) {
	    $game = getHardCodedGame($post['game']);
	}
	elseif (isset($files) && !empty($files)) {
	    $game = getJsonImportGame($files['game']['tmp_name']);
	}
	elseif (isset($get) && !empty($get)) {
	    $game = displayJsonGame($get);
	}
	else {
		$game = null;
	}
	return $game;
}