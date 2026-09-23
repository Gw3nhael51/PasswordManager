<?php
    // Configurer : Définir le titre et la classe du corps de page
    $title = "Password Vault";
    $bodyClass = "flex bg-gray-100 min-h-screen";
    
    require_once __DIR__ . '/../Controller/auth.php';
    requireAuth();

    require_once __DIR__ . '/header.php';

    // Inclure : Afficher la barre latérale de navigation
    require_once __DIR__ . '/components/sidebar.php';
?>
    
    <div class="flex-grow text-gray-800">
        <?php
            // Inclure : Afficher la barre supérieure
            require_once __DIR__ . '/components/topbar.php';
        ?>

        <main class="p-6 sm:p-10 space-y-6">
            <?php
                // Inclure : Afficher l'en-tête du tableau de bord
                require_once __DIR__ . '/components/dashboard_header.php';

                // Inclure : Afficher les indicateurs statistiques du coffre
                require_once __DIR__ . '/components/stats_cards.php';
            ?>

            <section class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 space-y-6">
                    <?php
                        // Inclure : Afficher la liste des identifiants enregistrés
                        require_once __DIR__ . '/components/vault_list.php';
                    ?>
                </div>

                <div class="space-y-6">
                    <?php
                        // Inclure : Afficher le générateur de mot de passe interactif
                        require_once __DIR__ . '/components/generator.php';

                        // Inclure : Afficher l'audit de sécurité
                        require_once __DIR__ . '/components/security_audit.php';
                    ?>
                </div>
            </section>
        </main>
    </div>

<?php
    // Inclure : Afficher la boîte de dialogue d'ajout d'identifiant
    require_once __DIR__ . '/components/modal_add_item.php';

    // Inclure : Fermer les balises du document HTML
    require_once __DIR__ . '/footer.php';
?>
