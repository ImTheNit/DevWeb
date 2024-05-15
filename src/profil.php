<?php 
$pageTitle = " Votre Profil "; 
$Path_ref="../";
include $Path_ref.'inc/header.php'; 


// redirect not already connect
if ($_SESSION["loggedin"] !== true){
    header("location:compte.php");
}

print_r($_SESSION);
echo "<br> Email : ".$_SESSION["email"];
echo "<br>Adresse:";
echo "<br> N° : ".$_SESSION["Numero"];
echo "<br> Type de voie : ".$_SESSION["type_voie"];
echo "<br> Nom de la voie : ".$_SESSION["nom_voie"];
echo "<br> Ville : ".$_SESSION["nom_ville"];
echo "<br> Code Postale : ".$_SESSION["code_postal"];


echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";


include $Path_ref.'inc/footer.php'; 

?>