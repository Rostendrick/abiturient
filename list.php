<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
try {
    $db = new PDO("mysql:host=$servername; dbname=abiturient", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sth = $db->prepare("SELECT name, surname, sex, number_of_group, mail, ege_points, birthdate, local FROM users");
    $sth->execute();
    $users_array = $sth->fetchAll(PDO::FETCH_ASSOC);

    foreach($users_array as $key => $value) {
        if ($users_array[$key]['sex'] == '1') {
            $users_array[$key]['sex'] = 'Женский';
        } else {
            $users_array[$key]['sex'] = 'Мужской';
        }
    }

    foreach($users_array as $key => $value) {
        if ($users_array[$key]['local'] == '1') {
            $users_array[$key]['local'] = 'Местный';
        } else {   
            $users_array[$key]['local'] = 'Приезжий';
        }  
    }
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$db = null;
include 'list.html';