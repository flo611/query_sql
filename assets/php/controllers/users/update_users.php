<?php 

require_once('../../middleware/connect.php');

$id = $_POST['id'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$alias = $_POST['alias'];

$db_connect->query("UPDATE user SET id=$id, email='$email', password='$password', alias='$alias' WHERE user.id = $id");

header("Location: http://localhost/public/query_sql");
