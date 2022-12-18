<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";

try {
    $db = new PDO("mysql:host=$servername; dbname=abiturient", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $db->prepare("SELECT password from users where login = '$_POST[login]';");
    $sql->execute();
    $password = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo '<pre>';
    echo $_POST['password'];
    echo '<br>';
    echo $password[0]['password'];
    echo '</pre>';

    if (password_verify($_POST['password'], $password[0]['password'])) {
        echo 'TRUE';
    } else {
        echo 'FUCKKKK';
    }
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$db = null;
