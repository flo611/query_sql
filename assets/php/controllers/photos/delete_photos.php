<?php 

require_once('../../middleware/connect.php');

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['image_id']) && isset($_POST['_method']) && strtoupper($_POST['_method']) == 'DELETE') {

        $image_id = $_POST['image_id'];

        $sql_delete = "DELETE FROM photo WHERE image_id = :image_id";
        $stmt_delete = $db_connect->prepare($sql_delete);
        $stmt_delete->bindParam(':image_id', $image_id);
        $resultat = $stmt_delete->execute();

        if (!$photo) {
            echo "La photo avec l'ID $image_id n'existe pas.";
        } else {
            $sql_delete = "DELETE FROM photo WHERE id = :image_id";
            $stmt_delete = $db_connect->prepare($sql_delete);
            $stmt_delete->bindParam(':image_id', $image_id);
            $resultat = $stmt_delete->execute();

            if ($resultat) {
                header("Location: http://localhost/public/query_sql");
                // echo "<script>alert('Photo supprimée avec succès. ID de l\'image : $image_id');</script>";
            } else {
                echo "<script>alert('Erreur lors de la suppression de la photo.');</script>";
            }
        }
    }
} catch (PDOException $e) {
    error_log("Erreur : " . $e->getMessage());
    echo "Une erreur s'est produite lors du traitement de la requête : " . $e->getMessage();
}