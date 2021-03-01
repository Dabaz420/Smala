<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    header("Location: ?upload#Notanimage");
    exit;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
    header("Location: ?upload#Filealreadyexist");
    exit;
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  header("Location: ?upload#Fileistoolarge");
  exit;
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  header("Location: ?upload#Filenotallowed");
  exit;
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  header("Location: ?upload#Filenotuploaded");
  exit;
// if everything is ok, try to upload file
} 
else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

    include("mod.pdo.php");

    try{
        $requete = "INSERT INTO `Smala_images` (`image_chemin`, `image_titre`, `image_date`)
                    VALUES (:image_chemin, :image_titre, NOW);";
        $prepare = $pdo->prepare($requete);
        $prepare->execute(array(
            ":image_chemin" => $target_file,
            ":image_titre" => $_POST["titre"]
        ));
        $res = $prepare->rowCount();
        $image_id = $pdo->lastInsertId();

        if($res == 1){
          $user_id = $_SESSION["id"];

          $requete = "INSERT INTO `Smala_assoc_users_images` (`assoc_users_id`, `assoc_images_id`)
                      VALUES (:assoc_users_id, :assoc_images_id);";
          $prepare = $pdo->prepare($requete);
          $prepare->execute(array(
            ":assoc_users_id" => $user_id,
            ":assoc_images_id" => $image_id
          ));
          $res2 = $prepare->rowCount();
          if($res2 == 1){
            header("Location: ?upload#Fileuploaded");
            exit;
          }
        }
    }
    catch (PDOException $e){
        exit("❌🙀❌ OOPS :\n" . $e->getMessage());
    }
  } 
  else {
    header("Location: ?upload#Fileerrorupload");
    exit;
  }
}