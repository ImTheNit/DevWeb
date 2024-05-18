<?php 
$pageTitle = "Accueil";
$Path_ref = "./"; // Assurez-vous que ce chemin est correct selon votre structure de projet
include $Path_ref.'inc/header.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <style>
        /* CSS pour le titre avec bordure de fond bleue et texte blanc */
        .title {
            position: absolute;
            top: 50%;
            left:50%;
            transform: translate(-50%,-50%);
            font-size: 70px;
            ;
             /*background-color: blue; Couleur de fond bleue */
            color:white; /* Couleur de police blanche */
            padding: 10px; /* Espacement intérieur */
            text-align: center; /* Centrer le texte */
            border-radius: 50px; /* Coins arrondis */
            margin: 20px 0; /* Marges en haut et en bas */
        }


        /* CSS pour la barre de navigation */
        .navbar {
            background: #ffffff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .nav-links {
            list-style: none;
            display: flex;
        }

        .nav-links li a {
            display: block;
            margin: 0 1rem;
            padding: 1rem 0;
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            border: 2px solid transparent; /* Par défaut, bordure transparente */
            padding: 10px 20px;
            border-radius: 5px; /* Coins arrondis pour la bordure */
        }

        .nav-links li a[href*="index.php"] {
            border-color: blue;
        }

        .nav-links li a[href*="a-propos.php"] {
            border-color: blue;
        }

        .nav-links li a[href*="categories.php"] {
            border-color: blue;
        }

        .nav-links li a[href*="contact.php"] {
            border-color: blue;
        }

        .nav-links li a[href*="faq.php"] {
            border-color: blue;
        }

        .nav-links li a:hover {
            background-color: blue;
            color: white;
        }

        .user-interactions {
            display: flex;
            align-items: center;
        }

        .searchbar input[type="text"] {
            border: 2px solid #eeeeee;
            padding: 0.5rem;
            margin-right: 0.5rem;
            border-radius: 2rem;
        }

        .searchbar button {
            background: #ff0000;
            border: none;
            padding: 0.5rem 1rem;
            color: white;
            border-radius: 2rem;
            cursor: pointer;
        }

        .user-icon img {
            height: 30px;
            margin-left: 1rem;
        }

        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 1rem 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        @media (max-width: 768px) {
            .nav-links, .user-interactions {
                display: none;
            }
        }

        .background-image {
            background-image: url('<?php echo $Path_ref; ?>images/acceuil_gateaux.jpg'); /* Assurez-vous que le chemin est correct */
            background-size: cover;
            background-position: center;
            height: 100vh; /* Hauteur de l'écran */
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            text-align: center;
        }
    </style>
</head>
<body>
    <main class="background-image">
        <h1 class="title">Le Palais des Gâteaux</h1>
        <p></p>
    </main>
    <footer>
        <p>Contactez-nous: info@palaisdesgateaux.com</p>
    </footer>
</body>
</html>
