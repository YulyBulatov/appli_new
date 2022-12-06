<?php

require_once "db_functions.php";

$produits = findOneById($_GET['id']);

foreach ($produits as $produit){

    $index = $produit['id'];

    echo "<a href = index.php>Retour</a>";

    echo "<h1>".$produit['name']."</h1><br>";

    echo "<p>".$produit['description']."...</p><br>";

    echo "<p>".number_format($produit['price'], 2, ",", "&nbsp;")."</p><br>";

    echo "<a href = traitement.php?action=add&id=$index>Ajouter au panier</a><br>";

}