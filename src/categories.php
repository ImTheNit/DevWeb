<?php 
$pageTitle = "Les catégories "; 
$Path_ref="../";
include $Path_ref.'inc/header.php'; 


$categoryName = isset($_GET['cat']) ? str_replace('-', ' ', $_GET['cat']) : null;

$jsonData = file_get_contents('../data.json');
$data = json_decode($jsonData, true);

if ($categoryName && isset($data[$categoryName])) {
    echo "<h2>" . htmlspecialchars($categoryName) . "</h2>";
    echo "<div class='products-container'>";
    
   
    foreach ($data[$categoryName] as $product) {
        echo "<div class='card-product'>";
        echo "<img class='image-product' src='" . htmlspecialchars($product['image_link']) . "' alt='" . htmlspecialchars($product['name']) . "'>";
        echo "<h3 class='name-product'>" . htmlspecialchars($product['name']) . "</h3>";
        echo "<p class='description-product'>" . htmlspecialchars($product['description']) . "</p>";
        echo "<select class='part-size-select'>";
        foreach ($product['prices'] as $size => $price) {
            echo "<option value='$size'>" . htmlspecialchars($size) . "</option>";
        }
        echo "</select>";
        echo "<p class='price-product'>" . htmlspecialchars(current($product['prices'])) . "€</p>";
        echo "<div class='quantity-container'>";
        echo "<input type='number' class='quantity-input' value='1' min='1'>";
        echo "</div>";
        echo "<button class='add-to-cart-btn'>Ajouter au panier</button>";
        echo "</div>"; 
    }
    
    echo "</div>"; 
} else {
    echo "<p>Catégorie non trouvée.</p>";
}

?>




<?php  
include $Path_ref.'inc/footer.php'; 
?>

