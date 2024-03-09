<?php 
$pageTitle = "Le Palais des gâteaux";
include 'include/header.inc.php'; 
?>

<h1 class="homepage-title">Le Palais des Gâteaux</h1>

<div class="intro-text">
    <p>Bienvenue dans l'univers enchanté du Palais des Gâteaux, où chaque création sucrée raconte une histoire de passion, de goût et de raffinement.</p>
    <p>Découvrez notre catalogue complet, une véritable caverne d'Ali Baba pour les amoureux de la pâtisserie, où l'art de la gourmandise se décline en une multitude de saveurs et de formes.</p>
    <p>Laissez-vous guider par vos sens et trouvez le gâteau parfait pour célébrer vos moments les plus précieux.</p>
</div>


<?php

$jsonData = file_get_contents('data.json');

$data = json_decode($jsonData, true);


foreach ($data as $categoryName => $products) {
    echo "<h2>" . htmlspecialchars($categoryName) . "</h2>";
    echo "<div class='accueil-products-grid'>"; 

    foreach ($products as $product) {
        echo "<div class='accueil-card-product'>";
        
        echo "<img class='accueil-image-product' src='" . htmlspecialchars($product['image_link']) . "' alt='" . htmlspecialchars($product['name']) . "'>";
        
        echo "<h3 class='accueil-name-product'>" . htmlspecialchars($product['name']) . "</h3>";
        
        echo "<p class='accueil-description-product'>" . htmlspecialchars($product['description']) . "</p>";
       
        echo "<p class='accueil-price-product'>" . htmlspecialchars(current($product['prices'])) . "€</p>";

        
        echo "<div class='quantity-container'>";
        echo "<label for='quantity'>Quantité: </label>";
        echo "<input type='number' id='quantity' name='quantity' value='1' min='1' class='quantity-input'>";
        echo "</div>";

        
        echo "<button class='accueil-add-to-cart-btn'>Ajouter au panier</button>";
        echo "</div>"; 
    }

    echo "</div>"; 
}
?>

<?php  
include 'include/footer.inc.php'; 
?>