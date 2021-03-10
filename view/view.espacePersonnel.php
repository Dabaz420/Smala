<?php

    if(isset($_GET['i'])){
        $i = $_GET['i'];
    } 
    else {
        $i = $longueurImg - 1;
    }

    $x = $i;
    $y = $i;

    echo "<!DOCTYPE html>
        <html lang='fr'>
        
        <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Smala - Espace Personnel</title>
        <meta name='description' content='Accueil de la Smala'>
        <link rel='stylesheet' href='style/style.css'>
        </head>
        <body class='addon-alert'>
        <header>
            <a href='?home'>
            Accueil
            </a>
            <h1> SMALA </h1>
            <a href='?logout'>
                <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-door-open-fill' viewBox='0 0 16 16'>
                    <path d='M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z'/>
                </svg>
            </a>
        </header>
        <h3>Tes images</h3>
        <div class='photo'>
            <a href='?espacePersonnel&i="; 
            
            if($x >= $longueurImg - 1){
                echo $x=0;
            }
            else{
                echo ++$x;
            } 
            
            echo "' class='svgG'>
            <svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' fill='currentColor' class='bi bi-caret-left' viewBox='0 0 16 16'>
            <path d='M10 12.796V3.204L4.519 8 10 12.796zm-.659.753l-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z'/>
            </svg>
            </a>

            <p>". htmlentities($resultat[$i]['image_titre'], ENT_QUOTES). "</p>
            <img src='". htmlentities($resultat[$i]['image_chemin'], ENT_QUOTES) . "' alt='photos'/>
            <a href='?supprimerphoto&id=". htmlentities($resultat[$i]['image_id'], ENT_QUOTES) ."' class='supp'>Supprimer</a>
            

            <a href='?espacePersonnel&i=";

            if($y <= 0){
                echo $y=$longueurImg-1;
            }
            else{
                echo --$y;
            } 
             
            echo "' class='svgD'>
            <svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' fill='currentColor' class='bi bi-caret-right' viewBox='0 0 16 16'>   
            <path d='M6 12.796V3.204L11.481 8 6 12.796zm.659.753l5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z'/>
            </svg>
            </a>
        </div>
        <form action='?updateIdentifiant' method='post'>
            <input type='submit' name='submitIdentifiant' value='Changer les identifiant de connexion'>
        </form>";

        if($_SESSION["role"] == "admin"){
            echo "<form action='?gererUsers' method='post'>
                    <input type='submit' name='submitUtilisateur' value='Gérer les utilisateur'>
                </form>";
        }

        echo "</body>
        </html>";        