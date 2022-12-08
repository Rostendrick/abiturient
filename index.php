<?php 
include 'index.html';
$page = isset($_GET['page']) ? $_GET['page'] : 'page';
switch ($page) {
    case ('list'):
        include 'list.php';
        break;
    case ('add'):
        include 'add-form.html';
        break;
    default:
        include 'list.php';
        break;
    }