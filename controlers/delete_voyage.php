<?php
include "../classes/voyage.php"; 


if(isset($_GET['id'])) {
    $id_voyage = $_GET['id'];
    $voyage = new Voyage();
    $voyage->delete($id_voyage);
    header("Location: ../templates/dashboard.php");
    exit();
} else {
    echo "Error ID.";
}
?>
