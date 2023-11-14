<h1>Liste des photos</h1>

    <?php 

    require_once('../../assets/php/middleware/connect.php');

    $query_photo = $db_connect->query('SELECT * FROM photo');

    foreach ($query_photo as $photo) {
        echo "<img src='{$photo['image']}' alt='{$photo['name']}'>";
    }

    ?>