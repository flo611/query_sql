<?php

require_once('../../middleware/connect.php');

try {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_SESSION['form_submitted'])) {
            $_SESSION['form_submitted'] = true;

            $image = $_POST['image-src'];
            $name = $_POST['image-name'];
            $description = $_POST['image-description'];
            $price = $_POST['image-price'];
            $destination = $_POST['image-destination'];

            $sql = "INSERT INTO photo (image, name, description, price, destination) VALUES (:image, :name, :description, :price, :destination)";
            $stmt = $db_connect->prepare($sql);

            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':destination', $destination);

            $result = $stmt->execute();

            if ($result) {
                $picture_id = $db_connect->lastInsertId();
                header("Location: http://localhost/public/query_sql");
            } else {
                echo "Erreur lors de la création de la photo.";
            }
        } else {
            echo "Le formulaire a déjà été soumis. Vous ne pouvez pas soumettre le formulaire à nouveau.";
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}