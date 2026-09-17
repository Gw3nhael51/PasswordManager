<?php
    $title = "Accueil";
    require_once __DIR__ . '/header.php';
?>

<main class="form">
    <h1 id="heading">Bienvenue</h1>
    
    <p style="text-align: center; color: #9ca3af; font-size: 0.95rem; margin-bottom: 1rem;">
        Vous êtes sur la page d'accueil de l'application.
    </p>

    <div class="btn">
        <a href="login.php" class="button1" style="text-align: center; text-decoration: none; display: inline-block;">
            Se connecter
        </a>
    </div>
</main>

<?php
    require_once __DIR__ . '/footer.php';
?>
