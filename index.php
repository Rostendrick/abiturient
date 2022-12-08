<?php 
$page = $_GET['page'];
include 'index.html';
switch ($page) {
    case ('list'):
        include 'list.php';
        break;
    case ('add'):
        include 'add-form.html';
        include 'add.php';
        break;
    default:
        include 'list.php';;
        break;
}