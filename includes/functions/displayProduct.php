<?php
function afficherProduit($produit) {
    echo "<div class='produit'>";
    echo "<h2>" . $produit["nom"] . "</h2>";
    echo "<p>Prix : " . $produit["prix"] . " DH</p>";
    echo "</div>";
}