<?php
include "../classes/voyage.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_categorie = $_POST['categorie'];
    $title = $_POST['title'];
    $date_debut = $_POST['start_date'];
    $date_fin = $_POST['end_date'];
    $id_formule = (int)$_POST['formule'];
    $price = (float)$_POST['price'];
    $description = $_POST['description'];

    $target_dir = "GMAE/assets/img/";
    $image_name = basename($_FILES["image"]["name"]); 
    $image_path = $_SERVER['DOCUMENT_ROOT'] . "/" . $target_dir . $image_name; 
    //var_dump($image_path);
    

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_path)) {
            $absolute_url = "http://".$_SERVER['HTTP_HOST'] . "/" . $target_dir . $image_name;
            $voyage = new Voyage();
            $voyage->insertVoyage($id_categorie, $id_formule, $title, $absolute_url, $description, $date_debut, $date_fin, $price);
            echo "The file " . htmlspecialchars($image_name) . " has been uploaded.";

            header("Location: ../templates/dashboard.php");
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>



