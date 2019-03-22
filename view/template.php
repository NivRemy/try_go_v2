<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" type="text/css" href="css/goban.css">
</head>
<body>
    <?php

    echo $content;
    if (isset($_SESSION['userId'])) {
    	include('view/frontend/logoutButton.php');
    }
    ?>
</body>