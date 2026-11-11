-- Database initialization for Pom' Lestang
SET NAMES utf8mb4;

CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slug VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    cover_image VARCHAR(255) NOT NULL,
    hero_class VARCHAR(50) NOT NULL,
    contact_class VARCHAR(50) NOT NULL,
    display_order INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS artworks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    title VARCHAR(150) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    display_order INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_artwork_category FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    is_read TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seed categories
INSERT INTO categories (id, slug, name, cover_image, hero_class, contact_class, display_order) VALUES
(1, 'raku', 'Personnages Raku', 'images/raku.jpg', 'raku-main', 'raku-contact', 1),
(2, 'poterie', 'Poterie', 'images/poterie.jpg', 'poterie-main', 'poterie-contact', 2),
(3, 'animaux', 'Animaux', 'images/animaux.jpg', 'animaux-main', 'animaux-contact', 3),
(4, 'terre-cuite', 'Terre cuite', 'images/terre-cuite.jpg', 'terre-cuite-main', 'terre-cuite-contact', 4),
(5, 'couples', 'Couples', 'images/couples.jpg', 'couples-main', 'couples-contact', 5),
(6, 'bronze', 'Bronze', 'images/bronze.jpg', 'bronze-main', 'bronze-contact', 6);

-- Seed artworks: Personnages Raku (1..36, note: 34 has .JPG extension)
INSERT INTO artworks (category_id, title, image_path, display_order) VALUES
(1, 'Personnage Raku 1', 'images/gallery/Raku/raku-1.jpg', 1),
(1, 'Personnage Raku 2', 'images/gallery/Raku/raku-2.jpg', 2),
(1, 'Personnage Raku 3', 'images/gallery/Raku/raku-3.jpg', 3),
(1, 'Personnage Raku 4', 'images/gallery/Raku/raku-4.jpg', 4),
(1, 'Personnage Raku 5', 'images/gallery/Raku/raku-5.jpg', 5),
(1, 'Personnage Raku 6', 'images/gallery/Raku/raku-6.jpg', 6),
(1, 'Personnage Raku 7', 'images/gallery/Raku/raku-7.jpg', 7),
(1, 'Personnage Raku 8', 'images/gallery/Raku/raku-8.jpg', 8),
(1, 'Personnage Raku 9', 'images/gallery/Raku/raku-9.jpg', 9),
(1, 'Personnage Raku 10', 'images/gallery/Raku/raku-10.jpg', 10),
(1, 'Personnage Raku 11', 'images/gallery/Raku/raku-11.jpg', 11),
(1, 'Personnage Raku 12', 'images/gallery/Raku/raku-12.jpg', 12),
(1, 'Personnage Raku 13', 'images/gallery/Raku/raku-13.jpg', 13),
(1, 'Personnage Raku 14', 'images/gallery/Raku/raku-14.jpg', 14),
(1, 'Personnage Raku 15', 'images/gallery/Raku/raku-15.jpg', 15),
(1, 'Personnage Raku 16', 'images/gallery/Raku/raku-16.jpg', 16),
(1, 'Personnage Raku 17', 'images/gallery/Raku/raku-17.jpg', 17),
(1, 'Personnage Raku 18', 'images/gallery/Raku/raku-18.jpg', 18),
(1, 'Personnage Raku 19', 'images/gallery/Raku/raku-19.jpg', 19),
(1, 'Personnage Raku 20', 'images/gallery/Raku/raku-20.jpg', 20),
(1, 'Personnage Raku 21', 'images/gallery/Raku/raku-21.jpg', 21),
(1, 'Personnage Raku 22', 'images/gallery/Raku/raku-22.jpg', 22),
(1, 'Personnage Raku 23', 'images/gallery/Raku/raku-23.jpg', 23),
(1, 'Personnage Raku 24', 'images/gallery/Raku/raku-24.jpg', 24),
(1, 'Personnage Raku 25', 'images/gallery/Raku/raku-25.jpg', 25),
(1, 'Personnage Raku 26', 'images/gallery/Raku/raku-26.jpg', 26),
(1, 'Personnage Raku 27', 'images/gallery/Raku/raku-27.jpg', 27),
(1, 'Personnage Raku 28', 'images/gallery/Raku/raku-28.jpg', 28),
(1, 'Personnage Raku 29', 'images/gallery/Raku/raku-29.jpg', 29),
(1, 'Personnage Raku 30', 'images/gallery/Raku/raku-30.jpg', 30),
(1, 'Personnage Raku 31', 'images/gallery/Raku/raku-31.jpg', 31),
(1, 'Personnage Raku 32', 'images/gallery/Raku/raku-32.jpg', 32),
(1, 'Personnage Raku 33', 'images/gallery/Raku/raku-33.jpg', 33),
(1, 'Personnage Raku 34', 'images/gallery/Raku/raku-34.JPG', 34),
(1, 'Personnage Raku 35', 'images/gallery/Raku/raku-35.jpg', 35),
(1, 'Personnage Raku 36', 'images/gallery/Raku/raku-36.jpg', 36),

-- Seed artworks: Poterie (1..20)
(2, 'Poterie 1', 'images/gallery/Poterie/poterie-1.jpg', 1),
(2, 'Poterie 2', 'images/gallery/Poterie/poterie-2.jpg', 2),
(2, 'Poterie 3', 'images/gallery/Poterie/poterie-3.jpg', 3),
(2, 'Poterie 4', 'images/gallery/Poterie/poterie-4.jpg', 4),
(2, 'Poterie 5', 'images/gallery/Poterie/poterie-5.jpg', 5),
(2, 'Poterie 6', 'images/gallery/Poterie/poterie-6.jpg', 6),
(2, 'Poterie 7', 'images/gallery/Poterie/poterie-7.jpg', 7),
(2, 'Poterie 8', 'images/gallery/Poterie/poterie-8.jpg', 8),
(2, 'Poterie 9', 'images/gallery/Poterie/poterie-9.jpg', 9),
(2, 'Poterie 10', 'images/gallery/Poterie/poterie-10.jpg', 10),
(2, 'Poterie 11', 'images/gallery/Poterie/poterie-11.jpg', 11),
(2, 'Poterie 12', 'images/gallery/Poterie/poterie-12.jpg', 12),
(2, 'Poterie 13', 'images/gallery/Poterie/poterie-13.jpg', 13),
(2, 'Poterie 14', 'images/gallery/Poterie/poterie-14.jpg', 14),
(2, 'Poterie 15', 'images/gallery/Poterie/poterie-15.jpg', 15),
(2, 'Poterie 16', 'images/gallery/Poterie/poterie-16.jpg', 16),
(2, 'Poterie 17', 'images/gallery/Poterie/poterie-17.jpg', 17),
(2, 'Poterie 18', 'images/gallery/Poterie/poterie-18.jpg', 18),
(2, 'Poterie 19', 'images/gallery/Poterie/poterie-19.jpg', 19),
(2, 'Poterie 20', 'images/gallery/Poterie/poterie-20.jpg', 20),

-- Seed artworks: Animaux (1..17)
(3, 'Animal 1', 'images/gallery/Animaux/animaux-1.jpg', 1),
(3, 'Animal 2', 'images/gallery/Animaux/animaux-2.jpg', 2),
(3, 'Animal 3', 'images/gallery/Animaux/animaux-3.jpg', 3),
(3, 'Animal 4', 'images/gallery/Animaux/animaux-4.jpg', 4),
(3, 'Animal 5', 'images/gallery/Animaux/animaux-5.jpg', 5),
(3, 'Animal 6', 'images/gallery/Animaux/animaux-6.jpg', 6),
(3, 'Animal 7', 'images/gallery/Animaux/animaux-7.jpg', 7),
(3, 'Animal 8', 'images/gallery/Animaux/animaux-8.jpg', 8),
(3, 'Animal 9', 'images/gallery/Animaux/animaux-9.jpg', 9),
(3, 'Animal 10', 'images/gallery/Animaux/animaux-10.jpg', 10),
(3, 'Animal 11', 'images/gallery/Animaux/animaux-11.jpg', 11),
(3, 'Animal 12', 'images/gallery/Animaux/animaux-12.jpg', 12),
(3, 'Animal 13', 'images/gallery/Animaux/animaux-13.jpg', 13),
(3, 'Animal 14', 'images/gallery/Animaux/animaux-14.jpg', 14),
(3, 'Animal 15', 'images/gallery/Animaux/animaux-15.jpg', 15),
(3, 'Animal 16', 'images/gallery/Animaux/animaux-16.jpg', 16),
(3, 'Animal 17', 'images/gallery/Animaux/animaux-17.jpg', 17),

-- Seed artworks: Terre cuite (1..6)
(4, 'Terre cuite 1', 'images/gallery/Terre/terre-1.jpg', 1),
(4, 'Terre cuite 2', 'images/gallery/Terre/terre-2.jpg', 2),
(4, 'Terre cuite 3', 'images/gallery/Terre/terre-3.jpg', 3),
(4, 'Terre cuite 4', 'images/gallery/Terre/terre-4.jpg', 4),
(4, 'Terre cuite 5', 'images/gallery/Terre/terre-5.jpg', 5),
(4, 'Terre cuite 6', 'images/gallery/Terre/terre-6.jpg', 6),

-- Seed artworks: Couples (1..4)
(5, 'Couple 1', 'images/gallery/Couples/couples-1.jpg', 1),
(5, 'Couple 2', 'images/gallery/Couples/couples-2.jpg', 2),
(5, 'Couple 3', 'images/gallery/Couples/couples-3.jpg', 3),
(5, 'Couple 4', 'images/gallery/Couples/couples-4.jpg', 4),

-- Seed artworks: Bronze (1..6)
(6, 'Bronze 1', 'images/gallery/Bronze/bronze-1.jpg', 1),
(6, 'Bronze 2', 'images/gallery/Bronze/bronze-2.jpg', 2),
(6, 'Bronze 3', 'images/gallery/Bronze/bronze-3.jpg', 3),
(6, 'Bronze 4', 'images/gallery/Bronze/bronze-4.jpg', 4),
(6, 'Bronze 5', 'images/gallery/Bronze/bronze-5.jpg', 5),
(6, 'Bronze 6', 'images/gallery/Bronze/bronze-6.jpg', 6);

