<?php 
$id = @mysqli_connect("localhost", "root", "","palaisdesgateaux") or die("Impossible de se connecter : " );



/* get response from form */
$lastname=$_POST["lastname"];
$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];
$num=$_POST["num"];
$typeVoie=$_POST["typeVoie"];
$rue=$_POST["rue"];
$ville=$_POST["ville"];
$codepostal=$_POST["codepostal"];

echo $email;
/* Vérification nouveau mail */

$req = "SELECT *  FROM client WHERE email = '". $email ."';";
$rep = mysqli_query ($id,$req) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error());
if (mysqli_num_rows($rep) != 0){
    mysqli_close($id) or die ("Impossible de se déconnecter : " );
    $message = "Un compte avec cet email existe déjà connectez vous";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<meta http-equiv='refresh' content='0;URL=compte.php'>";
}



/* hashing pwd */
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);



$sql = 'INSERT INTO client VALUES("","'.$lastname.'","'.$name.'","'.$email.'","'.$hashedPassword.'","'.$num.'","'.$typeVoie.'","'.$rue.'","'.$ville.'","'.$codepostal.'")';

mysqli_query ($id,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error());

$message = "Création de compte complétée";
echo "<script type='text/javascript'>alert('$message');</script>";
echo "<meta http-equiv='refresh' content='0;URL=compte.php'>";


mysqli_close($id) or die ("Impossible de se déconnecter : " );;


//header('Location: compte.php');
?>