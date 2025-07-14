CREATE TABLE Exam_Membres(
    id_membre INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    date_naissance DATE,
    email VARCHAR(100),
    ville VARCHAR(50),
    genre VARCHAR(20),
    mdp VARCHAR(100),
    image_membre VARCHAR(100)
);

CREATE TABLE Exam_Categorie_Objet(
    id_categorie INT PRIMARY KEY AUTO_INCREMENT,
    nom_categorie VARCHAR(50)
);

CREATE TABLE Exam_Objet(
    id_objet INT PRIMARY KEY AUTO_INCREMENT,
    nom_objet VARCHAR(50),
    id_membre INT,
    id_categorie INT,
    FOREIGN KEY (id_categorie) REFERENCES Exam_Categorie_Objet(id_categorie),
    FOREIGN KEY (id_membre) REFERENCES Exam_Membres(id_membre)
);

CREATE TABLE Exam_Image_Objet(
    id_image INT PRIMARY KEY AUTO_INCREMENT,
    id_objet INT,
    nom_image VARCHAR(100),
    FOREIGN KEY (id_objet) REFERENCES Exam_Objet(id_objet)
);

CREATE TABLE Exam_Emprunt(
    id_emprunt INT PRIMARY KEY AUTO_INCREMENT,
    id_objet INT,
    id_membre INT,
    date_emprunt DATE,
    date_retour DATE
);

CREATE TABLE
INSERT INTO Exam_Membres (nom, date_naissance, email, ville, genre, mdp, image_membre) VALUES
('Alice Dupont', '1990-05-12', 'alice.dupont@email.com', 'Paris', 'Femme', 'password1', 'alice.jpg'),
('Bob Martin', '1985-11-23', 'bob.martin@email.com', 'Lyon', 'Homme', 'password2', 'bob.jpg'),
('Claire Petit', '1992-03-08', 'claire.petit@email.com', 'Marseille', 'Femme', 'password3', 'claire.jpg'),
('David Moreau', '1988-07-19', 'david.moreau@email.com', 'Toulouse', 'Homme', 'password4', 'david.jpg');

INSERT INTO Exam_Categorie_Objet (nom_categorie) VALUES
('esthetique'),
('bricolqge'),
('mecqnique'),
('cuisine');

INSERT INTO Exam_Objet (nom_objet, id_membre, id_categorie) VALUES

('Rouge à lèvres', 1, 1),
('Perceuse', 1, 2),
('Tournevis', 1, 2),
('Mixer', 1, 4),
('Crème visage', 1, 1),
('Casserole', 1, 4),
('Clé à molette', 1, 3),
('Mascara', 1, 1),
('Fouet', 1, 4),
('Pinceau', 1, 1),

('Scie', 2, 2),
('Tournevis électrique', 2, 2),
('Pompe à vélo', 2, 3),
('Cafetière', 2, 4),
('Crème solaire', 2, 1),
('Poêle', 2, 4),
('Clé plate', 2, 3),
('Vernis', 2, 1),
('Spatule', 2, 4),
('Pinceau mural', 2, 2),

('Lime à ongles', 3, 1),
('Perceuse à colonne', 3, 2),
('Tournevis plat', 3, 2),
('Robot pâtissier', 3, 4),
('Crème mains', 3, 1),
('Cocotte', 3, 4),
('Clé Allen', 3, 3),
('Mascara waterproof', 3, 1),
('Fouet électrique', 3, 4),
('Pinceau blush', 3, 1),

('Scie sauteuse', 4, 2),
('Tournevis cruciforme', 4, 2),
('Pompe à main', 4, 3),
('Grille-pain', 4, 4),
('Crème de nuit', 4, 1),
('Poêle antiadhésive', 4, 4),
('Clé dynamométrique', 4, 3),
('Vernis mat', 4, 1),
('Spatule silicone', 4, 4),
('Pinceau à colle', 4, 2);
-- Insertion de 10 emprunts
INSERT INTO Exam_Emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2025-07-01', '2025-07-10'),
(5, 3, '2025-07-02', '2025-07-12'),
(12, 1, '2025-07-03', '2025-07-13'),
(18, 4, '2025-07-04', '2025-07-14'),
(23, 2, '2025-07-05', '2025-07-15'),
(27, 1, '2025-07-06', '2025-07-16'),
(31, 3, '2025-07-07', '2025-07-17'),
(35, 4, '2025-07-08', '2025-07-18'),
(8, 2, '2025-07-09', '2025-07-19'),
(15, 3, '2025-07-10', '2025-07-20');
