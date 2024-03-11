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
                <a href="<?php echo $Path_ref; ?>index.php"><img src="<?php echo $Path_ref; ?>images/logo.jpg" alt="Logo"></a>
            </div>
            <ul class="nav-links">
                <li><a href="<?php echo $Path_ref; ?>index.php">Accueil</a></li>
                <li><a href="<?php echo $Path_ref; ?>src/a-propos.php">À Propos</a></li>
                <li class="nav-item">
            <a href="<?php echo $Path_ref; ?>src/categories.php">Catégories</a>
            <ul class="dropdown">
                <li><a href="<?php echo $Path_ref; ?>src/gateaux-photo.php">Gâteaux Photo</a></li>
                <li><a href="<?php echo $Path_ref; ?>src/pieces-montees-fruites.php">Pièces Montées Fruitées</a></li>
                <li><a href="<?php echo $Path_ref; ?>src/charlottes.php">Charlottes</a></li>
            </ul>
        </li>
                <li><a href="<?php echo $Path_ref; ?>src/contact.php">Contact</a></li>
                <li><a href="<?php echo $Path_ref; ?>src/faq.php">FAQ</a></li>
            </ul>
            <div class="user-interactions">
                <div class="searchbar">
                    <input type="text" placeholder="Rechercher...">
                    <button type="submit">🔍</button>
                </div>
                <a href="<?php echo $Path_ref; ?>src/compte.php" class="user-icon"><img src="<?php echo $Path_ref; ?>images/user-login-icon-14.png" alt="Compte"></a>
                <a href="<?php echo $Path_ref; ?>src/panier.php" class="user-icon"><img src="<?php echo $Path_ref; ?>images/panier.jpg" alt="Panier"></a>
            </div>
        </nav>
    </header>
