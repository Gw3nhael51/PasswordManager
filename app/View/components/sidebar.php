<?php

    require_once __DIR__ . '/../../Controller/auth.php';

    if (isConnected()) : ?>
        <!-- Navigation : Afficher la barre latérale du coffre-fort -->
        <aside class="hidden sm:flex sm:flex-col">
            <a href="#" class="inline-flex items-center justify-center h-20 w-20 bg-purple-600 hover:bg-purple-700 transition" title="VaultPanel">
                <svg class="h-9 w-9 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </a>
            
            <div class="flex-grow flex flex-col justify-between text-gray-400 bg-gray-900 w-20">
                <nav class="flex flex-col items-center py-6 space-y-4">

                    <!-- Lien vers le coffre principal -->
                        <a href="#" class="inline-flex items-center justify-center p-3 text-purple-400 bg-gray-800 rounded-xl hover:text-white transition" title="My Vault">
                            <span class="sr-only">My Vault</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                            </svg>
                        </a>

                        <!-- Lien vers les éléments partagés -->
                        <a href="#shared" id="filter-shared-nav" class="inline-flex items-center justify-center p-3 hover:text-white hover:bg-gray-800 rounded-xl transition" title="Shared Credentials">
                            <span class="sr-only">Shared Credentials</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </a>

                    <!-- Section réservée aux administrateurs -->
                    <?php if (isAdmin()) : ?>
                        <a href="#admin" id="admin-panel-nav" class="inline-flex items-center justify-center p-3 text-amber-400 hover:text-amber-300 hover:bg-gray-800 rounded-xl transition" title="User Management (Admin)">
                            <span class="sr-only">User Management</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </a>
                    <?php endif; ?>
                </nav>

                <!-- Déconnexion rapide en bas -->
                <div class="flex flex-col items-center py-6 border-t border-gray-800 space-y-3">
                    <a href="logout.php" class="p-3 text-gray-400 hover:text-red-400 hover:bg-gray-800 rounded-xl transition" title="Log out">
                        <span class="sr-only">Log out</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </a>
                </div>
            </div>
        </aside>
    <?php endif; ?>
