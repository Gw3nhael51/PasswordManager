SET client_encoding = 'UTF8';

-- Nettoyage
DROP TABLE IF EXISTS users CASCADE;
DROP TABLE IF EXISTS vault_items CASCADE;

-- table des Utilisateurs
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) DEFAULT 'user' CHECK (role IN ('admin', 'user')),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- insertion des utilisateurs de test par defaut
-- admin / securepass
-- test_user / 123456

INSERT INTO users (username, password, role) VALUES
    ('admin', '$2y$12$z.Bp2f86Gt7IKLyhwP0XPe/TuX1yma3gUZA6VB9zoBhJPvW3Uf34S', 'admin'),
    ('test_user', '$2y$12$.bFMV9RhLE5wEiySFeyXmuXtTbgWCba12dGHVSAuACS.ddbpz8JyG', 'user');

-- Definir table du coffre avec un proprietaire et partage
CREATE TABLE vault_items (
    id SERIAL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    title VARCHAR(100) NOT NULL,
    website_url VARCHAR(255) NOT NULL,
    username VARCHAR(100) NOT NULL,
    encrypted_password TEXT NOT NULL,
    iv VARCHAR(255) NOT NULL,
    category VARCHAR(50) DEFAULT 'General',
    is_shared BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);