CREATE TABLE social_medias (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
url VARCHAR(255) NOT NULL,
status TINYINT(1) NOT NULL DEFAULT 0 COMMENT '0=shown,1=hidden'
);
INSERT INTO social_medias (id, name, url, status) VALUES
(1, 'Facebook', 'www.facebook.com', 0),
(2, 'Instagram', 'www.instagram.com', 0);
