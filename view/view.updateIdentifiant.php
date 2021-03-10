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
        <header>
            <a href='?home'>Accueil</a>
            <h1> SMALA </h1>
            <a href='?logout'> 
                <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-door-open-fill' viewBox='0 0 16 16'>
                    <path d='M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z'/>
                </svg>
            </a>
        </header>
        <h1>Update tes identifiants</h1>
        <form action='?updateIdentifiant' method='post'>
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

    