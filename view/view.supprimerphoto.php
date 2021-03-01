<?php

echo "<!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='style/style.css'>
        <title>Document</title>
    </head>
    <body class='addon-alert'>
        <h1>Smala</h1>";

    if(!isset($_REQUEST['res'])){
        echo "<form action='?supprimerphoto&id=".$resultat['image_id']."' method='post'>
                <h3>Voulez vous supprimer cette image ?</h3>
                <img src='".$resultat['image_chemin']."' alt='photo'>
                <p>". $resultat['image_titre'] ."</p>
                <input type='submit' name='validerSupprimerImage' value='Oui'>
                <input type='submit' name='annulerSupprimerImage' value='Non'>
            </form>";
    }

    echo "<div class='alert success' id='SuppressionReussi'>
            <p>L'image a bien été supprimée ! Retour à l'<a href='?home'>accueil</a></p>
        </div>

        <div class='alert success' id='SuppressionAnnuler'>
            <p>Suppression annulé ! Retour à l'<a href='?home'>accueil</a></p>
        </div>
        
    </body>
    </html>";