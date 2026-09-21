<?php
// démarrer la session si nécessaire
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// vérifier si l'utilisateur est connecté
function isConnected()
{
    return isset($_SESSION['user_id']);
}

// récupérer l'utilisateur connecté
function getUser()
{
    if (!isConnected()) {
        return null;
    }

    return [
        'id'         => $_SESSION['user_id'] ?? null,
        'username'   => $_SESSION['username'] ?? null,
        'role'       => $_SESSION['role'] ?? null,
        'created_at' => $_SESSION['created_at'] ?? null,
    ];
}

// vérifier si l'utilisateur est admin
function isAdmin()
{
    return isConnected() && ($_SESSION['role'] ?? null) === 'admin';
}

// vérifier si l'utilisateur est un utilisateur normal
function isUser()
{
    return isConnected() && ($_SESSION['role'] ?? null) === 'user';
}

// protéger la page si non connecté
function requireAuth()
{
    if (!isConnected()) {
        header("Location: login.php");
        exit;
    }
}

// protéger la page si non admin
function requireAdmin()
{
    requireAuth();
    if (!isAdmin()) {
        header("Location: index.php");
        exit;
    }
}

// connecter l'utilisateur
function connectingUser(array $user): void
{
    $_SESSION['user_id']  = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role']     = $user['role'];
    $_SESSION['created_at'] = $user['created_at'];
}

// déconnecter l'utilisateur
function logoutUser()
{
    session_unset();
    session_destroy();
}
