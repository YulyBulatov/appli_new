<?php

require_once "db_functions.php";
require_once "functions.php";

$produits = findAll();

foreach ($produits as $produit){

    $index = $produit['id'];

    echo "<h1><a href = product.php?id=$index>".$produit['name']."</a></h1><br>";

    echo "<p>".mb_substr($produit['description'], 0, 50)."...</p><br>";

    echo "<p>".number_format($produit['price'], 2, ",", "&nbsp;")."&nbsp;€</p><br>";

    echo "<a href = traitement.php?action=add&id=$index>Ajouter au panier</a><br>";
}


echo "<nav>
<li class='nav-item'>
    <a class='nav-link' aria-current='page' href='/appli_new'>Page d'accueil</a>
</li>
<li class='nav-item'>
    <a class='nav-link' aria-current='page' href='recap.php/'>Recapitulatif</a>
</li>
</nav>";






