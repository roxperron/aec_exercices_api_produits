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
                require './vues/erreur.php';
            }
        } else {
            $erreur = "L'identifiant (id) du produit à afficher est manquant dans l'url";
            require './vues/erreur.php';
        }
    }

    function afficherFicheJSON($id) {
        $produit = modele_produit::ObtenirUn($id);
        echo json_encode($produit);
        }




}

?>