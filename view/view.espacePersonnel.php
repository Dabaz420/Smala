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
        <h1> SMALA </h1>
        <a href='?logout'>Déconnexion</a>
        <a href='?home'>Accueil</a>
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
            
            echo "'>
            <svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' fill='currentColor' class='bi bi-caret-left' viewBox='0 0 16 16'>
            <path d='M10 12.796V3.204L4.519 8 10 12.796zm-.659.753l-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z'/>
            </svg>
            </a>

            <t>". htmlentities($resultat[$i]['image_titre'], ENT_QUOTES). "</t>
            <img src='". htmlentities($resultat[$i]['image_chemin'], ENT_QUOTES). "' alt='photos'/>
            <a href='?supprimerphoto&id=$i'>Supprimer</a>
            

            <a href='?espacePersonnel&i=";

            if($y <= 0){
                echo $y=$longueurImg-1;
            }
            else{
                echo --$y;
            } 
             
            echo "'>
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