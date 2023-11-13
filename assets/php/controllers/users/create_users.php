<?php

require_once('../../middleware/connect.php');

$email = $_POST['email'];
$password = $_POST['password'];
$alias = $_POST['alias'];

$pwd = password_hash($password, PASSWORD_DEFAULT);

$db_connect->query("INSERT INTO user (id, email, password, alias) VALUES (NULL, '$email', '$pwd', '$alias')");

header("Location: http://localhost/public/query_sql");