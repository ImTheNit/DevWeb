<!-- ajouter_au_panier.php -->
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produit_id = $_POST['produit_id'];
    $taille = $_POST['taille'];
    $quantite = intval($_POST['quantite']);

    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    $produit_id_taille = $produit_id . '_' . $taille;

    if (isset($_SESSION['panier'][$produit_id_taille])) {
        $_SESSION['panier'][$produit_id_taille]['quantite'] += $quantite;
    } else {
        $_SESSION['panier'][$produit_id_taille] = [
            'quantite' => $quantite
        ];
    }

    header('Location: ../src/panier.php');
    exit;
}
?>
