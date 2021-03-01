<?php 

    echo "<!DOCTYPE html>
            <html>
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
            
            <form action='?upload-check' method='post' enctype='multipart/form-data'>
            Choisi ton image à téléverser :
            <input type='file' name='fileToUpload' id='fileToUpload'>
            Choisi le titre de ton image :
            <input type='text' name='titre'>
            <input type='submit' value='TÉLÉVERSE TON IMAGE !!' name='submit'>
            </form>

            <div class='alert fail' id='Notanimage'>
                <p>Le fichier n'est pas une image</p>
            </div>

            <div class='alert fail' id='Filealreadyexist'>
                <p>Le fichier existe déjà</p>
            </div>

            <div class='alert fail' id='Filealreadyexist'>
                <p>Le fichier existe déjà</p>
            </div>

            <div class='alert fail' id='Fileistoolarge'>
                <p>Le fichier est trop volumineux</p>
            </div>

            <div class='alert fail' id='Filenotallowed'>
                <p>Le format du fichier n'est pas autorisé</p>
            </div>

            <div class='alert fail' id='Filenotuploaded'>
                <p>Le fichier n'as pas pu être upload</p>
            </div>

            <div class='alert fail' id='Fileerrorupload'>
                <p>Erreur durant l'upload du fichier</p>
            </div>
            
            <div class='alert success' id='Fileuploaded'>
                <p>L'upload du fichier c'est bien passé !</p>
            </div>
	    </body>
            </html>";
