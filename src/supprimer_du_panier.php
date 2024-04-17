<?php
session_start();

// On vérifie si un ID de produit est envoyé pour la suppression
if (isset($_POST['produit_id_taille'])) {
    $produit_id_taille = $_POST['produit_id_taille'];

    // On supprime l'article du panier s'il existe
    if (isset($_SESSION['panier'][$produit_id_taille])) {
        unset($_SESSION['panier'][$produit_id_taille]);
    }

    // On redirige vers la page du panier
    header("Location: panier.php");
    exit();
} else {
    // On redirige vers la page du panier s'il n'y a pas d'ID de produit fourni
    header("Location: panier.php");
    exit();
}
?>
