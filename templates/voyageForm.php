<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Voyage</title>
    <link rel="stylesheet" href="../assets/css/styles1.css"> 
</head>
<body>

    <div class="container">
        <div class="form-section">
            <h2>Add New Voyage</h2>
            <form action="../controlers/AddVoyage.php" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div class="form-group">
            <label for="categorie">Catégorie:</label>
            <select id="categorie" name="categorie" required>
                <option value="">Sélectionnez une catégorie</option>
            <?php
                include "../classes/voyage.php";
                $voyage = new Voyage();
                $categories = $voyage->getAllCategories();
                foreach ($categories as $category) {
                echo "<option value='" . $category['id_categorie'] . "'>" . $category['name'] . "</option>";
                }
            ?>
        </select>
    </div>

                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" id="start_date" name="start_date" required>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="date" id="end_date" name="end_date" required>
                </div>
                <div class="form-group">
                <label for="categorie">Formule:</label>
                    <select id="formule" name="formule">
                        <option value="1">Standard</option>
                        <option value="2">Premium</option>
                    </select>
                <div class="image-upload-section">
                    <h2>Upload Image</h2>
                    <input type="file" id="image" name="image" required>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" id="price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" required></textarea>
                    </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

</body>
</html>

