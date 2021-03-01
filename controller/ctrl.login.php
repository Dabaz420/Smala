<?php
    
    include("view/view.login.php");    
    include("model/model.default.php");

    foreach($resultatUser as $key => $value){
        if($_REQUEST["user_email"] == $value["user_email"] && password_verify($_REQUEST["user_password"],$value["user_password"])){
            include("ctrl.session-start.php");
            $_SESSION["connected"] = $_REQUEST["user_email"];
            $_SESSION["role"] = $value["user_role"];
            $_SESSION["id"] = $value["user_id"];
            header("Location: ?home");
            exit;
        }
    }

    exit;