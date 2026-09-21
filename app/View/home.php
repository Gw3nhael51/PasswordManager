<?php
    // Configurer : Définir le titre de la page d'accueil
    $title = "Accueil";
    require_once __DIR__ . '/header.php';
?>

<main class="flex flex-col gap-4 p-9 bg-gray-900 border border-white/10 rounded-2xl w-full max-w-sm shadow-2xl">
    <h1 class="text-center text-white text-2xl font-semibold tracking-tight mb-2">Bienvenue</h1>
    
    <p class="text-center text-gray-400 text-sm mb-4">
        Vous êtes sur la page d'accueil de l'application.
    </p>

    <div class="flex">
        <a href="login.php" class="w-full text-center py-3 px-4 rounded-lg text-sm font-medium bg-blue-600 hover:bg-blue-700 text-white transition-colors">
            Se connecter
        </a>
    </div>
</main>

<?php
    // Inclure : Fermer les balises du document HTML
    require_once __DIR__ . '/footer.php';
?>

