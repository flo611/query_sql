<?php 

require_once('../../middleware/connect.php');

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['image_id'])) {
        $image_id = $_POST['image_id'];
        $image = $_POST['image'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $all_description = $_POST['all_description'];
        $tarifs = $_POST['tarifs'];
        $destinations = $_POST['destinations'];

        if (empty($image) || empty($name) || empty($description)|| empty($all_description)|| empty($tarifs)|| empty($destinations)) {
            echo "Tous les champs doivent être remplis.";
        } else {
            $sql = "UPDATE photo SET 
            image = :image, 
            name = :name, 
            description = :description, 
            all_description = :all_description, 
            tarifs = :tarifs, 
            destinations = :destinations 
            WHERE id = :image_id";
            $stmt = $db_connect->prepare($sql);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':all_description', $all_description);
            $stmt->bindParam(':tarifs', $tarifs);
            $stmt->bindParam(':destinations', $destinations);
            $resultat = $stmt->execute();

            if ($resultat) {
                // echo "Photo mise à jour avec succès. ID de l'image : " . $image_id;
                header("Location: http://localhost/public/query_sql");
            } else {
                echo "Erreur lors de la mise à jour de la photo.";
            }
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
