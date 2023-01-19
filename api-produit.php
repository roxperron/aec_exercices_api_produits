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

        case 'POST': 
            $corpsJSON = file_get_contents('php://input');
            $data = json_decode($corpsJSON, TRUE);
            $controleurProduits->ajouterJSON($data);
            break;
        
        case 'PUT':
            if(isset($_GET['id'])){
                $corpsJSON = file_get_contents('php://input');
                $data = json_decode($corpsJSON, TRUE);
                $controleurProduits->modifierJSON($data);
            }
            break;
            
        case 'DELETE':
            if(isset($_GET['id'])){
                $controleurProduits->supprimerJSON($_GET['id']);
            } 
            break;
            default;
    }

?>