<?php
$messageErreur = isset($_GET['erreur']) ? $_GET['erreur'] : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/css/styles2.css"> 
    <link rel="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<div class="container">
    <div class="connexion">
    <div class="image">
        <img src="assets/img/unnamed-removebg-preview.png" alt="JCP Vacances">
    </div>
    <div class="login">
    <?php if(!empty($messageErreur)): ?>
        <p style="color: red;"><?php echo $messageErreur; ?></p>
    <?php endif; ?>
    <form action="controlers/auth.php" method="post">
        <div class="email">
            <label for="text">Username :</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="password">
            <label for="password">Password :</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Se connecter</button>
    </form>
    </div>
    </div>
</div>
</body>
</html>





