<?php
include("connection.php");

function afficher_produit($is_fruit) {
    if ($is_fruit) {
        $requete = "SELECT * FROM PROJET.Produits WHERE fruit=1";
    } else {
        $requete = "SELECT * FROM PROJET.Produits WHERE fruit=0";
    }
    $idcom= oci_connect('SYSTEM','root','localhost/XE');
    $stmt = oci_parse($idcom, $requete);
    $result = oci_execute($stmt);
    if (!$result) {
        echo "Lecture impossible";
    } else {
        echo "<table cellspacing='0' cellpadding='5'>";
        echo "<tr>";
        echo "<th>Produit</th><th>Description</th><th>Stock</th><th>Prix</th><th>Quantité</th><th></th>";
        echo "</tr>";
        while ($ligne  = oci_fetch_assoc($stmt)) {
            echo "<tr id='" . $ligne['PRODUCT_ID'] . "'>";
            echo "<td>" . $ligne['NAME'] . "</td>";
            echo "<td>" . $ligne['DESCRIPTION'] . "</td>";
            echo "<td>" . $ligne['QUANTITY_STOCK'] . "</td>";
            echo "<td>" . $ligne['KILO_PRICE'] . "</td>";
            echo "<td><select name='qte_v[]'>";
            for ($i = 1; $i <= $ligne['QUANTITY_STOCK']; $i++) {
                echo"<option>" . $i . "</option>";
            }
            echo "</select></td>";
            echo '<td><button onclick="addProduit($(this));" class=bouton_produit>Ajouter au panier</button></td>';
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>

<div class='box'>
    <script>
        function addProduit(produit) {
            window.location.replace("panier.php?product_id=" + produit.parent().parent().attr('id') + "&qte_voulu=" + produit.parent().parent().find('select').val());
        }
    </script>
    <h2>Fruits Bio</h2>
    <?php
    afficher_produit(true);
    ?>
</div>
<div class='box'>
    <h2>Légumes bio</h2>
    <?php
    afficher_produit(false);
    ?>
</div>