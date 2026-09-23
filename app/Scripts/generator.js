// Créer : Générer un mot de passe sécurisé selon les options
function genPass(len, upper, lower, nums, special) {
    const lowerChars = "abcdefghijklmnopqrstuvwxyz";
    const upperChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const numChars = "0123456789";
    const specialChars = "!@#$%^&*()-_=+[]{}|;:,.<>?";

    let chars = "";

    if (lower) chars += lowerChars;
    if (upper) chars += upperChars;
    if (nums) chars += numChars;
    if (special) chars += specialChars;

    if (chars.length === 0) {
        chars = lowerChars;
    }

    const randomValues = new Uint32Array(len);
    window.crypto.getRandomValues(randomValues);

    let pass = "";

    for (let i = 0; i < len; i++) {
        const randIdx = randomValues[i] % chars.length;
        pass += chars[randIdx];
    }

    return pass;
}

// Évaluer : Calculer la force du mot de passe et ajuster l'interface
function updateStrength(len, upper, lower, nums, special) {
    const bar = document.getElementById("gen-strength-bar");
    const badge = document.getElementById("gen-strength-badge");

    let count = 0;
    if (upper) count++;
    if (lower) count++;
    if (nums) count++;
    if (special) count++;

    let strength = "Strong";
    let width = "100%";
    let barColor = "bg-emerald-500";
    let badgeClasses = "bg-green-100 text-green-800";

    if (len < 10 || count <= 1) {
        strength = "Weak";
        width = "30%";
        barColor = "bg-rose-500";
        badgeClasses = "bg-rose-100 text-rose-800";
    } else if (len < 14 || count <= 2) {
        strength = "Medium";
        width = "65%";
        barColor = "bg-amber-500";
        badgeClasses = "bg-amber-100 text-amber-800";
    }

    if (bar) {
        bar.className = `${barColor} h-full rounded-full transition-all duration-300`;
        bar.style.width = width;
    }

    if (badge) {
        badge.className = `px-2.5 py-0.5 rounded-full text-xs font-medium ${badgeClasses}`;
        badge.textContent = strength;
    }
}

// Actualiser : Mettre à jour le mot de passe généré dans l'interface
function generate() {
    const lenInput = document.getElementById("gen-length");
    const lenVal = document.getElementById("gen-length-val");

    const len = lenInput
        ? Number.parseInt(lenInput.value, 10)
        : 16;

    if (lenVal) {
        lenVal.textContent = String(len);
    }

    const upper = document.getElementById("gen-opt-uppercase")?.checked ?? true;
    const lower = document.getElementById("gen-opt-lowercase")?.checked ?? true;
    const nums = document.getElementById("gen-opt-numbers")?.checked ?? true;
    const special = document.getElementById("gen-opt-symbols")?.checked ?? true;

    const pass = genPass(len, upper, lower, nums, special);

    const output =
        document.getElementById("gen-output") ||
        document.getElementById("passOut");

    if (output) {
        if ("value" in output) {
            output.value = pass;
        } else {
            output.textContent = pass;
        }
    }

    updateStrength(len, upper, lower, nums, special);
}

// Restaurer : Réinitialiser les paramètres par défaut du générateur
function reset() {
    const lenInput = document.getElementById("gen-length");
    if (lenInput) {
        lenInput.value = "16";
    }

    const lenVal = document.getElementById("gen-length-val");
    if (lenVal) {
        lenVal.textContent = "16";
    }

    const upper = document.getElementById("gen-opt-uppercase");
    if (upper) {
        upper.checked = true;
    }

    const lower = document.getElementById("gen-opt-lowercase");
    if (lower) {
        lower.checked = true;
    }

    const nums = document.getElementById("gen-opt-numbers");
    if (nums) {
        nums.checked = true;
    }

    const symbols = document.getElementById("gen-opt-symbols");
    if (symbols) {
        symbols.checked = true;
    }

    generate();
}

// Initialiser : Attacher les écouteurs d'événements du générateur
function initGenerator() {
    document.getElementById("gen-length")?.addEventListener("input", generate);
    document.getElementById("gen-refresh-btn")?.addEventListener("click", generate);

    document.getElementById("gen-copy-btn")?.addEventListener("click", () => {
        const output = document.getElementById("gen-output");
        if (output?.value) {
            navigator.clipboard.writeText(output.value);
            const copyText = document.getElementById("gen-copy-text");
            if (copyText) {
                copyText.textContent = "Copied!";
                setTimeout(() => {
                    copyText.textContent = "Copy";
                }, 1500);
            }
        }
    });

    document.getElementById("gen-opt-uppercase")?.addEventListener("change", generate);
    document.getElementById("gen-opt-lowercase")?.addEventListener("change", generate);
    document.getElementById("gen-opt-numbers")?.addEventListener("change", generate);
    document.getElementById("gen-opt-symbols")?.addEventListener("change", generate);

    generate();
}

// Démarrer : Lancer l'initialisation dès que le document est prêt
if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initGenerator);
} else {
    initGenerator();
}