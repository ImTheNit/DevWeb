<?php
$pageTitle = "Votre panier";
$Path_ref="../";
include $Path_ref.'inc/header.php';

$totalGeneral = 0;

// Initialiser la session si ce n'est pas déjà fait
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Vérifier si le panier est vide
if (empty($_SESSION['panier'])) {
    echo "<p>Votre panier est vide.</p>";
} else {
    $jsonData = file_get_contents('../data.json');
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
                        echo "<td><img src='" . htmlspecialchars($product['image_link']) . "' alt='Image' style='width: 50px;'></td>";
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
        echo "<button onclick='location.href=\"paiement.php\"' class='btn-primary'>Valider la commande</button>";
        echo "</div>";
    }
}

include $Path_ref.'inc/footer.php';
?>
