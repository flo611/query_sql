<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un utilisateur</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <script src="../../assets/js/main.js"></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="../../index.php">Accueil</a>
                </li>
                <li>
                    <a href="./show.php">Afficher</a>
                </li>
                <li>
                    <a href="./create.php">Créer</a>
                </li>
                <li>
                    <a href="./edit.php">Editer</a>
                </li>
                <li>
                    <a href="./delete.php">Supprimer</a>
                </li>
            </ul>
        </nav>
    </header>
    <div>
        <h1>Users</h1>
        <form action="../../assets/php/controllers/users/create_users.php" method="POST">
            <div>
                <label for="email">Email</label>
                <input type="text" id="email" name="email">
            </div>
            <div>
                <label for="alias">Pseudonyme</label>
                <input type="text" id="alias" name="alias">
            </div>
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit">Envoyer</button>
        </form>
    </div>
    <div>
        <h1>Photos</h1>
        <form action="../../assets/php/controllers/photos/create_photos.php" method="POST">
            <div>
                <label for="image-src">Image</label>
                <input type="text" id="image-src" name="image-src">
            </div>
            <div>
                <label for="image-name">Nom</label>
                <input type="text" id="image-name" name="image-name">
            </div>
            <div>
                <label for="image-description">Description</label>
                <input type="text" id="image-description" name="image-description">
            </div>
            </div>
            <div>
                <label for="image-price">Prix</label>
                <input type="text" id="image-price" name="image-price">
            </div>
            <div>
                <label for="image-destination">Destination</label>
                <input type="text" id="image-destination" name="image-destination">
            </div>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</body>
</html>