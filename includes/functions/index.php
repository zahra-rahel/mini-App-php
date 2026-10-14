<?php
// Header (ضروري)
require __DIR__ . '/includes/header.php';

// Menu (اختياري)
include __DIR__ . '/includes/menu.php';

// Data (مرة وحدة فقط)
require_once __DIR__ . '/config/data.php';

// Function (ما تتعاودش)
require_once __DIR__ . '/functions/displayProduct.php';
?>

<h2>Liste des produits</h2>

<?php
// عرض المنتجات
if (isset($produits) && is_array($produits)) {
    foreach ($produits as $produit) {
        afficherProduit($produit);
    }
} else {
    echo "<p>Aucun produit disponible</p>";
}
?>

<?php
// Footer
include __DIR__ . '/includes/footer.php';
?>