
<?php

require_once('../../middleware/connect.php');

$id = isset($_POST['id-delete']) ? $_POST['id-delete'] : null;


if ($id !== null && is_numeric($id)) {

    $stmt = $db_connect->prepare("DELETE FROM `photo` WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $resultat = $stmt->execute();


    if ($resultat) {
        echo "Suppression réussie.";
    } else {
        echo "Erreur lors de la suppression.";
    }
} else {
    echo "ID invalide.";
}

?>
