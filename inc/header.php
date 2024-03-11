<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title><?php echo $pageTitle; ?></title> 
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-brand">
                <a href="index.php"><img src="images/logo.jpg" alt="Logo"></a>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="a-propos.php">À Propos</a></li>
                <li class="nav-item">
            <a href="categories.php">Catégories</a>
            <ul class="dropdown">
                <li><a href="src/gateaux-photo.php">Gâteaux Photo</a></li>
                <li><a href="src/pieces-montees-fruites.php">Pièces Montées Fruitées</a></li>
                <li><a href="src/charlottes.php">Charlottes</a></li>
            </ul>
        </li>
                <li><a href="src/contact.php">Contact</a></li>
                <li><a href="src/faq.php">FAQ</a></li>
            </ul>
            <div class="user-interactions">
                <div class="searchbar">
                    <input type="text" placeholder="Rechercher...">
                    <button type="submit">🔍</button>
                </div>
                <a href="src/compte.php" class="user-icon"><img src="images/user-login-icon-14.png" alt="Compte"></a>
                <a href="src/panier.php" class="user-icon"><img src="images/panier.jpg" alt="Panier"></a>
            </div>
        </nav>
    </header>
