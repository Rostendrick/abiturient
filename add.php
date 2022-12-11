<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
try {
    $db = new PDO("mysql:host=$servername; dbname=abiturient", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO users (name, surname, sex, number_of_group, mail, ege_points, birthdate, local) VALUES ('$_POST[name]', '$_POST[surname]', $_POST[sex], $_POST[group_number], '$_POST[mail]', $_POST[ege_points], '$_POST[date_of_birth]', $_POST[place])";
    $db -> exec($sql);
    include 'index.html';
    include 'goer.html';
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$db = null;
?>

    <!-- имя, фамилия, пол, номер группы (от 2 до 5 цифр или букв), e-mail (должен быть уникален), 
    суммарное число баллов на ЕГЭ (проверять на адекватность), год рождения, местный или иногородний. -->