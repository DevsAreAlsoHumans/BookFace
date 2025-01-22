DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    user_id INT NOT NULL,
    votes_up INT DEFAULT 0,
    votes_down INT DEFAULT 0,
    category_id INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    user_id INT NOT NULL,
    post_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
);

INSERT INTO users (username, password) VALUES
('JeanDupont', 'password123'),
('MarieCurie', 'securepass456'),
('PaulMartin', 'pass789'),
('ClaireFontaine', '1234abcd'),
('LuciePetit', 'motdepasse2025');

INSERT INTO categories (name) VALUES
('Technologie'),
('Cuisine'),
('Voyages'),
('Sport'),
('Musique');

INSERT INTO posts (title, content, user_id, votes_up, votes_down, category_id) VALUES
('Les nouvelles technologies en 2025', 'Un aperçu des innovations technologiques cette année.', 1, 10, 2, 1),
('Recette facile de gâteau au chocolat', 'Une recette simple et rapide pour un délicieux gâteau.', 2, 25, 1, 2),
('Mon voyage à Bali : conseils et astuces', 'Découvrez mes expériences et recommandations pour visiter Bali.', 3, 18, 3, 3),
('Comment rester motivé en sport ?', 'Quelques conseils pour maintenir votre motivation à long terme.', 4, 5, 0, 4),
('Les meilleurs albums de musique classique', 'Un classement des albums incontournables pour les amateurs de classique.', 5, 12, 0, 5);

INSERT INTO comments (content, user_id, post_id) VALUES
('Article très intéressant, merci pour le partage !', 2, 1),
("J'ai testé la recette et c\'est délicieux, merci !", 3, 2),
('Bali est sur ma liste de voyages, merci pour les astuces !', 4, 3),
('Merci pour les conseils, je vais les essayer dès demain.', 1, 4),
("Un grand merci pour ce classement, j'adore la musique classique.", 2, 5),
("Une recette qui m\'a sauvé lors d\'un dîner imprévu, merci !", 5, 2),
("J'aime beaucoup cet article, continuez ainsi !", 3, 1);
