<?php 
$pageTitle = " Créer votre compte  "; 
$Path_ref="../";
include $Path_ref.'inc/header.php'; 
?>


<div class="login-container">
    <h2>Connexion</h2>
    <form action="connexion_handler.php" method="post">
        <div class="form-group">
            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn-login">Se connecter</button>
        <p class="signup-link">Vous n'avez pas de compte ? <a href="creer_compte.php">Créez-en un</a></p>
    </form>
</div>


<?php  
include $Path_ref.'inc/footer.php'; 
?>