CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(10) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(15) NOT NULL,
    profile_image VARCHAR(255),
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'farmer', 'user') NOT NULL,
    is_ban TINYINT(1) DEFAULT 0,  -- 0 = Active, 1 = Banned
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);