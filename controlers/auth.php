<?php
include "../classes/db.php";

session_start();

try {
    $database = new Database('localhost', 'root', 'root', 'jcp_vacances');
    $database->connect();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $mot_de_passe = $_POST['password'];
        $query = "SELECT * FROM user INNER JOIN role ON user.id_role = role.id_role WHERE user.id_role = 1 AND role.id_role = 1 AND username = '$username' AND password = '$mot_de_passe'";
        $statement = $database->conn->prepare($query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            $_SESSION['username'] = $username; 
            header("Location: ../templates/dashboard.php");
            exit();
        } else {
            $messageErreur = "Aucun utilisateur trouvé";
        }
    }

} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

if (isset($messageErreur)) {
    $messageErreur = $messageErreur;
} else {
    $messageErreur = "Une erreur s'est produite.";
}


header("Location: ../index.php?erreur=" . urlencode($messageErreur));
exit();
?>
