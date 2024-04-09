<?php 
$pageTitle = " Créer votre compte  "; 
$Path_ref="../";
include $Path_ref.'inc/header.php'; 

?>

<div class="login-container">
    <h2>Nouveau compte</h2>
    <form action="creation_handler.php" method="post">
        <div class="form-group">
            <label for="lastname">Nom</label>
            <input type="text" id="lastname" name="lastname" required>
        </div>
        <div class="form-group">
            <label for="name">Prenom</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>
        <h3>Adresse</h3><br>
        <div class="form-group">
            <label for="num">N°</label>
            <input type="text" id="num" name="num" >
        </div>
        <div class="form-group">
            <label for="typeVoie">Type de voie</label>
            <input type="text" id="typeVoie" name="typeVoie" >
        </div>
        <div class="form-group">
            <label for="rue">Rue</label>
            <input type="text" id="rue" name="rue" >
        </div>
        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" id="ville" name="ville" >
        </div>
        <div class="form-group">
            <label for="codepostal">Code Postal</label>
            <input type="text" id="codepostal" name="codepostal" >
        </div>
        <button type="submit" class="btn-login">Créer mon compte</button>
        <p class="signup-link">Vous avez déjà un compte ? <a href="compte.php">Connectez-vous</a></p>
    </form>
</div>

<?php  
include $Path_ref.'inc/footer.php'; 
?>