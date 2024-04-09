<?php 
$id = @mysqli_connect("localhost", "root", "","palaisdesgateaux") or die("Impossible de se connecter : " );



/* get response from form */
$email=$_POST["email"];
$password=$_POST["password"];

echo $email;
/* Vérification nouveau mail */

$req = "SELECT email,mdp  FROM client WHERE email = '". $email ."';";
$rep = mysqli_query ($id,$req) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error());
if (mysqli_num_rows($rep) == 0){
    mysqli_close($id) or die ("Impossible de se déconnecter : " );
    $message = "Aucun compte avec cet email n'existe";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<meta http-equiv='refresh' content='0;URL=compte.php'>";
}

/*ajout verification mdp hashé en base*/

/* hashing pwd */
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);



$sql = 'INSERT INTO client VALUES("","'.$lastname.'","'.$name.'","'.$email.'","'.$hashedPassword.'","'.$num.'","'.$typeVoie.'","'.$rue.'","'.$ville.'","'.$codepostal.'")';

mysqli_query ($id,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error());

mysqli_close($id) or die ("Impossible de se déconnecter : " );;


//header('Location: compte.php');
?>