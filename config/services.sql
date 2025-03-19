CREATE TABLE services (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(300) NOT NULL,
    small_description VARCHAR(500) NULL,
    long_description MEDIUMTEXT NULL,
    image VARCHAR(100) NULL,
    meta_title VARCHAR(255) NOT NULL,
    meta_description VARCHAR(1000) NULL,
    meta_keyword VARCHAR(1000) NULL,
    status TINYINT(1) NOT NULL DEFAULT 0 COMMENT '0=visible, 1=hidden'
);
