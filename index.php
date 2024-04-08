<?php 
$Path_ref="";
$pageTitle = "Le Palais des gâteaux";
include $Path_ref."inc/header.php"; 
?>
<link rel="stylesheet" href="<?php echo $Path_ref; ?>css/style.css">

<h1 class="homepage-title">Le Palais des Gâteaux</h1>

<div class="intro-text">
    <p>Bienvenue dans l'univers enchanté du Palais des Gâteaux, où chaque création sucrée raconte une histoire de passion, de goût et de raffinement.</p>
    <p>Découvrez notre catalogue complet, une véritable caverne d'Ali Baba pour les amoureux de la pâtisserie, où l'art de la gourmandise se décline en une multitude de saveurs et de formes.</p>
    <p>Laissez-vous guider par vos sens et trouvez le gâteau parfait pour célébrer vos moments les plus précieux.</p>
</div>

<?php
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>

<div class="new-section">
    <div class="section-header">
		<img src="images/expertise.png" alt="Description de l'image">
        <h4>25 ANS DE SAVOIR-FAIRE</h4>
        <p>Artisans patissier depuis 1999</p>
    </div>
    <div class="section-header">
		<img src="images/order.jpg" alt="Description de l'image">
        <h4>COMMANDE SIMPLE ET RAPIDE</h4>
        <p>Finalisez votre commande en quelques clics</p>
    </div>
    <div class="section-header">
		<img src="images/delivery.jpg" alt="Description de l'image">
        <h4>LIVRAISON À DATE FIXE</h4>
        <p>En 5h en Ile-de-France et 24h dans toute la France</p>
    </div>
    <div class="section-header">
		<img src="images/conformity.png" alt="Description de l'image">
        <h4>GATEAU 100% CONFORME</h4>
        <p>Photo prise au moment de l'expédition et envoyée par mail</p>
    </div>
</div>



<div id="message-panier" class="message-panier"></div> 


<?php

include $Path_ref."inc/footer.php";
?>

