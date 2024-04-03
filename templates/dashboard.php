
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/styles.css"> 
</head>
<body>

<div class="navbar">
    <div class="logo-burger">
        <div class="burger-menu" onclick="toggleSidebar()">
            <div class="burger-line"></div>
            <div class="burger-line"></div>
            <div class="burger-line"></div>
        </div>
        <div class="logo">
            <img src="../assets/img/unnamed-removebg-preview.png" alt="Image 3">
        </div>
    </div>
    <div class="search">
        <form method="GET" action="dashboard.php">
            <input type="text" name="searchInput" placeholder="Rechercher...">
            <button type="submit">Search</button> 
        </form>
    </div>
</div>

<div class="main">
    <div class="sidebar">
        <div class="sidebar-btn">
            <div class="btn1"><a href="voyageForm.php">Ajouter un voyage</a></div>
            <div class="btn2"><a href='logout.php'>Déconnexion</a></div>
        </div>
    </div>

    <div class="card-container">
        <?php 
        include "../classes/voyage.php"; 
        $voyage = new Voyage();
        $searchResults = [];
        if(!empty($_GET['searchInput'])) {
            $searchTerm = $_GET['searchInput'];
            $searchResults = $voyage->searchVoyages($searchTerm);
        } else {
            $searchResults = $voyage->getAllVoyages();
        }
        foreach ($searchResults as $voy) : ?>
            <div class="card">
                <img src="<?php echo $voy['image_url']; ?>" alt="<?php echo $voy['title']; ?>">
                <p class="description"><?php echo $voy['description']; ?></p>
                <div class="button-group">
                    <a href="../controlers/EditVoyage.php?id=<?php echo $voy['id_voyage']; ?>" class="button-group1">Modifier</a>
                    <a href="../controlers/delete_voyage.php?id=<?php echo $voy['id_voyage']; ?>" class="button-group2">Supprimer</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="script.js"></script> 
</body>
</html>
