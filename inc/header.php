<?php 
session_start();

$session_options = [
    'lifetime' => 0,
    'path' => '/',
    'domain' => '', 
    'secure' => true, 
    'httponly' => true,
    'samesite' => 'Lax' 
];

if (!isset($_SESSION['initiated'])) {
    session_regenerate_id();
    $_SESSION['initiated'] = true;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $Path_ref; ?>css/style.css">
    <title><?php echo $pageTitle; ?></title> 
    <link rel="shortcut icon" href="/DevWeb/images/logo.ico" type="image/x-icon">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-brand">
                <a href="<?php echo $Path_ref; ?>index.php"><img src="<?php echo $Path_ref; ?>images/logo.png" alt="Logo"></a>
            </div>
            <ul class="nav-links"><style>
                nav-links {
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
            </style>
                <li><a href="<?php echo $Path_ref; ?>index.php">Accueil</a></li>
                <li><a href="<?php echo $Path_ref; ?>src/a-propos.php">À Propos</a></li>
                <li class="nav-item">
                    <a href="<?php echo $Path_ref; ?>src/categories.php">Catégories</a>
                    <ul class="dropdown">
                        <li><a href="<?php echo $Path_ref; ?>src/categories.php?cat=Les-gateaux-photo">Gâteaux Photo</a></li>
                        <li><a href="<?php echo $Path_ref; ?>src/categories.php?cat=Les-pieces-montees-fruitees">Pièces Montées Fruitées</a></li>
                        <li><a href="<?php echo $Path_ref; ?>src/categories.php?cat=Les-charlottes">Charlottes</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo $Path_ref; ?>src/contact.php">Contact</a></li>
                <li><a href="<?php echo $Path_ref; ?>src/faq.php">FAQ</a></li>
            </ul>
            <div class="user-interactions">
                <div class="searchbar">
                    <form action="<?php echo $Path_ref; ?>src/recherche.php" method="get">
                        <input type="text" name="query" placeholder="Rechercher...">
                        <button type="submit">🔍</button>
                    </form>
                </div>
                <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                    echo "<a href='".$Path_ref."src/deconnection.php' class='user-icon'><img src='".$Path_ref."images/deconnexion.png' alt='Déconnexion'></a>"; 
                } ?>
                <a href="<?php echo $Path_ref; ?>src/compte.php" class="user-icon"><img src="<?php echo $Path_ref; ?>images/user-login-icon-14.png" alt="Compte"></a>
                <a href="<?php echo $Path_ref; ?>src/panier.php" class="user-icon"><img src="<?php echo $Path_ref; ?>images/panier.jpg" alt="Panier"></a>
            </div>
        </nav>
    </header>
</body>
</html>
