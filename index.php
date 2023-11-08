<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exo sql</title>
    <link rel="stylesheet" href="./assets//css/styles.css">
    <script defer src="./assets/js/main.js"></script>
</head>
<body>

<h1>tableau user</h1>
<table border="1">
<tr>
<th >Email</th>
<th>Password</th>
<th>Alias</th>
    </tr>
    <?php

    require_once('./assets/php/middleware/connect.php');

    $query_user = $db_connect->query('SELECT * FROM user'); 

    foreach($query_user as $user) {
        echo '<tr>';
        echo '<td>' . $user['email'] . '</td>';
        echo '<td>' . $user['password'] . '</td>';
        echo '<td>' . $user['alias'] . '</td>';
        echo '</tr>';
    }

    ?>
  
</table>
 <?php require_once('./assets/php/controller/create_users.php'); ?>

</body>
</html>