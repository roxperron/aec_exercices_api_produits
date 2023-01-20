<?php

require_once './modeles/produits.php';



class ControleurProduit {


    function afficherTableauProduit() {
        $produits = modele_produit::ObtenirTous();
        require './vues/produits.php';
    }


    function afficherJSON() {
       $produits = modele_produit::ObtenirTous();
       echo json_encode($produits);
    }

    function afficherFiche() {
        if(isset($_GET["id"])) {
            $produits = modele_produit::ObtenirUn($_GET["id"]);
            if($produits) {  
                require './vues/fiche.php';
            } else {
                $erreur = "Aucun produits trouvés.";
               
            }
        } else {
            $erreur = "L'identifiant (id) du produit à afficher est manquant dans l'url";
            
        }
    }



    function afficherFicheJSON($id) {
        $produit = modele_produit::ObtenirUn($id);
        echo json_encode($produit);
    }



    function ajouterJSON($data) {
        $resultat = new stdClass();
            if(isset($data['nom']) && isset($data['description']) && isset($data['prix']) && isset($data['qtestock'])) {
        $resultat->message = modele_produit::ajouter($data['nom'], $data['description'], $data['prix'], $data['qtestock']);
        } else {
            $resultat->message = "Impossible d'ajouter un produit. Des informations sont manquantes";
        }
        echo json_encode($resultat);
    }   
    
    function modifierJSON($data) {
        $resultat = new stdClass();
           if(isset($_GET['id'])  && isset($data['nom']) && isset($data['description']) && isset($data['prix']) && isset($data['qtestock'])) {
        $resultat->message = modele_produit::modifier($_GET['id'], $data['nom'], $data['description'], $data['prix'], $data['qtestock']);
        } else {
            $resultat->message = "Impossible de modifier le produit. Des informations sont manquantes";
        }
        echo json_encode($resultat);
        }


        function supprimerJSON($id) {
            $resultat = new stdClass();
            $resultat->message = modele_produit::supprimer($_GET['id']);
            echo json_encode($resultat);
            }    




}

?>