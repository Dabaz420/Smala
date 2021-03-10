<?php

    echo "<!DOCTYPE html>
        <html lang='fr'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='style/style.css'>
            <title>Page admin</title>
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
        <h3>Utilisateur </h3>
        <table>";
                        
            foreach($resultatUser as $key => $value) {
        
            echo "<tr>
                <th> ". htmlentities($value['user_email'], ENT_QUOTES) ."
                    <a href='?gererUsers&idEditer=".htmlentities($value['user_id'], ENT_QUOTES)."#editionUser'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                        <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                        <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                    </svg></a>
                    <a href='?gererUsers&idSupprimer=".htmlentities($value['user_id'], ENT_QUOTES)."#suppressionUser'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                        <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                    </svg></a>
                </th>
            </tr>";
        
            }
        
        echo "</table>
            <a href='?gererUsers#creationUser'>Crée un utilisateur</a>

            <div class='alert form' id='creationUser'>
                <form action='?gererUsers' method='post'>
                    <p>Création d'un utilisateur</p>
                    <input type='text' name='user_email' placeholder='Email' require>
                    <input type='text' name='user_password' placeholder='Mot de passe' require>
                    <label for='user_role'>Choisir le role de l'utilisateur</label>
                    <select name='user_role'>
                        <option value='user'>User</option>
                        <option value='admin'>Admin</option>
                    </select>
                    <input type='submit' name='validationCreation' value='valider'>
                </form>
            </div>
            <div class='alert success' id='CréationReussi'>
                <p>L'utilisateur à bien été créé !</p>
            </div>

            <div class='alert form' id='suppressionUser'>
                <form action='?gererUsers' method='post'>
                    <p>Voulez vous supprimer cet utilisateur ?</p>
                    <p>"; 
                    if(isset($resultatUserSupprimer)){
                        echo htmlentities($resultatUserSupprimer["user_email"], ENT_QUOTES);
                    }
            echo "  </p>
                    <input type='text' name='id' value='".htmlentities($resultatUserSupprimer["user_id"], ENT_QUOTES). "' hidden>
                    <input type='submit' name='validationSuppression' value='Oui'>
                    <input type='submit' name='annulationSuppression' value='Non'>
                </form>
            </div>
            <div class='alert success' id='suppressionReussi'>
                <p>L'utilisateur à bien été supprimé !</p>
            </div>

            <div class='alert fail' id='suppressionAnnuler'>
                <p>La suppression à été annuler !</p>
            </div>
    
            <div class='alert form' id='editionUser'>
                <form action='?gererUsers' method='post'>
                    <p>Éditer l'utilisateur</p>
                    <input type='text' name='user_email' value='". htmlentities($resultatUserEditer["user_email"], ENT_QUOTES) ."' require>
                    <input type='text' name='user_password' require>
                    <select name='user_role'>
                        <option value='user'>User</option>
                        <option value='admin'>Admin</option>
                    </select>
                    <input type='text' name='id' value='". htmlentities($resultatUserEditer["user_id"], ENT_QUOTES) ."' hidden>
                    <input type='submit' name='validationEdition' value='Oui'>
                    <input type='submit' name='annulationEdition' value='Non'>
                </form>
            </div>
            <div class='alert success' id='EditionReussi'>
                <p>L'utilisateur a été modifier !</p>
            </div>

            <div class='alert fail' id='EditionAnnuler'>
                <p>L'édition a été annuler !</p>
            </div>
                
            </body>
            </html>";
            