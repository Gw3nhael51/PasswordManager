<!-- Afficher : Présenter la liste des identifiants stockés dans le coffre -->
<div class="bg-white shadow rounded-lg overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-lg font-semibold text-gray-900">Stored Credentials</h2>
            <p class="text-sm text-gray-500">View and manage your encrypted logins</p>
        </div>
        
        <div class="flex items-center space-x-3">
            <div class="relative">
                <label for="vault-search-input" class="sr-only">Search logins</label>
                <input id="vault-search-input" type="text" placeholder="Search logins..." class="text-sm pl-9 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 w-48 sm:w-64" />
                <svg class="h-4 w-4 text-gray-400 absolute left-3 top-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            
            <div>
                <label for="vault-category-filter" class="sr-only">Filter by category</label>
                <select id="vault-category-filter" class="text-sm border border-gray-200 rounded-lg px-3 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <option value="all">All Categories</option>
                    <option value="General">General</option>
                    <option value="Work">Work</option>
                    <option value="Social">Social</option>
                    <option value="Finance">Finance</option>
                    <option value="Servers">Servers</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Table des identifiants -->
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 text-gray-500 font-medium border-b border-gray-100">
                <tr>
                    <th class="py-3.5 px-6">Title & Service</th>
                    <th class="py-3.5 px-6">Username / Email</th>
                    <th class="py-3.5 px-6">Password</th>
                    <th class="py-3.5 px-6">Category</th>
                    <th class="py-3.5 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody id="vault-items-tbody" class="divide-y divide-gray-100">
                <!-- État initial : Chargement ou aucun élément -->
                <tr id="vault-empty-state">
                    <td colspan="5" class="py-12 text-center text-gray-400">
                        <svg class="mx-auto h-12 w-12 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        <p class="text-base font-medium text-gray-600">Your vault is empty</p>
                        <p class="text-sm text-gray-400 mt-1">Click "Add Credential" to store your first password</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
