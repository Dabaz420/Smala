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
        <title>Smala - Accueil</title>
        <meta name='description' content='Accueil de la Smala'>
        <link rel='stylesheet' href='style/style.css'>
        </head>
        <body class='addon-alert'>
        <header>
        <h1> SMALA </h1>
        </header>
        <a href='?espacePersonnel'>Espace Personnel</a>
        <a href='?logout'>Déconnexion</a>
        <div class='photo'>
            <a href='?i="; 
            
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

            <t>". htmlentities($resultatImages[$i]['image_titre'], ENT_QUOTES). "</t>
            <img src='". htmlentities($resultatImages[$i]['image_chemin'], ENT_QUOTES). "' alt='photos'/>";

            if($_SESSION["role"] == 'admin'){
                echo("<a href='?supprimerphoto&id=". $resultatImages[$i]['image_id'] ."'>Supprimer</a>");
            }

            echo"<a href='?i=";

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
        <form action='?upload' method='post'>
            <input type='submit' name='submitUpload' id='imgOK' value='Téléverse ton image !'>
        </form>
        </body>
        </html>";