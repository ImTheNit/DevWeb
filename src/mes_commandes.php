<?php

$pageTitle = "Mes commandes passées";
$Path_ref = "../";
include $Path_ref.'inc/header.php';
require_once '../config.php';

// On vérifie si l'utilisateur est connecté, sinon redirection vers la page de connexion
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: compte.php");
    exit;
}


$commandes = [];

// Adaptez cette requête SQL à votre table commande
$sql = "SELECT NumeroCommande, jour, prix, TypeVoie, NomVoie, NomVille, CodePostal FROM commande WHERE idclient = ? ORDER BY jour DESC LIMIT 5";
if ($stmt = mysqli_prepare($link, $sql)) {
    
    mysqli_stmt_bind_param($stmt, "i", $_SESSION["id"]);
    
    if (mysqli_stmt_execute($stmt)) {
        
        mysqli_stmt_store_result($stmt);
        
        mysqli_stmt_bind_result($stmt, $numero_commande, $date_commande, $prix_commande, $type_voie, $nom_voie, $nom_ville, $code_postal);
        
        while (mysqli_stmt_fetch($stmt)) {
            $commandes[] = [
                'numero' => $numero_commande,
                'date' => $date_commande,
                'prix' => $prix_commande,
                'adresse' => $type_voie.' '.$nom_voie.', '.$nom_ville.', '.$code_postal
            ];
        }
    } else {
        echo "Une erreur s'est produite. Veuillez réessayer plus tard.";
    }
    
    mysqli_stmt_close($stmt);
}

mysqli_close($link);

?>

<div class="commandes-container">
    <h2>Mes Commandes</h2>
    <?php if (count($commandes) > 0): ?>
        <table class="commandes-table">
            <thead>
                <tr>
                    <th>Numéro de Commande</th>
                    <th>Date</th>
                    <th>Montant</th>
                    <th>Adresse de Livraison</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commandes as $commande): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($commande["numero"]); ?></td>
                        <td><?php echo htmlspecialchars($commande["date"]); ?></td>
                        <td><?php echo htmlspecialchars($commande["prix"]); ?> €</td>
                        <td><?php echo htmlspecialchars($commande["adresse"]); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Vous n'avez fait aucune commande.</p>
    <?php endif; ?>
</div>

<?php

include $Path_ref.'inc/footer.php';
?>
