<?php

    echo "<!DOCTYPE html>
        <html lang='fr'>
        <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <link rel='stylesheet' href='style/style.css'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
        </head>
        <body class='addon-alert'>
        <h1>Smala</h1>
        <form action='' method='post'>
        <label for='user_email'>Identifiant (email):</label><br/>
        <input type='email' name='user_email'/><br/>
        <label for='user_password'>Mot de passe :</label><br/>
        <input type='password' name='user_password'/><br/>
        <input type='submit' name='submitLogin' value='Go!'/>
        <div class='alert fail' id='non'>
            <p>Tu t'es trompé poto</p>
        </div>
        </form>
        </body>
        </html>";