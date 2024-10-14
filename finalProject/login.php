<?php
$email = $_POST['email'];
$pas = $_POST['password'];

$path = "/home/sab9812/databases";
$db = new SQLite3($path.'/test.db');

$res2 = $db->prepare("SELECT * FROM USERS1 WHERE EMAIL=:email AND PASSWORD=:password");
$res2->bindValue(':email', $email, SQLITE3_TEXT);  
$res2->bindValue(':password', $pas, SQLITE3_TEXT);
$result2 = $res2->execute();

if ($row = $result2->fetchArray()) {
    echo "success";
    exit();
} else {
    echo "Incorrect username or password. Please try again.";
}

$db->close();

?>