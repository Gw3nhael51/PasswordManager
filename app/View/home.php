<?php
// inclure l'authentification
require_once __DIR__ . '/../Controller/auth.php';

$title = "Accueil";
require_once __DIR__ . '/header.php';

$connected = isConnected();
$user = getUser();
?>

<main class="flex flex-col gap-4 p-9 bg-gray-900 border border-white/10 rounded-2xl w-full max-w-sm shadow-2xl">
    <h1 class="text-center text-white text-2xl font-semibold tracking-tight mb-2">Bienvenue</h1>
    
    <p class="text-center text-gray-400 text-sm mb-4">
        <?= $connected ? 'Connecté en tant que <strong class="text-white">' . htmlspecialchars($user['username'] ?? '') . '</strong> (' . htmlspecialchars($user['role'] ?? '') . ').' : 'Vous êtes sur la page d\'accueil de l\'application.' ?>
    </p>

    <div class="flex flex-col gap-3">
        <?php if ($connected): ?>
            <a href="dashboard.php" class="w-full text-center py-3 px-4 rounded-lg text-sm font-medium bg-blue-600 hover:bg-blue-700 text-white transition-colors">
                Accéder au Dashboard
            </a>
            <a href="logout.php" class="w-full text-center py-2.5 px-4 rounded-lg text-sm font-medium bg-gray-800 hover:bg-gray-700 text-gray-300 transition-colors">
                Se déconnecter
            </a>
        <?php else: ?>
            <a href="login.php" class="w-full text-center py-3 px-4 rounded-lg text-sm font-medium bg-blue-600 hover:bg-blue-700 text-white transition-colors">
                Se connecter
            </a>
        <?php endif; ?>
    </div>
</main>

<?php
    // Inclure : Fermer les balises du document HTML
    require_once __DIR__ . '/footer.php';
?>

