<!-- Afficher : Présenter la boîte modale de création d'identifiant -->
<div id="add-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden transition-opacity">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-lg mx-4 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">Add New Credential</h3>
            <button id="close-modal-btn" type="button" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form id="vault-add-form" class="p-6 space-y-4">
            <div>
                <label for="item-title" class="block text-sm font-medium text-gray-700 mb-1">Service or Title *</label>
                <input id="item-title" name="title" type="text" required placeholder="e.g. GitHub, AWS, ProtonMail" class="w-full text-sm border border-gray-300 rounded-lg px-3.5 py-2.5 focus:outline-none focus:ring-2 focus:ring-purple-500" />
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="item-url" class="block text-sm font-medium text-gray-700 mb-1">Website URL</label>
                    <input id="item-url" name="website_url" type="url" placeholder="https://..." class="w-full text-sm border border-gray-300 rounded-lg px-3.5 py-2.5 focus:outline-none focus:ring-2 focus:ring-purple-500" />
                </div>
                <div>
                    <label for="item-category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select id="item-category" name="category" class="w-full text-sm border border-gray-300 rounded-lg px-3.5 py-2.5 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <option value="General">General</option>
                        <option value="Work">Work</option>
                        <option value="Social">Social</option>
                        <option value="Finance">Finance</option>
                        <option value="Servers">Servers</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="item-username" class="block text-sm font-medium text-gray-700 mb-1">Username or Email *</label>
                <input id="item-username" name="username" type="text" required placeholder="e.g. user@domain.com" class="w-full text-sm border border-gray-300 rounded-lg px-3.5 py-2.5 focus:outline-none focus:ring-2 focus:ring-purple-500" />
            </div>

            <div>
                <div class="flex items-center justify-between mb-1">
                    <label for="item-password" class="block text-sm font-medium text-gray-700">Password *</label>
                    <button id="modal-fill-generated-btn" type="button" class="text-xs text-purple-600 hover:text-purple-700 font-medium">Use generated</button>
                </div>
                <div class="relative">
                    <input id="item-password" name="password" type="password" required placeholder="••••••••••••" class="w-full text-sm border border-gray-300 rounded-lg px-3.5 py-2.5 pr-10 focus:outline-none focus:ring-2 focus:ring-purple-500" />
                    <button id="toggle-modal-password-btn" type="button" class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="pt-2">
                <label class="flex items-center space-x-2 text-sm text-gray-700 cursor-pointer">
                    <input id="item-shared" name="is_shared" type="checkbox" class="rounded text-purple-600 focus:ring-purple-500" />
                    <span>Share this credential with other local users</span>
                </label>
            </div>

            <div class="pt-4 border-t border-gray-100 flex items-center justify-end space-x-3">
                <button id="cancel-modal-btn" type="button" class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition">Cancel</button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 rounded-lg shadow-sm transition">Save Credential</button>
            </div>
        </form>
    </div>
</div>
