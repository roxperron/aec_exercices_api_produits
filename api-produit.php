<?php 
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    require_once './controleurs/produits.php';
    $controleurProduits = new ControleurProduit;

    switch($_SERVER['REQUEST_METHOD']){
        case 'GET': 
            if(isset($_GET['id'])){
                $controleurProduits->afficherFicheJSON($_GET['id']);
            } else {
                $controleurProduits->afficherJSON();
            }

            break;
            default;
    }

?>