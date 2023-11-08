<?php
require_once('./assets/php/middleware/connect.php');

try {
    if ($_SERVER["REQUEST_METHOD"] == "DELETE" && isset($_DELETE['user_id'])) {
        $userId = $_DELETE['user_id'];
        $email = $_DELETE['email'];
        $alias = $_DELETE['alias'];
        $password = $_DELETE['password'];

        if (empty($email) || empty($alias) || empty($password)) {
            echo "Tous les champs doivent être remplis.";
        } else {
            $sql = "DELETE user DELETE email = :email, alias = :alias, password = :password WHERE id = :user_id";
            $stmt = $db_connect->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':alias', $alias);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':user_id', $userId);
            $resultat = $stmt->execute();

            if ($resultat) {
                echo "User Supprimer. ID de l'user : " . $userId;
            } else {
                echo "Erreur lors de supression de l'user.";
            }
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<body>
    <h1>Formulaire de supression de l'user</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="delete">
        <input type="int" name="user_id" value="<?php echo $user['id']; ?>">
        <label for="email">Email :</label>
        <input type="text" name="email" id="email" required value="<?php echo $user['email']; ?>"><br>

        <label for="alias">Alias :</label>
        <input type="text" name="alias" id="alias" required value="<?php echo $user['alias']; ?>"><br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required value="<?php echo $user['password']; ?>"><br>

        <input type="submit" value="Suppression l'user">
    </form>
</body>