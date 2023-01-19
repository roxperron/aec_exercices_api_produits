<?php 
    header('Content-Type: application/json');
    require_once 'controleurs/produits.php';
    $controleurProduit = new ControleurProduit;
    $controleurProduit -> afficherFicheJSON($_GET['id']);
?>