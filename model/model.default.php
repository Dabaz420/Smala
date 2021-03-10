<?php

include("model/mod.pdo.php");

    if(isset($_REQUEST["submitLogin"]) || isset($_REQUEST["gererUsers"])){
        try{
            $requete = "SELECT * FROM `Smala_users`;";
            $prepare = $pdo->prepare($requete);
            $prepare->execute();
            $resultatUser = $prepare->fetchAll();
        }
        catch (PDOException $e){
            $pdo = NULL;
            exit("❌🙀❌ OOPS :\n" . $e->getMessage());
        }
    }

    if(isset($_REQUEST["idSupprimer"])){
        $user_id = $_REQUEST['idSupprimer'];

        try{
            $requete = "SELECT * FROM `Smala_users`
                        WHERE `user_id` = :user_id;";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                ":user_id" => $user_id
            ));
            $resultatUserSupprimer = $prepare->fetch();
        }
        catch (PDOException $e){
            exit("❌☠️❌ OOPS :\n" . $e->getMessage());
        }
    }

    if(isset($_REQUEST["validationSuppression"])){
        $user_id = $_REQUEST['id'];

        try{
            $requete = "SELECT *
                        FROM Smala_images
                        INNER JOIN Smala_assoc_users_images ON Smala_images.image_id = Smala_assoc_users_images.assoc_images_id
                        WHERE assoc_users_id = :assoc_users_id;";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                        ":assoc_users_id" => $user_id
                        ));
            $resultat = $prepare->fetchAll();

            $requete = "DELETE Smala_images
                        FROM Smala_images
                        INNER JOIN Smala_assoc_users_images ON Smala_images.image_id = Smala_assoc_users_images.assoc_images_id
                        WHERE assoc_users_id = :assoc_users_id;"; 
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                        ":assoc_users_id" => $user_id
                        ));
                        
            foreach ($resultat as $key => $value) {
                unlink($value["image_chemin"]);
            }
 

            $requete = "DELETE FROM `Smala_users`
            WHERE `user_id` = :user_id;"; 
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
            ":user_id" => $user_id
            ));
            $res = $prepare->rowCount();
            if($res == 1){
                header("Location: ?gererUsers#suppressionReussi");
                exit;
            }
        }
        catch (PDOException $e){
            exit("❌☠️❌ OOPS :\n" . $e->getMessage());
        }
    }elseif($_REQUEST["annulationSuppression"]){
        header("Location: ?gererUsers#suppressionAnnuler");
        exit;
    }

    if(isset($_REQUEST["idEditer"])){
        $user_id = $_REQUEST['idEditer'];

        try{
            $requete = "SELECT * FROM `Smala_users`
                        WHERE `user_id` = :user_id;";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                ":user_id" => $user_id
            ));
            $resultatUserEditer = $prepare->fetch();
        }
        catch (PDOException $e){
            exit("❌☠️❌ OOPS :\n" . $e->getMessage());
        }
    }

    if(isset($_REQUEST["validationEdition"])){
        $user_id = $_REQUEST['id'];
        $user_email = $_REQUEST['user_email'];
        $user_password = password_hash($_REQUEST['user_password'], PASSWORD_DEFAULT);
        $user_role = $_REQUEST['user_role'];

        try{
            $requete = "UPDATE `Smala_users` SET 
                        `user_email` = :user_email,
                        `user_password` = :user_password,
                        `user_role` = :user_role
                        WHERE `user_id` = :user_id";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                        ":user_id"   => $user_id,
                        ":user_email" => $user_email,
                        ":user_password" => $user_password,
                        ":user_role" => $user_role
            ));
            $res = $prepare->rowCount();

            if($res == 1){
                header("Location: ?gererUsers#EditionReussi");
                exit;
            }
        }
        catch (PDOException $e){
            exit("❌☠️❌ OOPS :\n" . $e->getMessage());
        }
    }elseif($_REQUEST["annulationEdition"]){
        header("Location: ?gererUsers#EditionAnnuler");
        exit;
    }

    if(isset($_REQUEST["validationCreation"])){
        $user_email = $_REQUEST['user_email'];
        $user_password = password_hash($_REQUEST['user_password'], PASSWORD_DEFAULT);
        $user_role = $_REQUEST['user_role'];

        try{
            $requete = "INSERT INTO `Smala_users` (`user_email`, `user_password`, `user_role`) 
                        VALUES (:user_email, :user_password, :user_role);";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                        ":user_email" => $user_email,
                        ":user_password" => $user_password,
                        ":user_role" => $user_role
            ));
            $res = $prepare->rowCount();

            if($res == 1){
                header("Location: ?gererUsers#CréationReussi");
                exit;
            }
        }
        catch (PDOException $e){
            exit("❌☠️❌ OOPS :\n" . $e->getMessage());
        }
    }

    if(isset($_REQUEST["submitUpdate"])){
        $user_id = $_REQUEST['user_id'];
        $user_email = $_REQUEST['user_email'];
        $user_password = password_hash($_REQUEST['user_password'], PASSWORD_DEFAULT);

        try{
            $requete = "UPDATE `Smala_users` SET 
                        `user_email` = :user_email,
                        `user_password` = :user_password
                        WHERE `user_id` = :user_id; ";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                        ":user_id"   => $user_id,
                        ":user_email" => $user_email,
                        ":user_password" => $user_password,
            ));
            $res = $prepare->rowCount();

            if($res == 1){
                header("Location: ?updateIdentifiant#ModificationReussis");
                exit;
            }
        }
        catch (PDOException $e){
            exit("❌☠️❌ OOPS :\n" . $e->getMessage());
        }
    }

    if(isset($_REQUEST["supprimerphoto"])){
        $image_id = $_REQUEST["id"];

        try{
            $requete = "SELECT * FROM `Smala_images`
                        WHERE `image_id` = :image_id;";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                ":image_id" => $image_id
            ));
            $resultat = $prepare->fetch();
        }
        catch (PDOException $e){
            $pdo = NULL;
            exit("❌🙀❌ OOPS :\n" . $e->getMessage());
        }
    }

    if(isset($_REQUEST["validerSupprimerImage"])){
        $image_id = $resultat['image_id'];
        $image_chemin = $resultat['image_chemin'];

        try{
            $requete = "DELETE FROM `Smala_assoc_users_images` WHERE `assoc_images_id` = :image_id;";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                ":image_id" => $image_id
            ));
            
            $requete = "DELETE FROM `Smala_images` WHERE `image_id` = :image_id;";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
               ":image_id" => $image_id
            ));
            $res = $prepare->rowCount();

            if($res == 1){
                unlink($image_chemin);
                header("Location: ?supprimerphoto&res#SuppressionReussi");
                exit;
            }
        }
        catch (PDOException $e){
            exit("❌☠️❌ OOPS :\n" . $e->getMessage());
        }
    }elseif($_REQUEST["annulerSupprimerImage"]){
        header("Location: ?supprimerphoto&res#SuppressionAnnuler");
        exit;
    }

    try{
        $requete = "SELECT * FROM `Smala_images`;";
        $prepare = $pdo->prepare($requete);
        $prepare->execute();
        $resultatImages = $prepare->fetchAll();  
    
        $longueurImg = count($resultatImages);
    }
    catch (PDOException $e){
        $pdo = NULL;
        exit("❌🙀❌ OOPS :\n" . $e->getMessage());
    } 