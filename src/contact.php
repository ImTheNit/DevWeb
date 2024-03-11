<?php 
$pageTitle = " Contact "; 
include '../inc/header.php'; 
?>

<div class="contact-form-container">
  <form id="contact-form" action="traitement-du-formulaire.php" method="post">
    <h2>Contactez-nous</h2>
    <div class="form-field">
      <label for="name">Votre nom</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div class="form-field">
      <label for="email">Votre e-mail</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="form-field">
      <label for="subject">Objet</label>
      <select id="subject" name="subject">
        <option value="commande">Commande de gâteau</option>
        <option value="service-client">Service client</option>
        <option value="autre">Autre</option>
      </select>
    </div>
    <div class="form-field">
      <label for="message">Votre message (optionnel)</label>
      <textarea id="message" name="message"></textarea>
    </div>
    <div class="form-field">
      <button type="submit">Envoyer</button>
    </div>
  </form>
</div>

<?php  
include '../inc/footer.php'; 
?>
