<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/db.php';

$navCategories = [];
$pdo = getDbConnection();
if ($pdo) {
    $navCategories = $pdo->query('SELECT slug, name FROM categories ORDER BY display_order ASC')->fetchAll();
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= htmlspecialchars($pageTitle ?? "Pom' Lestang") ?></title>
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <!--Font awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <!--Scroll reveal CDN-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="nav">
                <div class="logo-box">
                    <a href="index.php" class="logo-link">
                        <img src="images/logo-pom.png" alt="Logo Pom' Lestang" class="logo-img">
                        <span>Lestang</span>
                    </a>
                </div>
                <ul class="menu">
                    <li class="menu-item">
                        <a href="index.php" class="menu-link <?= ($activePage ?? '') === 'home' ? 'menu-active' : '' ?>">Accueil</a>
                    </li>
                    <li class="menu-item gallery-item">
                        <span class="menu-link gallery-btn <?= ($activePage ?? '') === 'gallery' ? 'menu-active' : '' ?>">Galeries <i class="fas fa-chevron-down"></i></span>
                        <div class="sub-menu">
                            <?php if (!empty($navCategories)): ?>
                                <?php foreach ($navCategories as $cat): ?>
                                    <a href="gallery.php?category=<?= urlencode($cat['slug']) ?>" class="sub-menu-link"><?= htmlspecialchars($cat['name']) ?></a>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <a href="gallery.php?category=raku" class="sub-menu-link">Personnages Raku</a>
                                <a href="gallery.php?category=poterie" class="sub-menu-link">Poterie</a>
                                <a href="gallery.php?category=animaux" class="sub-menu-link">Animaux</a>
                                <a href="gallery.php?category=terre-cuite" class="sub-menu-link">Terre cuite</a>
                                <a href="gallery.php?category=couples" class="sub-menu-link">Couples</a>
                                <a href="gallery.php?category=bronze" class="sub-menu-link">Bronze</a>
                            <?php endif; ?>
                        </div>
                    </li>
                    <li class="menu-item">
                        <a href="index.php#cours" class="menu-link">Cours</a>
                    </li>
                    <li class="menu-item">
                        <a href="index.php#about-pom" class="menu-link">Qui suis-je ?</a>
                    </li>
                    <li class="menu-item">
                        <a href="#contact" class="menu-link">Contact</a>
                    </li>
                </ul>
                <div class="toggle-menu">
                    <div class="icon-box">
                        <i class="top-line"></i>
                        <i class="middle-line"></i>
                        <i class="bottom-line"></i>
                    </div>
                </div>
            </nav>
        </div>
    </header>
