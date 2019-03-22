<?php

require('controller/frontend.php');

if (isset($_POST['userMail']) && isset($_POST['password'])) {
    login($_POST['userMail'],$_POST['password']);
}
else {
    session_start();

    if (isset($_POST['logout'])){
        logout();
        displayLoginMenu();
    }
    elseif (!isset($_SESSION['userId'])) {
        displayLoginMenu();
    }
    else{
        $game = checkGameDisplay($_POST,$_FILES,$_GET);

        //call displaygoban

        if (isset($game) && !empty($game)) {
            displayGame($game);
        }
        elseif(isset($_GET['getGame'])) {          
        }
        else {
            displayMenu();
        }
    }
}


    /* Option d'affichage par défaut, ne sert plus vu que index fait le tri
    elseif (!isset($_POST['game'])) {
        $game = [
            [NULL,true,true,false,NULL],
            [NULL,true,false,false,NULL],
            [NULL,true,true,false,NULL],
            [NULL,true,false,NULL,false],
            [NULL,true,false,NULL,NULL]
        ];
    }
    */