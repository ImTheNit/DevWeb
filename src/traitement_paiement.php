<?php
$pageTitle = 'Traitement';
$Path_ref="../";
include $Path_ref.'inc/header.php';
require_once '../config.php'; // Fichier de configuration pour la connexion à la base de données

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: compte.php");
    exit;
}

// On récupère les données du paiement fictif
$payment_method = $_POST['payment_method'] ?? ''; // 'paypal' ou 'cb'

$total = 0;
foreach ($_SESSION['panier'] as $item) {
    $total += $item['prix'] * $item['quantite'];
}
$_SESSION['total'] = $total;

// On enregistre la commande dans la base de données
if ($payment_method) {
    $user_id = $_SESSION["id"];
    $type_voie = $_SESSION['type_voie'];
    $nom_voie = $_SESSION['nom_voie'];
    $nom_ville = $_SESSION['nom_ville'];
    $code_postal = $_SESSION['code_postal'];

    $insert_query = "INSERT INTO commande (idclient, prix, TypeVoie, NomVoie, NomVille, CodePostal, jour) VALUES (?, ?, ?, ?, ?, ?, NOW())";

    if ($stmt = mysqli_prepare($link, $insert_query)) {
        // On associe les paramètres
        mysqli_stmt_bind_param($stmt, "idssss", $user_id, $total, $type_voie, $nom_voie, $nom_ville, $code_postal); 
        if (mysqli_stmt_execute($stmt)) {
            // Paiement accepté, redirection vers la page mes_commandes.php avec un message de succès
            $_SESSION['payment_success'] = 'Paiement effectué avec succès.';
            unset($_SESSION['panier']);
            header("location: mes_commandes.php");
            exit;
        } else {
            echo "Une erreur s'est produite lors de l'enregistrement de la commande.";
        }
        mysqli_stmt_close($stmt);
    }
}

mysqli_close($link);
?>
