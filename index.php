<?php

require_once "db_functions.php";

$produits = findAll();

foreach ($produits as $produit){

    $index = $produit['id'];

    echo "<h1><a href = product.php?id=$index>".$produit['name']."</a></h1><br>";

    echo "<p>".mb_substr($produit['description'], 0, 50)."...</p><br>";

    echo "<p>".number_format($produit['price'], 2, ",", "&nbsp;")."</p><br>";

    echo "<a href = traitement.php>Ajouter au panier</a><br>";
}






