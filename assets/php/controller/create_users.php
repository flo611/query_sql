<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création formulaire User</title>
    <link rel="stylesheet" href="./assets//css/styles.css">
    <script defer src="./assets/js/main.js"></script>
</head>

<body>
    <?php
require_once('./assets/php/middleware/connect.php');

try {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_SESSION['form_submitted'])) {
            $_SESSION['form_submitted'] = true;

            $email = $_POST['email'];
            $alias = $_POST['alias'];
            $password = $_POST['password'];

            $sql = "INSERT INTO user (email, alias, password) VALUES (:email, :alias, :password)";
            $stmt = $db_connect->prepare($sql);

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':alias', $alias);
            $stmt->bindParam(':password', $password);

            $resultat = $stmt->execute();

            if ($resultat) {
                $nouvelUtilisateurId = $db_connect->lastInsertId();
                echo "User créé avec succès. ID de l'user : " . $nouvelUtilisateurId;
            } else {
                echo "Erreur lors de la création de l'user.";
            }
        } else {
            echo "Le formulaire a déjà été soumis. Vous ne pouvez pas soumettre le formulaire à nouveau.";
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<body>
    <h1>Formulaire de création du user</h1>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="email">Email :</label>
        <input type="text" name="email" id="email" required><br>

        <label for="alias">Alias :</label>
        <input type="text" name="alias" id="alias" required><br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Créer un user">
    </form>
</body>
</html>