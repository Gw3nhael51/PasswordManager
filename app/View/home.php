<?php
// Inclure : Charger les fonctions d'authentification
require_once __DIR__ . '/../Controller/auth.php';

$title = "Home — PasswordManager";
require_once __DIR__ . '/header.php';

$connected = isConnected();
$user = getUser();
?>

<main class="flex flex-col gap-4 p-8 sm:p-10 bg-gray-900 border border-white/10 rounded-2xl w-full max-w-sm shadow-2xl text-center">
    <div class="inline-flex items-center justify-center h-16 w-16 bg-purple-600/20 text-purple-400 rounded-2xl mx-auto mb-1">
        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
        </svg>
    </div>

    <h1 class="text-white text-2xl font-bold tracking-tight">PasswordManager</h1>
    
    <p class="text-gray-400 text-sm">
        <?= $connected
            ? 'Logged in as <strong class="text-white">' . htmlspecialchars($user['username'] ?? '') . '</strong> (' . htmlspecialchars($user['role'] ?? '') . ').'
            : 'Self-hosted, encrypted local password manager & security dashboard.' ?>
    </p>

    <div class="flex flex-col gap-3 mt-3">
        <?php if ($connected): ?>
            <a href="dashboard.php" class="w-full text-center py-3 px-4 rounded-lg text-sm font-semibold bg-purple-600 hover:bg-purple-700 text-white shadow-md transition">
                Go to Dashboard
            </a>
            <a href="logout.php" class="w-full text-center py-2.5 px-4 rounded-lg text-sm font-medium bg-gray-800 hover:bg-gray-700 text-gray-300 transition">
                Log out
            </a>
        <?php else: ?>
            <a href="login.php" class="w-full text-center py-3 px-4 rounded-lg text-sm font-semibold bg-purple-600 hover:bg-purple-700 text-white shadow-md transition">
                Sign in to Vault
            </a>
        <?php endif; ?>
    </div>
</main>

<?php
    // Inclure : Fermer les balises du document HTML
    require_once __DIR__ . '/footer.php';
?>
