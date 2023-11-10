<?php
require_once('./assets/php/middleware/connect.php');

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['_method']) && strtoupper($_POST['_method']) == 'DELETE') {
        $userId = $_REQUEST['user_id'];
        $email = $_REQUEST['email'];
        $alias = $_REQUEST['alias'];
        $password = $_REQUEST['password'];

        if (empty($email) || empty($alias) || empty($password)) {
            echo "Tous les champs doivent être remplis.";
        } else {
            $sql = "DELETE FROM user WHERE id = :user_id AND email = :email AND alias = :alias AND password = :password";
            $stmt = $db_connect->prepare($sql);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':alias', $alias);
            $stmt->bindParam(':password', $password);
            $resultat = $stmt->execute();

            if ($resultat) {
                echo "User Supprimé. ID de l'utilisateur : " . $userId;
            } else {
                echo "Erreur lors de la suppression de l'utilisateur.";
            }
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<body>
    <h1>Formulaire de suppression de l'user</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="hidden" name="_method" value="DELETE">
        <input type="int" name="user_id" value="<?php echo $user['id']; ?>">
        <label for="email">Email :</label>
        <input type="text" name="email" id="email" required value="<?php echo $user['email']; ?>"><br>

        <label for="alias">Alias :</label>
        <input type="text" name="alias" id="alias" required value="<?php echo $user['alias']; ?>"><br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required value="<?php echo $user['password']; ?>"><br>

        <input type="submit" value="Supprimer l'user">
    </form>
</body>