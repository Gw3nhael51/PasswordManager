<?php
// inclure la config et l'authentification
require_once __DIR__ . '/../Model/config.php';
require_once __DIR__ . '/../Controller/auth.php';

const REDIRECT_DASHBOARD = 'Location: dashboard.php';
const REDIRECT_LOGIN = 'Location: login.php';

// rediriger si l'utilisateur est déjà connecté
if (isConnected()) {
    header(REDIRECT_DASHBOARD);
    exit;
}

// initialiser l'erreur
$error = '';

// récupérer l'erreur stockée en session
if (!empty($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']); // supprimer après lecture
}

// traiter le formulaire si soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // récupérer les champs
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // vérifier les champs requis
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Please fill in all fields.";
        header(REDIRECT_LOGIN);
        exit;
    }

    // rechercher l'utilisateur
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // vérifier le mot de passe
        if ($user && password_verify($password, $user['password'])) {

            // connecter l'utilisateur
            connectingUser($user);

            // rediriger vers dashboard
            header(REDIRECT_DASHBOARD);
            exit;
        } else {
            // stocker l'erreur en session
            $_SESSION['error'] = "Incorrect username or password. Please try again.";
            header(REDIRECT_LOGIN);
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Database error: " . $e->getMessage();
        header(REDIRECT_LOGIN);
        exit;
    }
}

$title = "Connexion";
require_once __DIR__ . '/header.php';
?>

<form class="flex flex-col gap-4 p-9 bg-gray-900 border border-white/10 rounded-2xl w-full max-w-sm shadow-2xl" method="POST" action="/login.php">
    <h1 class="text-center text-white text-2xl font-semibold tracking-tight mb-2">Login</h1>

    <?php if (!empty($error)): ?>
        <p class="text-sm text-red-400 text-center bg-red-950/50 border border-red-800 rounded-lg p-2">
            <?= htmlspecialchars($error) ?>
        </p>
    <?php endif; ?>
    
    <!--  -->
    <div class="flex items-center gap-3 rounded-xl px-4 py-3 bg-gray-800 border border-gray-700">
        <label for="username" class="sr-only">Username</label>
        <svg class="h-5 w-5 fill-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
            <path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"></path>
        </svg>
    
        <input id="username" name="username" autocomplete="off" placeholder="Username" class="bg-transparent border-none outline-none w-full text-gray-100 placeholder-gray-500 text-sm" type="text">
    </div>
    
    <!--  -->
    <div class="flex items-center gap-3 rounded-xl px-4 py-3 bg-gray-800 border border-gray-700">
        <label for="password" class="sr-only">Password</label>
        <svg class="h-5 w-5 fill-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"></path>
        </svg>
        <input id="password" name="password" placeholder="Password" class="bg-transparent border-none outline-none w-full text-gray-100 placeholder-gray-500 text-sm" type="password">
    </div>

    <div class="flex gap-3 mt-3">
        <button class="flex-1 py-3 px-4 rounded-lg text-sm font-medium bg-blue-600 hover:bg-blue-700 text-white transition-colors cursor-pointer" type="submit">Login</button>
        <button class="flex-1 py-3 px-4 rounded-lg text-sm font-medium bg-gray-700 hover:bg-gray-600 text-gray-200 transition-colors cursor-pointer" type="button">Sign Up</button>
    </div>

    <button class="bg-transparent border-none outline-none text-gray-400 hover:text-gray-300 text-xs cursor-pointer text-center mt-1" type="button">Forgot Password</button>
</form>

<?php
    // Inclure : Fermer les balises du document HTML
    require_once __DIR__ . '/footer.php';
?>
