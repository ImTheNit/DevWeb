<?php
$pageTitle = "Paiement";
$Path_ref="../";
include $Path_ref.'inc/header.php';


if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: compte.php");
    exit;
}

$paymentMethod = isset($_GET['moyen']) ? $_GET['moyen'] : null;
?>

<div class="payment-container">
    <h1>Choisissez votre mode de paiement</h1>
    <div class="payment-options">
        <div class="payment-option">
            <a href="paiement.php?moyen=paypal" class="payment-link">
                <img src="../images/paypal.png" alt="Payer avec PayPal" class="payment-img">
            </a>
        </div>
        <div class="payment-option">
            <a href="paiement.php?moyen=cb" class="payment-link">
                <img src="../images/visa.png" alt="Payer avec carte bancaire" class="payment-img">
            </a>
        </div>
    </div>

    <?php if ($paymentMethod === 'paypal'): ?>
        <div class="payment-form-container">
            
            <form action="traitement_paiement.php" method="post" class="payment-form">
                <input type="hidden" name="payment_method" value="paypal">
                <div class="form-group">
                    <label for="paypal-email">Email PayPal</label>
                    <input type="email" id="paypal-email" name="paypal_email" required class="form-control">
                </div>
                <button type="submit" class="payment-btn">Payer avec PayPal</button>
            </form>
        </div>
        <?php elseif ($paymentMethod === 'cb'): ?>
    <div class="payment-form-container">
        <form action="traitement_paiement.php" method="post" class="payment-form">
            <input type="hidden" name="payment_method" value="cb">
            <div class="form-group">
                <label for="card-number">Numéro de carte</label>
                <input type="text" id="card-number" name="card_number" required class="form-control">
            </div>    
            <div class="form-group">
                <label for="card-expiration">Date d'expiration</label>
                <input type="text" id="card-expiration" name="card_expiration" required class="form-control">
            </div>
            <div class="form-group">
                <label for="card-cvc">CVC</label>
                <input type="text" id="card-cvc" name="card_cvc" required class="form-control">
            </div>
            <button type="submit" class="payment-btn">Payer avec carte</button>
        </form>
    </div>
    <?php else: ?>
        <p>Veuillez choisir une méthode de paiement.</p>
    <?php endif; ?>
</div>