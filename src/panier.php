<?php
$pageTitle = "Votre panier";
$Path_ref="../";
include $Path_ref.'inc/header.php';

$totalGeneral = 0;

// Initialiser la session si ce n'est pas déjà fait
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <style>
        .panier-container {
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 800px;
        }

        .panier-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .panier-table th, 
        .panier-table td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 12px;
        }

        .panier-table th {
            background-color: #f2f2f2;
            color: #333;
        }

        .panier-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .panier-table tr:hover {
            background-color: #f1f1f1;
        }

        .panier-table img {
            width: 50px;
            height: auto;
            border-radius: 4px;
        }

        .btn-supprimer {
            padding: 8px 16px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-supprimer:hover {
            background-color: #d32f2f;
        }

        .btn-primary {
            display: block;
            width: max-content;
            margin: 20px auto 40px;
            padding: 10px 20px;
            background-color: #ff0000;
            color: white;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #ff0000;
        }

        .btn-valider {
            background-color: orange;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 1em;
            border-radius: 5px;
            float: right;
            margin-top: 10px;
        }

        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 1rem 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <main>
        <div class="panier-container">
            <?php
            // Vérifier si le panier est vide
            if (empty($_SESSION['panier'])) {
                echo "<p>Votre panier est vide.</p>";
            } else {
                $jsonData = file_get_contents($Path_ref.'data.json');
                $data = json_decode($jsonData, true);

                echo "<table class='panier-table'>";
                echo "<tr><th>Photo</th><th>Nom du gâteau</th><th>Taille</th><th>Prix unitaire</th><th>Quantité</th><th>Total</th><th>Action</th></tr>";

                // Boucler sur chaque élément du panier stocké en session
                foreach ($_SESSION['panier'] as $produit_id_taille => $infos) {
                    list($produit_id, $taille) = explode('_', $produit_id_taille);

                    foreach ($data as $category => $products) {
                        foreach ($products as $product) {
                            if ($product['id'] == $produit_id) {
                                if (isset($product['prices'][$taille])) {
                                    $prixUnitaire = $product['prices'][$taille];
                                    $totalArticle = $prixUnitaire * $infos['quantite'];
                                    $totalGeneral += $totalArticle;

                                    echo "<tr>";
                                    echo "<td><img src='" . htmlspecialchars($product['image_link']) . "' alt='Image'></td>";
                                    echo "<td>" . htmlspecialchars($product['name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($taille) . "</td>";
                                    echo "<td>" . htmlspecialchars($prixUnitaire) . "€</td>";
                                    echo "<td>" . htmlspecialchars($infos['quantite']) . "</td>";
                                    echo "<td>" . htmlspecialchars($totalArticle) . "€</td>";
                                    echo "<td><form method='post' action='supprimer_du_panier.php'><input type='hidden' name='produit_id_taille' value='" . $produit_id_taille . "'><input type='submit' class='btn-supprimer' value='Supprimer'></form></td>";
                                    echo "</tr>";
                                }
                            }
                        }
                    }
                }

                echo "<tr><td colspan='6' style='text-align:right;'>Total général :</td><td>" . htmlspecialchars($totalGeneral) . "€</td></tr>";
                echo "</table>";

                if ($totalGeneral > 0) {
                    echo "<div style='text-align:right;margin-top:20px;'>";
                    echo "<button onclick='location.href=\"paiement.php\"' class='btn-valider'>Valider la commande</button>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </main>
    <footer>
        <p>Contactez-nous: info@palaisdesgateaux.com</p>
    </footer>
</body>
</html>

<?php
include $Path_ref.'inc/footer.php';
?>
