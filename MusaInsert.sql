-- Create database
CREATE DATABASE MusaTeste;

-- Use the newly created database
USE MusaTeste;

-- Create tables
CREATE TABLE user (
    id_user INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome_user VARCHAR(50) NOT NULL,
    email_user VARCHAR(50) NOT NULL, 
    telefone_user VARCHAR(50) NOT NULL, 
    senha_user VARCHAR(50) NOT NULL, 
    uf_user VARCHAR(50) NOT NULL, 
    nomeartistico_user VARCHAR(50), 
    datacadastro_user DATETIME,
    descricao_user VARCHAR(50)
);

CREATE TABLE fotoperfil (
    id_fotoperfil INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    caminho_fotoperfil VARCHAR(90), 
    id_user INT,
    FOREIGN KEY(id_user) REFERENCES user(id_user)
);

CREATE TABLE links (
    id_link INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    conteudo_link VARCHAR(90), 
    id_user INT, 
    FOREIGN KEY(id_user) REFERENCES user(id_user)
);

CREATE TABLE post (
    id_post INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    titulo_post VARCHAR(50) NOT NULL, 
    descricao_post VARCHAR(50) NOT NULL, 
    data_Post DATETIME NOT NULL, 
    id_user INT,
    FOREIGN KEY(id_user) REFERENCES user(id_user)
); 

CREATE TABLE arquivo (
    id_arquivo INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    caminho_arquivo VARCHAR(200), 
    id_post INT, 
    FOREIGN KEY(id_post) REFERENCES post(id_post)
);

CREATE TABLE tag (
    id_tag INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome_tag VARCHAR(45),
    descricao_tag VARCHAR(90)
);

CREATE TABLE tag_user (
    id_tag INT,
    id_user INT,
    FOREIGN KEY(id_tag) REFERENCES tag(id_tag),
    FOREIGN KEY(id_user) REFERENCES user(id_user)
);

CREATE TABLE likes (
    id_post INT,
    id_user INT, 
    FOREIGN KEY(id_post) REFERENCES post(id_post),
    FOREIGN KEY(id_user) REFERENCES user(id_user)
);

-- Insert statements
INSERT INTO user (nome_user, email_user, telefone_user, senha_user, uf_user, nomeartistico_user, datacadastro_user, descricao_user) VALUES
('Alice Silva', 'alice@example.com', '1234567890', 'password123', 'SP', 'Alice', '2024-05-25 10:00:00', 'Musician'),
('Bob Santos', 'bob@example.com', '1234567891', 'password123', 'RJ', 'Bobby', '2024-05-26 10:00:00', 'Guitarist'),
('Carlos Pereira', 'carlos@example.com', '1234567892', 'password123', 'MG', NULL, '2024-05-27 10:00:00', 'Singer'),
('Diana Costa', 'diana@example.com', '1234567893', 'password123', 'RS', 'Dian', '2024-05-28 10:00:00', 'Violinist'),
('Eva Lima', 'eva@example.com', '1234567894', 'password123', 'BA', 'Evita', '2024-05-29 10:00:00', 'Composer'),
('Frank Souza', 'frank@example.com', '1234567895', 'password123', 'PR', NULL, '2024-05-30 10:00:00', 'DJ'),
('Grace Melo', 'grace@example.com', '1234567896', 'password123', 'PE', 'Gracy', '2024-05-31 10:00:00', 'Pianist'),
('Hugo Ramos', 'hugo@example.com', '1234567897', 'password123', 'CE', 'Hug', '2024-06-01 10:00:00', 'Drummer'),
('Iris Nogueira', 'iris@example.com', '1234567898', 'password123', 'GO', NULL, '2024-06-02 10:00:00', 'Vocalist'),
('Jake Oliveira', 'jake@example.com', '1234567899', 'password123', 'MA', 'Jake O', '2024-06-03 10:00:00', 'Bassist'),
('Saulo Marcus', 'Saulinho@gmail.com', '1234325423', '1234', 'SP', 'SaulinhoPP', '2024-06-03 10:00:00','Descrição aleatoria aleatoria');

INSERT INTO fotoperfil (caminho_fotoperfil, id_user) VALUES
('/images/alice.jpg', 1),
('/images/bob.jpg', 2),
('/images/carlos.jpg', 3),
('/images/diana.jpg', 4),
('/images/eva.jpg', 5),
('/images/frank.jpg', 6),
('/images/grace.jpg', 7),
('/images/hugo.jpg', 8),
('/images/iris.jpg', 9),
('/images/jake.jpg', 10),
('/uploads/fotoperfil/derxan.jpg',11);

INSERT INTO links (conteudo_link, id_user) VALUES
('https://alice-music.com', 1),
('https://bob-guitar.com', 2),
('https://carlos-sings.com', 3),
('https://diana-violin.com', 4),
('https://eva-composer.com', 5),
('https://frank-dj.com', 6),
('https://grace-piano.com', 7),
('https://hugo-drummer.com', 8),
('https://iris-vocal.com', 9),
('https://jake-bass.com', 10),
('Saulo_Link_teste',11);

INSERT INTO post (titulo_post, descricao_post, data_Post, id_user) VALUES
('New Album Release', 'Check out my new album!', '2024-05-27 12:00:00', 1),
('Guitar Solo', 'Watch my latest guitar solo.', '2024-05-27 13:00:00', 2),
('Live Performance', 'Join me for a live performance.', '2024-05-27 14:00:00', 3),
('Violin Recital', 'Come to my violin recital.', '2024-05-27 15:00:00', 4),
('Composing Music', 'My process of composing music.', '2024-05-27 16:00:00', 5),
('DJ Set', 'Watch my latest DJ set.', '2024-05-27 17:00:00', 6),
('Piano Concert', 'Piano concert coming soon.', '2024-05-27 18:00:00', 7),
('Drum Tutorial', 'Learn drumming with my tutorials.', '2024-05-27 19:00:00', 8),
('Vocal Tips', 'My top vocal tips.', '2024-05-27 20:00:00', 9),
('Bass Techniques', 'Advanced bass techniques.', '2024-05-27 21:00:00', 10);

INSERT INTO arquivo (caminho_arquivo, id_post) VALUES
('/files/album.zip', 1),
('/files/solo.mp4', 2),
('/files/live.mp4', 3),
('/files/recital.mp4', 4),
('/files/composing.pdf', 5),
('/files/dj_set.mp3', 6),
('/files/concert.mp4', 7),
('/files/drum_tutorial.mp4', 8),
('/files/vocal_tips.pdf', 9),
('/files/bass_techniques.mp4', 10);

INSERT INTO tag (nome_tag, descricao_tag) VALUES
('Cantor', 'Singer'),
('Beatmaker', 'Beatmaker'),
('Instrumentista', 'Instrumentalist'),
('Letrista', 'Lyricist');

INSERT INTO tag_user (id_tag, id_user) VALUES
(1, 1), (2, 1), (3, 1), -- Alice Silva
(1, 2), (2, 2), (3, 2),  -- Bob Santos
(1, 3), (2, 3), (3, 3),  -- Carlos Pereira
(1, 4), (2, 4), (3, 4),  -- Diana Costa
(1, 5), (2, 5), (3, 5),  -- Eva Lima
(1, 6), (2, 6), (3, 6),  -- Frank Souza
(1, 7), (2, 7), (3, 7),  -- Grace Melo
(1, 8), (2, 8), (3, 8),  -- Hugo Ramos
(1, 9), (2, 9), (3, 9),  -- Iris Nogueira
(1, 10), (2, 10), (3, 10), -- Jake Oliveira
(1, 11), (2, 11), (3, 11); 

INSERT INTO likes (id_post, id_user) VALUES
(1, 2),
(2, 3),
(3, 4),
(4, 5),
(5, 6),
(6, 7),
(7, 8),
(8, 9),
(9, 10),
(10, 1);
