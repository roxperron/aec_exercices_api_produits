<?php
    require_once 'controlers/produits.php';
?>

<!doctype html>
<html lang="fr">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/styles.css">
  <title>Listes des produits</title>
 </head>
 <body>
    <h1>Listes des produits</h1>

    <?php
        $controleurProduit=new ControleurProduit;
        $controleurProduit->afficherTableauProduit();
    ?>

    <a href="index.php">Retour à la page d'acceuil</a>

 </body>
</html>