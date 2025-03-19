CREATE TABLE settings (
    id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(191) NOT NULL,
    slug VARCHAR(100) NULL,
    small_description TEXT NULL,
    meta_description VARCHAR(1000) NULL,
    meta_keyword VARCHAR(1000) NULL,
    email1 VARCHAR(100) NULL,
    email2 VARCHAR(100) NULL,
    phone1 VARCHAR(50) NULL,
    phone2 VARCHAR(50) NULL,
    address VARCHAR(500) NULL
);
INSERT INTO settings (id, title, slug, small_description, meta_description, meta_keyword, email1, email2, phone1, phone2, address) 
VALUES 
(1, 'FARM', 'https://farmerp.com', '1.Crop Management: Providing expert guidance on soil health, irrigation, and pest control to maximize yield. <br> 2.Livestock Care: Ensuring proper nutrition, healthcare, and breeding strategies for healthy and productive animals. <br>3.Equipment & Tools: Offering modern farming machinery, maintenance tips, and efficient usage techniques for better productivity.    Let me know if you need more details or modifications! 🚜🌾.', 
'Knowledge about farming', 'Farm', 'palchandan0805@gmail.com', 'ashishberiya14@gmail.com', '9930973918', '9082254261', 'Prem Nagar');
