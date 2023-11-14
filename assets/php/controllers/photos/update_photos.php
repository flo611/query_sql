<?php 

require_once('../../middleware/connect.php');

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        $id = $_POST['id'];
        $image = $_POST['image'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $destination = $_POST['destination'];

        if (empty($image) || empty($name) || empty($description)|| empty($price)|| empty($destination)) {
            echo "Tous les champs doivent être remplis.";
        } else {
            $sql = "UPDATE photo SET 
            image = :image, 
            name = :name, 
            description = :description, 
            price = :price, 
            destination = :destination 
            WHERE id = :id";
            $stmt = $db_connect->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':destination', $destination);
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
