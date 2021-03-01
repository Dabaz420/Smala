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
        <h1>Smala</h1>
        <a href='?logout'>Déconnexion</a>
        <a href='?home'>Accueil</a>

        <form action='?updateIdentifiant' method='post'>
            <h1>Update tes identifiants</h1>
            <input type='text' name='user_email' required placeholder='Nouvelle adresse email'>
            <input type='text' name='user_password' required placeholder='Nouveau mot de passe'>
            <input type='text' name='user_id' value='". $_SESSION['id'] ."' hidden>
            <input type='submit' name='submitUpdate' value='VALIDER!!'>
        </form>

        <div class='alert success' id='ModificationReussis'>
            <p>Identifiants modifiés avec brio !</p>
        </div>

    </body>
    </html>";

    