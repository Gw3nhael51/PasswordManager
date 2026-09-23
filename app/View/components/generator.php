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

    <!-- Affichage : Présenter le mot de passe généré et les actions -->
    <div class="mt-5 space-y-2">
        <div class="relative flex items-center bg-gray-900 border border-gray-800 rounded-xl p-2 shadow-inner transition focus-within:border-purple-500/80 focus-within:ring-2 focus-within:ring-purple-500/20">
            <label for="gen-output" class="sr-only">Generated Password</label>
            <input id="gen-output" type="text" readonly class="w-full bg-transparent border-0 px-3 py-2 font-mono text-base sm:text-lg font-semibold tracking-wider text-purple-300 selection:bg-purple-600 selection:text-white focus:outline-none" value="" />
            
            <div class="flex items-center space-x-1.5 pl-2 pr-1">
                <button id="gen-refresh-btn" type="button" title="Regenerate" class="p-2 text-gray-400 hover:text-purple-400 hover:bg-gray-800 rounded-lg transition active:scale-95">
                    <span class="sr-only">Regenerate</span>
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </button>
                <button id="gen-copy-btn" type="button" title="Copy to clipboard" class="inline-flex items-center gap-1.5 px-3 py-2 text-xs sm:text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 rounded-lg shadow-sm transition active:scale-95 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                    <svg id="gen-copy-icon" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                    </svg>
                    <span id="gen-copy-text">Copy</span>
                </button>
            </div>
        </div>

        <!-- Indicateur : Afficher la force du mot de passe -->
        <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden">
            <div id="gen-strength-bar" class="bg-emerald-500 h-full rounded-full transition-all duration-300" style="width: 80%;"></div>
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
