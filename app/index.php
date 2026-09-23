<?php

// Décider : Router les requêtes vers les bonnes vues
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Ignorer : Laisser le serveur interne servir les fichiers statiques réels
if ($uri !== '/' && $uri !== '/index.php' && file_exists(__DIR__ . $uri) && !is_dir(__DIR__ . $uri)) {
    return false;
}

$page = $_GET['page'] ?? null;

switch (true) {
    case $uri === '/login' || $uri === '/login.php' || $page === 'login':
        require_once __DIR__ . '/View/login.php';
        break;

    case $uri === '/dashboard' || $uri === '/dashboard.php' || $page === 'dashboard':
        require_once __DIR__ . '/View/dashboard.php';
        break;

    case $uri === '/logout' || $uri === '/logout.php' || $page === 'logout':
        require_once __DIR__ . '/Controller/auth.php';
        logoutUser();
        header('Location: /login.php');
        exit;

    case $uri === '/' || $uri === '/index' || $uri === '/index.php' || $uri === '/home' || $uri === '/home.php' || $page === 'home':
    default:
        require_once __DIR__ . '/View/home.php';
        break;
}
