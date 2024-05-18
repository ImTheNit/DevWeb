<!-- recherche.php -->
<?php
$Path_ref="../";
include $Path_ref.'inc/header.php';

// Récupérer la requête de recherche
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Charger les données des produits
$jsonData = file_get_contents('../data.json');
$data = json_decode($jsonData, true);

$results = [];

// Rechercher dans les produits
foreach ($data as $category => $products) {
    foreach ($products as $product) {
        if (stripos($product['name'], $query) !== false) {
            $results[] = $product;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de recherche</title>
    <style>
        .result-item {
            margin: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            overflow: hidden;
            text-align: center;
            background-color: #ffffff;
        }
        .result-item img {
            max-width: 100%;
            height: auto;
        }
        .result-item h3 {
            margin: 10px 0;
        }
        .result-item p {
            margin: 10px 0;
        }
        .add-to-cart-form {
            margin-top: 10px;
        }
        .add-to-cart-form select,
        .add-to-cart-form input[type="number"] {
            margin: 5px 0;
        }
        .add-to-cart-form button {
            background-color: #ff0000;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <main>
        <h1>Résultats de recherche</h1>
        <?php if (!empty($results)): ?>
            <div class="results">
                <?php foreach ($results as $product): ?>
                    <div class="result-item">
                        <img src="<?php echo $product['image_link']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p><?php echo htmlspecialchars($product['description']); ?></p>
                        <p><?php echo htmlspecialchars($product['prices']['8 parts']); ?>€</p>
                        <form class="add-to-cart-form" method="post" action="ajouter_au_panier.php">
                            <input type="hidden" name="produit_id" value="<?php echo $product['id']; ?>">
                            <label for="taille">Taille:</label>
                            <select name="taille">
                                <?php foreach ($product['prices'] as $size => $price): ?>
                                    <option value="<?php echo htmlspecialchars($size); ?>"><?php echo htmlspecialchars($size) . ' - ' . htmlspecialchars($price) . '€'; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="quantite">Quantité:</label>
                            <input type="number" name="quantite" value="1" min="1">
                            <button type="submit">Ajouter au panier</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Aucun résultat trouvé pour "<?php echo htmlspecialchars($query); ?>"</p>
        <?php endif; ?>
    </main>
    <?php include $Path_ref.'inc/footer.php'; ?>
</body>
</html>
