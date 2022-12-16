<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";

$processed_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

try {
    $db = new PDO("mysql:host=$servername; dbname=abiturient", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO users (name, surname, sex, number_of_group, mail, ege_points, birthdate, local, password, login) VALUES 
    ('$_POST[name]', '$_POST[surname]', $_POST[sex], $_POST[group_number], '$_POST[mail]', $_POST[ege_points], '$_POST[date_of_birth]', $_POST[place], '$processed_password', $_POST[login])";
    $db -> exec($sql);
    include 'index.html';
    include 'goer.html';
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$db = null;

