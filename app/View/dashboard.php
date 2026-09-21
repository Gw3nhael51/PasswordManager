<?php
    // Configurer : Définir le titre et la classe du corps de page
    $title = "Dashboard";
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

                // Inclure : Afficher les indicateurs statistiques
                require_once __DIR__ . '/components/stats_cards.php';
            ?>

            <section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
                <?php
                    // Inclure : Afficher le graphique mensuel des étudiants
                    require_once __DIR__ . '/components/monthly_chart.php';

                    // Inclure : Afficher les statistiques de leçons
                    require_once __DIR__ . '/components/lection_stats.php';

                    // Inclure : Afficher la liste des étudiants
                    require_once __DIR__ . '/components/student_list.php';

                    // Inclure : Afficher le graphique par type d'études
                    require_once __DIR__ . '/components/study_type_chart.php';
                ?>
            </section>
        </main>
    </div>

<?php
    // Inclure : Fermer les balises du document HTML
    require_once __DIR__ . '/footer.php';
?>
