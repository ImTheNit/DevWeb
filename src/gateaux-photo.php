<?php 
$pageTitle = "Les Gateaux photo";
$Path_ref="../"; 
include $Path_ref.'inc/header.php'; 
?>

<h1>Les gâteaux photo</h1>

<?php

$jsonData = file_get_contents($Path_ref.'json/data.json');

$data = json_decode($jsonData, true);

if (isset($data['Les gateaux photo'])) {
    echo "<div class='products-container'>";
    foreach ($data['Les gateaux photo'] as $charlotte) {
        echo "<div class='card-product'>";

        echo "<img class='image-product' src='" . htmlspecialchars($charlotte['image_link']) . "' alt='" . htmlspecialchars($charlotte['name']) . "' style='max-width:100%; height:auto;'>";
        echo "<div class='info-product'>";
 
        echo "<h2 class='name-product'>" . htmlspecialchars($charlotte['name']) . "</h2>";
       
        echo "<p class='description-product'>" . htmlspecialchars($charlotte['description']) . "</p>";
        
        echo "<select class='part-size-select'>";
        foreach ($charlotte['prices'] as $size => $price) {
            echo "<option value='$size'>" . htmlspecialchars($size) . "</option>";
        }
        echo "</select>";
        
        echo "<p class='price-product'>" . htmlspecialchars(current($charlotte['prices'])) . "€</p>";
        
        echo "<div class='quantity-container'>";
        echo "<input type='number' class='quantity-input' value='1' min='1'>";
        echo "</div>";
        
        echo "<button class='add-to-cart-btn'>Ajouter au panier</button>";
        echo "</div>"; 
        echo "</div>"; 
    }
    echo "</div>"; 
}
?>

<?php  
include $Path_ref.'inc/footer.php'; 
?>
