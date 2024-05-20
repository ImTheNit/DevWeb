<?php 
$pageTitle = "Votre Profil"; 
$Path_ref="../";
include $Path_ref.'inc/header.php'; 

// Rediriger si l'utilisateur n'est pas connecté
if ($_SESSION["loggedin"] !== true){
    header("location:compte.php");
    exit; // Important: arrêter l'exécution du script après la redirection
}

// Récupérer les données de session
$email = $_SESSION["email"];
$numero = $_SESSION["Numero"];
$type_voie = $_SESSION["type_voie"];
$nom_voie = $_SESSION["nom_voie"];
$nom_ville = $_SESSION["nom_ville"];
$code_postal = $_SESSION["code_postal"];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="<?php echo $Path_ref; ?>css/style.css">
</head>
<body>

<style>
    .profile-table-container {
  width: 60%;
  margin: 50px auto;
  border-radius: 8px;
  overflow: hidden; 
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  background-color: #fff; 
}

.profile-table {
  width: 100%;
  border-collapse: collapse;
}

.profile-table th,
.profile-table td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 12px;
}

.profile-table th {
  background-color: #f2f2f2;
  color: #000; 
}

.profile-table tr:nth-child(even) {
  background-color: #f9f9f9;
  color: #000; 
}

.profile-table tr:nth-child(odd) {
  color: #000; 
}

.profile-table td {
  color: #000; 
}

</style>

<h2 style="text-align: center;"><?php echo $pageTitle; ?></h2>

<div class="profile-table-container">
  <table class="profile-table">
      <tr>
          <th>Information</th>
          <th>Détails</th>
      </tr>
      <tr>
          <td>Email</td>
          <td><?php echo htmlspecialchars($email); ?></td>
      </tr>
      <tr>
          <td>Adresse</td>
          <td><?php echo htmlspecialchars($numero . ' ' . $type_voie . ' ' . $nom_voie); ?></td>
      </tr>
      <tr>
          <td>Ville</td>
          <td><?php echo htmlspecialchars($nom_ville); ?></td>
      </tr>
      <tr>
          <td>Code Postal</td>
          <td><?php echo htmlspecialchars($code_postal); ?></td>
      </tr>
  </table>
</div>


<?php include $Path_ref.'inc/footer.php'; ?>

</body>
</html>
