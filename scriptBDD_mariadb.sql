CREATE DATABASE exercicefinal;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    date_inscription TIMESTAMP NOT NULL
)

CREATE TABLE posts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(100) NOT NULL,
    contenu TEXT NOT NULL,
    utilisateur_id INT NOT NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES users (id),
    date_publication TIMESTAMP NOT NULL
)

CREATE TABLE comments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    contenu TEXT NOT NULL,
    utilisateur_id INT NOT NULL,
    post_id INT NOT NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES users (id),
    FOREIGN KEY (post_id) REFERENCES posts (id),
    date_commentaire TIMESTAMP NOT NULL
)