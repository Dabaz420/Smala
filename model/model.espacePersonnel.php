<?php

    include("model/mod.pdo.php");

    $user_id = $_SESSION["id"];

    try{
        $requete = "SELECT *
        FROM Smala_assoc_users_images
        JOIN Smala_users ON Smala_users.user_id = Smala_assoc_users_images.assoc_users_id
        JOIN Smala_images ON Smala_images.image_id = Smala_assoc_users_images.assoc_images_id
        WHERE Smala_users.user_id = :user_id;";
        $prepare = $pdo->prepare($requete);
        $prepare->execute(array(
            ":user_id" => $user_id
        ));
        $resultat = $prepare->fetchAll();
        
        $longueurImg = count($resultat);

    }
    catch (PDOException $e){
        $pdo = NULL;
        exit("❌🙀❌ OOPS :\n" . $e->getMessage());
    } 