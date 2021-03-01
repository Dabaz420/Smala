<?php

    parse_str($_SERVER["QUERY_STRING"], $qs);
    $keys = array_keys($qs);
    $route = array_shift($keys);

    switch ($route) {

        case "login":
            include("controller/ctrl.login.php");
        break;

        case "espacePersonnel":
            include("controller/ctrl.espacePersonnel.php");
        break;

        case "gererUsers":
            include("controller/ctrl.gererUsers.php");
        break;

        case "updateIdentifiant":
            include("controller/ctrl.updateIdentifiant.php");
        break;

        case "upload":
            include("controller/ctrl.upload.php");
        break;

        case "upload-check":
            include("controller/ctrl.upload-check.php");
        break;

        case "supprimerphoto":
            include("controller/ctrl.supprimerphoto.php");
        break;

        case "logout":
            include("controller/ctrl.logout.php");
        break;

        default:
            include("controller/ctrl.home.php");
        break;
    }

    exit;