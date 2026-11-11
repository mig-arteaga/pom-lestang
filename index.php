<?php
$pageTitle = "Pom' Lestang - Accueil";
$activePage = 'home';
$contactClass = 'index-contact';
$backToTopTarget = '#main-section';
require_once __DIR__ . '/includes/header.php';
?>
    <!-- Main section -->
    <section class="main-section" id="main-section">
        <div class="content">
            <div class="main-message">
                <h1 class="headline main-headline">Pom' Lestang céramiste</h1>
                <p><span class="first-letter">U</span>n jour, j'ai découvert la terre et le plaisir de malaxer, de barboter, de tourner, de tournasser et surtout de créer.
                    <br>Un autre jour, j'ai découvert les émaux et le plaisir de colorer, de barbouiller, de mélanger et de voir la vie en couleurs.
                    <br>Un autre jour encore, j'ai découvert la cuisson à 1000 degrés et toutes ses possibilités pour transcender et immortaliser ce qui me traverse l'esprit.
                    <br>Et surtout très vite  j'ai aimé partager, recevoir, transmettre autour de la terre.
                    <br>Aller à la rencontre de soi et des autres en exprimant par ses mains ce que nous avons à l'intérieur.
                    <br>C'est juste un beau cadeau dont je ne pourrais plus me passer...</p>
                <div class="btn-box">
                    <a href="index.php#about-pom" class="btn main-btn">Lire plus</a>
                </div>
                <div class="contact-info">
                    <p>Tél. : +33 6 99 61 65 85
                        <br>Email : pommelestang@hotmail.com
                    </p>
                </div>
            </div>
            <div class="main-image">
                <img src="images/main-1.jpg" alt="" class="slide-image">
                <img src="images/main-2.jpg" alt="" class="slide-image">
                <img src="images/main-3.jpg" alt="" class="slide-image">
                <img src="images/main-4.jpg" alt="" class="slide-image">
                <img src="images/main-1.jpg" alt="" class="slide-image">
            </div>
            <div class="color-container">
                <div class="color-separator">
                    <i class="color-bar"></i>
                    <i class="color-bar"></i>
                    <i class="color-bar"></i>
                    <i class="color-bar"></i>
                    <i class="color-bar"></i>
                </div>
            </div>
        </div>
    </section>
    <!-- Galleries -->
    <section class="galleries" id="galleries">
        <div class="container content section-content">
            <h1 class="sub-headline content-sub-headline">Découvrir</h1>
            <h3 class="headline content-headline">Mes œuvres</h3>
            <div class="gallery-grid">
                <?php if (!empty($navCategories)): ?>
                    <?php
                    $homeCategories = $pdo ? $pdo->query('SELECT slug, name, cover_image FROM categories ORDER BY display_order ASC')->fetchAll() : [];
                    foreach ($homeCategories as $cat):
                    ?>
                    <div class="grid-item-box">
                        <div class="grid-item">
                            <img src="<?= htmlspecialchars($cat['cover_image']) ?>" alt="<?= htmlspecialchars($cat['name']) ?>" class="grid-image">
                            <a href="gallery.php?category=<?= urlencode($cat['slug']) ?>" class="gallery-link"></a>
                            <div class="grid-content">
                            </div>
                        </div>
                        <h3 class="content-title"><?= htmlspecialchars($cat['name']) ?></h3>
                        <h5 class="content-sub-title"></h5>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                <div class="grid-item-box">
                    <div class="grid-item">
                        <img src="images/raku.jpg" alt="" class="grid-image">
                        <a href="gallery.php?category=raku" class="gallery-link"></a>
                        <div class="grid-content"></div>
                    </div>
                    <h3 class="content-title">Personnages Raku</h3>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Between 1 -->
    <section class="between between-1">
        <div class="content">
            <div class="headline-box">
                <h1 class="sub-headline content-sub-headline between-sub-headline">Laissez-vous</h1>
                <h3 class="headline content-headline between-headline">surprendre par la terre</h3>
            </div>
        </div>
    </section>
    <!-- Cours et stages -->
    <section class="cours-et-stages" id="cours">
        <div class="container content section-content">
            <h1 class="sub-headline content-sub-headline">Cours et</h1>
            <h3 class="headline content-headline">Stages</h3>
            <div class="courses-grid">
                <div class="grid-item-box">
                    <div class="grid-item">
                        <img src="images/cours-1.jpg" alt="" class="grid-image">
                    </div>
                    <div class="grid-item-2">
                        <h3 class="content-title">Cours</h3>
                        <h5 class="content-sub-title">à la carte</h5>
                        <div class="grid-text">
                            <p><strong>Séance de 3 heures : 40 €</strong></p>
                            <p>Tous les jours de 9h à 12h ou après-midi de 14h00 à 17h00.</p>
                            <p>(terre, émail, cuisson compris)</p>
                            <p class="detail"><strong>Tél. : +33 6 99 61 65 85</strong></p>
                        </div>
                    </div>
                </div>
                <div class="grid-item-box">
                    <div class="grid-item">
                        <img src="images/cours-2.jpg" alt="" class="grid-image">
                    </div>
                    <div class="grid-item-2">
                        <h3 class="content-title">Journée</h3>
                        <h5 class="content-sub-title">Raku</h5>
                        <div class="grid-text">
                            <p><strong>Prix : 50 € / personne</strong></p>
                            <p>A partir de deux personnes minimum.</p>
                            <p class="detail">A la demande, quand les pièces sont biscuitées.</p>
                        </div>
                    </div>
                </div>
                <div class="grid-item-box">
                    <div class="grid-item">
                        <img src="images/cours-3.jpg" alt="" class="grid-image">
                    </div>
                    <div class="grid-item-2">
                        <h3 class="content-title">Stage</h3>
                        <h5 class="content-sub-title">en deux temps</h5>
                        <div class="grid-text">
                            <p class="detail">Une journée pour créer.</p>
                            <p>Une journée pour émailler.</p>
                            <p>De 10h00 à 17h00 (pique-nique sur place).</p>
                            <p class="detail"><strong>Prix journée : 80 € / personne</strong></p>
                            <p>Stage possible à la demande à partir de 4 personnes <strong class="rouge">le week-end</strong></p>
                        </div>
                    </div>
                </div>
                <div class="grid-item-box">
                    <div class="grid-item">
                        <img src="images/cours-4.jpg" alt="" class="grid-image">
                    </div>
                    <div class="grid-item-2">
                        <h3 class="content-title">Tournage</h3>
                        <h5 class="content-sub-title"></h5>
                        <div class="grid-text">
                            <p class="detail">Séance de 2h la demande toute la semaine.</p>
                            <p class="detail"><strong>Prix : 40 € / personne</strong></p>
                            <p>(Terre et cuisson comprises)</p>
                            <p class="detail"><strong class="rouge">Nouveau :</strong> Atelier tournage en libre service de 10h à 16h.</p>
                            <p class="detail"><strong>Prix : 50 € / personne</strong></p>
                            <p class="detail">(Terre non fournie, cuisson possible)</p>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="sub-headline content-sub-headline">Toutes les</h1>
            <h3 class="headline content-headline">Possibilités</h3>
            <div class="services">
                <div class="services-grid">
                    <div class="grid-item-box services-item">
                        <div class="services-bg"></div>
                        <i class="fas fa-paint-brush"></i>
                        <div>
                            <h3 class="content-title">Matériel</h3>
                            <h5 class="content-sub-title">A disposition</h5>
                        </div>
                    </div>
                    <div class="grid-item-box services-item">
                        <div class="services-bg"></div>
                        <i class="fa fa-fire"></i>
                        <div>
                            <h3 class="content-title">Cuisson</h3>
                            <h5 class="content-sub-title">Raku</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Between 2 -->
    <section class="between between-2">
        <div class="content">
            <div class="headline-box">
                <h1 class="sub-headline content-sub-headline between-sub-headline">Libérez</h1>
                <h3 class="headline content-headline between-headline">vos émotions</h3>
            </div>
        </div>
    </section>
    <!-- About Pom' -->
    <section class="about-pom" id="about-pom">
        <div class="container content section-content">
            <div class="headline-box">
                <h1 class="sub-headline content-sub-headline">Pom'</h1>
                <h3 class="headline content-headline">Lestang</h3>
            </div>
            <div class="about-container">
                <div class="image-box">
                    <img src="images/pom-portrait.JPG" alt="Portrait de Pom' Lestang" class="image">
                </div>
                <div class="grid-text">
                    <p><span class="first-letter">S</span>on parcours de sculpteur/céramiste est l’aboutissement d’un parcours personnel 
                        jalonné de rencontres de céramistes passionnés à travers le monde et la découverte de multiples pratiques.
                        Lors de ses études supérieures en architectures des jardins dans les années 90, elle découvre pour la première fois 
                        les réalisations en volume, et la terre; une évidence  pour elle.</p>
                    <p>En 1994, elle s’installe  au Maroc et travaille pendant plus d’un an avec les potiers de Salé près de Rabat, où elle 
                        découvre le tournage et ses possibilités. Elle y fait ses premières expositions qui allient musiques et sculptures 
                        (elle est violoniste/altiste) et trouve ainsi le moyen de méler ses deux grandes passions.</p>
                    <p>En 2006, Pomme atterrie en Inde du sud, à Bangalore, et en profite pour suivre les cours des Beaux Arts. Elle découvre 
                        en parallèle les sculptures de rues pour les fêtes religieuses, toujours gigantesques, et très colorées, ce qui sera 
                        une source d'inspiration pour sa pratique future.</p>
                    <p>De retour en France, elle  quitte son métier d'architecte paysagiste pour  se consacrer entièrement à la sculpture et 
                        la poterie, et pour monter son atelier personnel, ce qu’elle fera en septembre 2010 en plein coeur de nantes. Elle 
                        enseigne dès lors, la céramique à des élèves de tous âges et ouvre ses cours aux malvoyants et mal entendants.</p>
                    <p>Et depuis 2019, elle fait profiter ses élèves d'un nouveau lieu sur Nantes, afin de sculpter au calme au coeur d'un 
                        jardin verdoyant et qui convient aux cuissons Raku.</p>
                </div>
            </div>
        </div>
    </section>
<?php
require_once __DIR__ . '/includes/contact-section.php';
require_once __DIR__ . '/includes/footer.php';
?>

