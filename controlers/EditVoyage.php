<?php
include "../classes/voyage.php"; 


if(isset($_GET['id'])) {

    $id_voyage = $_GET['id'];

    $voyage = new Voyage();

    $voyageDetails = $voyage->getVoyageDetails($id_voyage);

    if($voyageDetails) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_categorie = $_POST['categorie'];
            $title = $_POST['title'];
            $date_debut = $_POST['date_debut'];
            $date_fin = $_POST['date_fin'];
            $id_formule = (int)$_POST['id_formule'];
            $price = (float)$_POST['price'];
            $description = $_POST['description'];
            $target_dir = "GMAE/assets/img/";
            $image_name = basename($_FILES["image"]["name"]); 
            $image_path = $_SERVER['DOCUMENT_ROOT'] . "/" . $target_dir . $image_name; 
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
                    $voyage->update($id_voyage, $id_categorie, $id_formule, $title, $absolute_url, $description, $date_debut, $date_fin, $price);
                    echo "The file " . htmlspecialchars($image_name) . " has been uploaded.";
                    header("Location: ../templates/dashboard.php");
                    exit();
                } else {
                    echo "There was an error uploading your file.";
                }
            }
        }   
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles1.css"> 
    <title>Edit Voyage</title>
</head>
<body>
    <div class="container">
        <div class="form-section">
            <h2>Edit Voyage</h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="categorie">Catégorie:</label>
                    <select id="categorie" name="categorie" required>
                        <option value="">Sélectionnez une catégorie</option>
                        <?php
                        $categories = $voyage->getAllCategories();
                        foreach ($categories as $category) {
                            if ($category['id_categorie'] == $voyageDetails['id_categorie']) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            echo "<option value='" . $category['id_categorie'] . "' $selected>" . $category['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                    <div class="form-group">
                    <label for="categorie">Formule:</label>
                        <select id="formule" name="id_formule">
                            <option <?php if($voyageDetails['id_formule'] == 1) {echo 'selected';} ?> value="1">Standard</option>
                            <option <?php if($voyageDetails['id_formule'] == 2) {echo 'selected';} ?> value="2">Premium</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" value="<?php echo $voyageDetails['title']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="image_url">Image URL:</label>
                    <input type="file" id="image" name="image"><br>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description"><?php echo $voyageDetails['description']; ?></textarea><br>
                </div>
                <div class="form-group">
                    <label for="date_debut">Start Date:</label>
                    <input type="date" name="date_debut" value="<?php echo $voyageDetails['date_debut']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="date_fin">End Date:</label>
                    <input type="date" name="date_fin" value="<?php echo $voyageDetails['date_fin']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" name="price" value="<?php echo $voyageDetails['price']; ?>"><br>
                </div>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
