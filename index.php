<?php
// index.php
session_start();

require_once 'config/database.php';
require_once 'includes/functions.php';

$menu = $_GET['menu'] ?? 'utama';

switch ($menu) {
    case 'utama':
        $pageTitle = "Utama";
        $activeMenu = "utama";
        $content = 'templates/utama.php';
        break;
        
    case 'tempah':
        $pageTitle = "Tempahan";
        $activeMenu = "tempah";
        $content = 'templates/tempah.php';
        break;
        
    case 'invois':
        $pageTitle = "Invois";
        $activeMenu = "invois";
        $content = 'templates/invois.php';
        break;
        
    default:
        $pageTitle = "Ralat - Halaman Tidak Dijumpai";
        $activeMenu = "";
        $content = 'templates/error.php';  // Guna 'error.php'
        http_response_code(404);
}

require_once 'includes/header.php';
require_once 'includes/navigation.php';
require_once $content;
require_once 'includes/footer.php';
?>