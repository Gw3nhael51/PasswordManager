SET client_encoding = 'UTF8';

-- Nettoyage
DROP TABLE IF EXISTS users;

-- table des Utilisateurs
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) DEFAULT 'user' CHECK (role IN ('admin', 'user')),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Username    Password (en clair)
-- admin       securepass
-- test_user   123456