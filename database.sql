-- Create syntax for AR Travels Database

CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(255) DEFAULT NULL
);

-- Default Admin User: admin / admin123
INSERT INTO admin_users (username, password) VALUES ('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi') ON DUPLICATE KEY UPDATE username='admin';

CREATE TABLE IF NOT EXISTS settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(50) NOT NULL UNIQUE,
    setting_value TEXT
);

-- Insert Default Settings
INSERT INTO settings (setting_key, setting_value) VALUES
('business_name', 'AR Travels'),
('phone', '+91 88660 22341'),
('whatsapp', '918866022341'),
('email', 'info@artravels.com'),
('address', 'New Delhi, India'),
('marquee_text', 'Welcome to AR Travels! Book your dream holiday today with special discounts. Flights, Hotels, Buses, and Trains available.'),
('marquee_speed', '15'),
('instagram', '#'),
('facebook', '#'),
('youtube', '#')
ON DUPLICATE KEY UPDATE setting_value=setting_value;

CREATE TABLE IF NOT EXISTS destinations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price VARCHAR(50),
    category VARCHAR(50),
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS packages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    destination VARCHAR(100) NOT NULL,
    duration VARCHAR(50),
    price VARCHAR(50),
    old_price VARCHAR(50),
    discount VARCHAR(50),
    highlights TEXT, -- JSON Array
    itinerary TEXT, -- JSON Array
    inclusions TEXT, -- JSON Array
    exclusions TEXT, -- JSON Array
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS package_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    package_id INT NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    is_main BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (package_id) REFERENCES packages(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    image_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    photo VARCHAR(255),
    rating INT DEFAULT 5,
    review TEXT NOT NULL,
    destination VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
