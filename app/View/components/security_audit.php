<!-- Afficher : Présenter les recommandations d'audit de sécurité -->
<div class="bg-white shadow rounded-lg p-11">
    <div class="flex items-center justify-between pb-4 border-b border-gray-100">
        <h2 class="text-lg font-semibold text-gray-900 flex items-center">
            <svg class="h-5 w-5 text-green-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
            Security Audit
        </h2>
        <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Health</span>
    </div>

    <div class="mt-4 space-y-4">
        <!-- Barre de santé générale -->
        <div>
            <div class="flex justify-between text-sm text-gray-600 mb-1">
                <span>Vault Protection</span>
                <span class="font-semibold text-green-600">Optimal</span>
            </div>
            <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden">
                <div class="bg-green-500 h-2 rounded-full" style="width: 92%;"></div>
            </div>
        </div>

        <ul class="text-xs text-gray-600 space-y-2 pt-2">
            <li class="flex items-center text-gray-700">
                <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>AES-256-GCM hardware encryption active</span>
            </li>
            <li class="flex items-center text-gray-700">
                <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>Zero external cloud synchronization</span>
            </li>
            <li class="flex items-center text-gray-700">
                <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>No reused passwords detected</span>
            </li>
        </ul>
    </div>
</div>
