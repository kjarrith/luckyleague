<?php
session_start('');
ob_start();
//CONNECT TO THE DATABASE
include_once 'assets/initiate/connect.php';
$appVersion = "0.9.8";
$cssVersion = 30;
$faviconVersion = 1;
$javaVersion = 27;

    define('APPDIR' ,dirname(__FILE__));
    $parts = explode('/', $_SERVER['REQUEST_URI']);

    //Get rid of empty item
    array_shift($parts);

    $system        = array_shift($parts);
    $firstGet      = array_shift($parts);
    $secondGet     = array_shift($parts);
    $thirdGet      = array_shift($parts);
    $fourthGet     = array_shift($parts);

    switch ($system) {
        case 'categories':
            require_once(APPDIR . '/views/createcats.php');
            break;
        case 'maetingar':
            $_GET['employeeID'] = $firstGet;
            require_once(APPDIR . '/views/maetingar.php');
            break;
        case 'sms':
            require_once(APPDIR . '/includes/scripts/sms.php');
            break;
        case 'vikan':
            $_GET['employeeGet'] = $firstGet;
            $_GET['date'] = $secondGet;
            require_once(APPDIR . '/views/week.php');
            break;
        default:
            require_once(APPDIR . '/views/home.php');
            break;
    }
    exit;
