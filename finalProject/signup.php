<?php
$email = $_POST["email"];
$pas = $_POST["password"];

$path = "/home/sab9812/databases";
$db = new SQLite3($path.'/test.db');

$query = "INSERT INTO USERS1 (email, password) VALUES ('$email', '$pas')";
$db->exec($query);

echo 'Thank you for registering!';

$db->close();
?>