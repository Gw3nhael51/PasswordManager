<!-- Afficher : Présenter les cartes récapitulatives de statistiques du coffre -->
<section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
    <div class="flex items-center p-6 bg-white shadow rounded-lg">
        <div class="inline-flex flex-shrink-0 items-center justify-center h-14 w-14 text-purple-600 bg-purple-100 rounded-full mr-4">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>
        <div>
            <span id="stat-total-passwords" class="block text-2xl font-bold text-gray-900">0</span>
            <span class="block text-sm text-gray-500">Total Credentials</span>
        </div>
    </div>

    <div class="flex items-center p-6 bg-white shadow rounded-lg">
        <div class="inline-flex flex-shrink-0 items-center justify-center h-14 w-14 text-blue-600 bg-blue-100 rounded-full mr-4">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
        </div>
        <div>
            <span id="stat-shared-passwords" class="block text-2xl font-bold text-gray-900">0</span>
            <span class="block text-sm text-gray-500">Shared Items</span>
        </div>
    </div>

    <div class="flex items-center p-6 bg-white shadow rounded-lg">
        <div class="inline-flex flex-shrink-0 items-center justify-center h-14 w-14 text-green-600 bg-green-100 rounded-full mr-4">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
        </div>
        <div>
            <span id="stat-vault-health" class="block text-2xl font-bold text-gray-900">100%</span>
            <span class="block text-sm text-gray-500">Vault Health Score</span>
        </div>
    </div>

    <div class="flex items-center p-6 bg-white shadow rounded-lg">
        <div class="inline-flex flex-shrink-0 items-center justify-center h-14 w-14 text-amber-600 bg-amber-100 rounded-full mr-4">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
        </div>
        <div>
            <span id="stat-weak-passwords" class="block text-2xl font-bold text-gray-900">0</span>
            <span class="block text-sm text-gray-500">Weak / At Risk</span>
        </div>
    </div>
</section>
