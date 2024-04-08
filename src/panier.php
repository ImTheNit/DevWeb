<?php
$pageTitle = "Votre panier";
$Path_ref="../";
include $Path_ref.'inc/header.php';

$totalGeneral = 0;

if (empty($_SESSION['panier'])) {
    echo "<p>Votre panier est vide.</p>";
} else {
    // Charger les données des produits à partir du fichier JSON
    $jsonData = file_get_contents('../data.json');
    $data = json_decode($jsonData, true);

    echo "<table class='panier-table'>";
    echo "<tr><th>Photo</th><th>Nom du bouquet</th><th>Taille</th><th>Prix unitaire</th><th>Quantité</th><th>Total</th><th>Action</th></tr>";

    // Boucler sur chaque élément du panier
    foreach ($_SESSION['panier'] as $produit_id_taille => $infos) {
        if ($infos['quantite'] > 0) {
            // Séparer l'ID du produit et la taille
            list($produit_id, $taille) = explode('_', $produit_id_taille);

            // Chercher les détails du produit dans les données chargées
            foreach ($data as $categories) {
                foreach ($categories as $product) {
                    if ($product['id'] === $produit_id) {
                        // S'assurer que la taille a un prix valide
                        if (!isset($product['prices'][$taille])) {
                            continue; // Si le prix pour la taille n'est pas défini, passer au prochain produit
                        }
                        $prixUnitaire = $product['prices'][$taille];
                        $totalArticle = $prixUnitaire * $infos['quantite'];
                        $totalGeneral += $totalArticle;

                        // Afficher les informations du produit
                        echo "<tr>";
                        echo "<td><img src='" . htmlspecialchars($product['image_link'] ?? '') . "' alt='Image' style='width: 50px;'></td>";
                        echo "<td>" . htmlspecialchars($product['name'] ?? '') . "</td>";
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

    // Stocker le total général dans la session
    $_SESSION['total'] = $totalGeneral;

    // Afficher le total général
    echo "<tr><td colspan='5' style='text-align:right;'>Total général :</td><td>" . htmlspecialchars($totalGeneral) . "€</td><td></td></tr>";
    echo "</table>";

    // Afficher le bouton de validation de la commande si le panier n'est pas vide
    if ($totalGeneral > 0) {
        echo "<div style='text-align:right;margin-top:20px;'>";
        echo "<button onclick='location.href=\"paiement.php\"' class='btn-primary'>Valider la commande</button>";
        echo "</div>";
    }
}

include $Path_ref.'inc/footer.php';
?>
