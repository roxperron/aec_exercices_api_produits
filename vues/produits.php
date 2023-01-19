<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Description</th>          
        <th>Prix</th>        
        <th>Quantité en stock</th>
    </tr>

    <?php
        foreach ($produits as $produit) {
    ?>
        <tr>
            <td><?= $produit->id ?></td>
            <td><?= $produit->nom ?></td>
            <td><?= $produit->description ?></td>
            <td><?= $produit->prix ?></td>
            <td><?= $produit->qtestock ?></td>

        </tr>
    <?php
        }
    ?>
</table>