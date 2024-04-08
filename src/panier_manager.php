<?php
session_start();

function calculateCartTotal($panier) {
    $total = 0;
    // On récupère le prix des produits en fonction de l'ID et de la taille
    foreach ($panier as $id_taille => $details) {
        $prix = $details['prix']; // Nous utilisons le prix stocké dans les détails du produit
        $total += $details['quantite'] * $prix;
    }
    return $total;
}

// On vérifie si la requête est une requête POST et si le bon champ a été envoyé
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter_au_panier'])) {
    $produit_id = $_POST['produit_id'];
    $taille = $_POST['size'];
    $quantite = intval($_POST['quantity']); // Convertir en entier pour s'assurer que la quantité est un nombre
    $prix = floatval($_POST['price']); // Convertir en flottant pour s'assurer que le prix est un nombre

    $produit_id_taille = $produit_id . '_' . $taille;

    // On ajoute ou met à jour le produit dans le panier
    if (isset($_SESSION['panier'][$produit_id_taille])) {
        $_SESSION['panier'][$produit_id_taille]['quantite'] += $quantite;
    } else {
        $_SESSION['panier'][$produit_id_taille] = array('taille' => $taille, 'quantite' => $quantite, 'prix' => $prix);
    }

    // On calcule le total du panier
    $_SESSION['total'] = calculateCartTotal($_SESSION['panier']);

    echo 'Le produit a été ajouté au panier. Total : ' . $_SESSION['total'];
}
?>
