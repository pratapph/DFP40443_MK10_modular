<?php
session_start();
$menu = $_GET['menu'] ?? 'utama';
require 'includes/functions.php';
$data = getProdukData();

switch($menu){
    case 'utama':
        $pageTitle = "Biskut Klasik - Utama";
        include 'includes/header.php';
        include 'includes/nav.php';
        // HTML content for home page (gallery & instructions)
        include 'utama_page.php'; // optional, can move main content here
        include 'includes/footer.php';
        break;

    case 'tempah':
        $pageTitle = "Biskut Klasik - Borang Tempahan";
        include 'includes/header.php';
        include 'includes/nav.php';
        include 'tempah_page.php'; // move tempah form code
        include 'includes/footer.php';
        break;

    case 'invois':
        if(!isset($_SESSION['invois_data'])){
            echo "<script>alert('Invois belum ada.');window.location='index.php?menu=tempah';</script>";
            exit();
        }
        $pageTitle = "Biskut Klasik - Invois";
        $invois = $_SESSION['invois_data'];
        include 'includes/header.php';
        include 'includes/nav.php';
        include 'invois_page.php'; // move invois HTML
        include 'includes/footer.php';
        break;

    default:
        $pageTitle = "Menu tidak ditemukan";
        include 'includes/header.php';
        echo "<div class='container'><h1>Menu tidak ditemukan</h1><a href='index.php?menu=utama'>Kembali ke Utama</a></div>";
        include 'includes/footer.php';
}