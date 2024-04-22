<?php 
$id = @mysqli_connect("localhost", "root", "","palaisdesgateaux") or die("Impossible de se connecter : " );



/* get response from form */
$email=$_POST["email"];
$password=$_POST["password"];

$message="";
$nextpage="compte.php";


$req = "SELECT email,mdp  FROM client WHERE email = '". $email ."';";
$rep = mysqli_query ($id,$req) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error());
if (mysqli_num_rows($rep) == 0){
    $message = "Aucun compte avec cet email n\'existe";
    $nextpage="compte.php";
}elseif(mysqli_num_rows($rep) == 1){
    $tab=mysqli_fetch_assoc($rep);// recuperation du resultat de la requette sous la forme de tableau associatif
    if (password_verify($password,$tab['mdp'])){  //verification mot de passe  
        $message = "Connexion réussie";
        $nextpage="../index.php";
    }else{
        $message = "Mot de passe inccorect";
        $nextpage="compte.php";
    }
}
mysqli_close($id) or die ("Impossible de se déconnecter : " );
echo "<script type='text/javascript'>alert('$message');</script>";
echo "<meta http-equiv='refresh' content='0;URL=$nextpage'>";



?>