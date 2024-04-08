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
        echo "<div class='price-container'>";
        echo "<select class='part-size-select' onchange='updatePrice(this)'>";
        foreach ($product['prices'] as $size => $price) {
            echo "<option value='$price'>" . htmlspecialchars($size) . " - " . htmlspecialchars($price) . "€</option>";
        }
        echo "</select>";
        // Ce paragraphe affiche le prix initialement et sera mis à jour dynamiquement avec la sélection
        echo "<p class='price-product' style='text-align: center;'>" . htmlspecialchars(current($product['prices'])) . "€</p>";
        echo "</div>"; // Fin du div price-container

        // Suppression de la ligne qui affichait le prix une deuxième fois
        echo "<div class='quantity-container'>";
        echo "<input type='number' class='quantity-input' value='1' min='1'>";
        echo "</div>";
        echo "<button class='add-to-cart-btn' data-id='" . htmlspecialchars($product['id']) . "'>Ajouter au panier</button>";

        echo "</div>"; 
    }
    
    echo "</div>"; 
} else {
    echo "<p>Catégorie non trouvée.</p>";
}

?>

<script>
function updatePrice(select) {
    var price = select.value;
    var priceContainer = select.closest('.price-container');
    var priceParagraph = priceContainer.querySelector('.price-product');
    priceParagraph.textContent = price + '€';
}

document.querySelectorAll('.add-to-cart-btn').forEach(button => {
    button.addEventListener('click', function() {
        var productId = this.dataset.id;
        var cardProduct = button.closest('.card-product');
        var sizeSelect = cardProduct.querySelector('.part-size-select');
        var size = sizeSelect.options[sizeSelect.selectedIndex].text.split(' - ')[0];
        var price = sizeSelect.value;
        var quantity = cardProduct.querySelector('.quantity-input').value;
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'panier_manager.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (this.status === 200) {
                var messagePanier = document.getElementById('message-panier');
                messagePanier.textContent = 'Produit ajouté au panier!';
                messagePanier.classList.add('visible');

                setTimeout(function() {
                    messagePanier.classList.remove('visible');
                }, 3000);
            }
        };
        xhr.send('ajouter_au_panier=1&produit_id=' + productId + '&size=' + size + '&price=' + price + '&quantity=' + quantity);
    });
});
</script>


<?php  
include $Path_ref.'inc/footer.php'; 
?>

