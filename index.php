<?php 
$pageTitle = "Accueil";
$Path_ref = "./"; // Assurez-vous que ce chemin est correct selon votre structure de projet
include $Path_ref.'inc/header.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>

        <h1 class="title">Le Palais des Gâteaux</h1>
        


</head>

    <div class="background-image" style="background-image: url('<?php echo $Path_ref; ?>images/acceuil_gateaux.jpg');">
        <!-- Votre contenu ici -->
    </div>

<?php  
include $Path_ref.'inc/footer.php'; 
?>    

</html>
