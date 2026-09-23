<!-- Afficher : Présenter l'outil interactif de génération de mots de passe -->
<div class="bg-white shadow rounded-lg p-6">
    <div class="flex items-center justify-between pb-4 border-b border-gray-100">
        <h2 class="text-lg font-semibold text-gray-900 flex items-center">
            <svg class="h-5 w-5 text-purple-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
            </svg>
            Password Generator
        </h2>
        <span id="gen-strength-badge" class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Strong</span>
    </div>

    <!-- Affichage du mot de passe généré -->
    <div class="mt-5">
        <div class="relative flex items-center">
            <label for="gen-output" class="sr-only">Generated Password</label>
            <input id="gen-output" type="text" readonly class="w-full bg-gray-50 border border-gray-200 rounded-lg py-3 pl-4 pr-24 font-mono text-sm tracking-wider text-gray-800 focus:outline-none" value="" />
            <div class="absolute right-2 flex items-center space-x-1">
                <button id="gen-refresh-btn" type="button" title="Regenerate" class="p-1.5 text-gray-400 hover:text-purple-600 hover:bg-gray-100 rounded-md transition">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </button>
                <button id="gen-copy-btn" type="button" title="Copy to clipboard" class="p-1.5 text-gray-400 hover:text-purple-600 hover:bg-gray-100 rounded-md transition">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Indicateur de force visuel -->
        <div class="w-full bg-gray-100 h-1.5 rounded-full mt-3 overflow-hidden">
            <div id="gen-strength-bar" class="bg-green-500 h-1.5 transition-all duration-300" style="width: 80%;"></div>
        </div>
    </div>

    <!-- Paramètres de génération -->
    <div class="mt-6 space-y-4 text-sm">
        <div>
            <div class="flex justify-between items-center text-gray-700 mb-1">
                <label for="gen-length">Length</label>
                <span id="gen-length-val" class="font-bold text-purple-600">16</span>
            </div>
            <input id="gen-length" type="range" min="16" max="40" value="16" class="w-full accent-purple-600 cursor-pointer" />
        </div>

        <div class="grid grid-cols-2 gap-3 pt-2">
            <label class="flex items-center space-x-2 text-gray-600 cursor-pointer">
                <input id="gen-opt-uppercase" type="checkbox" checked class="rounded text-purple-600 focus:ring-purple-500" />
                <span>Uppercase (A-Z)</span>
            </label>
            <label class="flex items-center space-x-2 text-gray-600 cursor-pointer">
                <input id="gen-opt-lowercase" type="checkbox" checked class="rounded text-purple-600 focus:ring-purple-500" />
                <span>Lowercase (a-z)</span>
            </label>
            <label class="flex items-center space-x-2 text-gray-600 cursor-pointer">
                <input id="gen-opt-numbers" type="checkbox" checked class="rounded text-purple-600 focus:ring-purple-500" />
                <span>Numbers (0-9)</span>
            </label>
            <label class="flex items-center space-x-2 text-gray-600 cursor-pointer">
                <input id="gen-opt-symbols" type="checkbox" checked class="rounded text-purple-600 focus:ring-purple-500" />
                <span>Symbols (!@#$)</span>
            </label>
        </div>
    </div>
</div>
