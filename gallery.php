<?php
require_once __DIR__ . '/includes/db.php';

$slug = $_GET['category'] ?? ($categorySlug ?? 'raku');
$pdo = getDbConnection();

$category = null;
$artworks = [];

if ($pdo) {
    $stmt = $pdo->prepare('SELECT * FROM categories WHERE slug = :slug LIMIT 1');
    $stmt->execute(['slug' => $slug]);
    $category = $stmt->fetch();

    if ($category) {
        $artStmt = $pdo->prepare('SELECT * FROM artworks WHERE category_id = :category_id ORDER BY display_order ASC, id ASC');
        $artStmt->execute(['category_id' => $category['id']]);
        $artworks = $artStmt->fetchAll();
    }
}

if (!$category) {
    header('Location: index.php');
    exit;
}

$pageTitle = "Pom' Lestang - Galerie " . $category['name'];
$activePage = 'gallery';
$contactClass = $category['contact_class'];
$backToTopTarget = '#gallery-main';
$pageScript = 'gallery.js';

require_once __DIR__ . '/includes/header.php';
?>
    <!-- Main section -->
    <section class="gallery-main <?= htmlspecialchars($category['hero_class']) ?>" id="gallery-main">
        <h3 class="gallery-headline-2">Galerie</h3>
        <h1 class="gallery-headline-1"><?= htmlspecialchars($category['name']) ?></h1>
    </section>
    <!-- Photo section -->
    <section class="image-section">
        <div class="container section-content">
            <div class="image-grid">
                <?php foreach ($artworks as $artwork): ?>
                <div class="image-item" data-src="<?= htmlspecialchars($artwork['image_path']) ?>" style="background-image: url('<?= htmlspecialchars($artwork['image_path']) ?>');">
                    <div class="image-title">
                        <span>Cliquez ici pour voir image</span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php
require_once __DIR__ . '/includes/contact-section.php';
require_once __DIR__ . '/includes/footer.php';
?>

