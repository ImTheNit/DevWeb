<?php 
$pageTitle = "Créez votre compte"; 
include 'inc/header.php'; 
?>

<div class="create-account-container">
    <h2>Créez votre compte</h2>
    <form action="create_account_handler.php" method="post" class="account-form">
        <div class="form-group">
            <label for="first-name">Prénom</label>
            <input type="text" id="first-name" name="first-name" required>
        </div>
        <div class="form-group">
            <label for="last-name">Nom</label>
            <input type="text" id="last-name" name="last-name" required>
        </div>
        <div class="form-group">
            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn-create-account">Créer mon compte</button>
    </form>
</div>

<?php 
include 'inc/footer.php'; 
?>