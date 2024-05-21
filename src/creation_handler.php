<?php 
$id = @mysqli_connect("mysql-lepalaisdesgateaux.alwaysdata.net", "359669", "","lepalaisdesgateaux_1") or die("Impossible de se connecter : " );

require_once '../vendor/autoload.php'; 


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
$rep = mysqli_query ($id,$req) or die ('Erreur SQL !'.$req.'<br />'.mysqli_error());
if (mysqli_num_rows($rep) != 0){
    mysqli_close($id) or die ("Impossible de se déconnecter : " );
    $message = "Un compte avec cet email existe déjà connectez vous";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<meta http-equiv='refresh' content='0;URL=compte.php'>";
}



/* hashing pwd */
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);



$sql = 'INSERT INTO client VALUES("","'.$lastname.'","'.$name.'","'.$email.'","'.$hashedPassword.'","'.$num.'","'.$typeVoie.'","'.$rue.'","'.$ville.'","'.$codepostal.'")';

// Préparation et envoi du mail de confirmation
                $mail = new PHPMailer\PHPMailer\PHPMailer(true);

                try {
                    // Réglages serveur 
                    $mail->isSMTP();
                    $mail->Host       = 'smtp-lepalaisdesgateaux.alwaysdata.net'; 
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'lepalaisdesgateaux@alwaysdata.net'; 
                    $mail->Password   = ''; 
                    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    //Recipients
                    $mail->setFrom('contact@palaisdesgateaux.com', 'Le Palais des Gateaux');
                    $mail->addAddress($email, $prenom); 

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Confirmation de votre inscription au Palais des Gateaux';
                    $template = file_get_contents('../email_template.html'); 
                    $template = str_replace('{{prenom}}', $prenom, $template);
                    $lien_activation = "https:///activation.php?code=votre-code-d-activation"; //lien factice
                    $template = str_replace('{{lien_activation}}', $lien_activation, $template);
        
                    // Ajoutez le logo en tant qu'image embarquée
                    $mail->AddEmbeddedImage('../images/logo.png', 'logoImage', 'logo.png'); 
                    $mail->Body = $template;

                    $mail->send();
                    // Redirection vers la page de connexion après envoi de l'e-mail
                    header("location: compte.php");
                    exit();
                } catch (Exception $e) {
                    echo "Le message n'a pas pu être envoyé. Erreur de PHPMailer : {$mail->ErrorInfo}";
                }


mysqli_query ($id,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error());

$message = "Création de compte complétée";
$nextpage = 'compte.php';
echo "<script type='text/javascript'>alert('$message');</script>";
echo "<meta http-equiv='refresh' content='0;URL=$nextpage'>";


mysqli_close($id) or die ("Impossible de se déconnecter : " );;



?>