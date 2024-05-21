<?php 
session_start(); // Démarrer la session au début du script

$id = @mysqli_connect("mysql-lepalaisdesgateaux.alwaysdata.net", "359669", "","lepalaisdesgateaux_1") or die("Impossible de se connecter : " );


$email = $_POST["email"];
$password = $_POST["password"];

$message = "";
$nextpage = "compte.php";

// Modifiez la requête pour inclure l'ID du client
$req = "SELECT idClient, email, mdp, Numero, TypeVoie, NomVoie, NomVille, CodePostal FROM client WHERE email = '". $email ."';";
$rep = mysqli_query ($id, $req) or die ('Erreur SQL !'.$req.'<br />'.mysqli_error($id));

if (mysqli_num_rows($rep) == 0) {
    $message = "Aucun compte avec cet email n'existe";
    $nextpage = "compte.php";
} elseif (mysqli_num_rows($rep) == 1) {
    $tab = mysqli_fetch_assoc($rep); // récupération du résultat de la requête sous la forme de tableau associatif
    if (password_verify($password, $tab['mdp'])) {  // vérification du mot de passe
        // Stocker les données dans les variables de session
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $tab['idClient'];  // Stocker l'ID du client
        $_SESSION["email"] = $tab['email'];  // Stocker l'email
        $_SESSION["Numero"] = $tab['Numero'];
        $_SESSION['type_voie'] = $tab['TypeVoie'];
        $_SESSION['nom_voie'] = $tab['NomVoie'];
        $_SESSION['nom_ville'] = $tab['NomVille'];
        $_SESSION['code_postal'] = $tab['CodePostal'];

        $message = "Connexion réussie";
        $nextpage = "../index.php";
    } else {
        $message = "Mot de passe incorrect";
        $nextpage = "compte.php";
    }
}
mysqli_close($id) or die ("Impossible de se déconnecter : " );
echo "<script type='text/javascript'>alert('$message');</script>";
echo "<meta http-equiv='refresh' content='0;URL=$nextpage'>";
?>
