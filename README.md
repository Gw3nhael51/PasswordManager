# data-panel-php

Application web PHP conteneurisée avec Docker et orchestrée via Docker Compose, structurée selon le patron d'architecture logicielle **MVC-P**.

---

## Architecture logicielle (MVC-P)

Le projet est découpé selon le motif d'architecture **MVC** complété par le module métier **Product** :

- **M (Model - Gestion des données et persistance) :**
  - **Rôle précis :** Il fait l'abstraction de la base de données relationnelle (MySQL via l'extension PDO). Aucun code HTML ou logique de routage ne s'y trouve.
  - **Contenu concret :** 
    - `Database.php` : Classe de connexion singleton utilisant PDO pour interagir avec la base.
    - `User.php` : Modèle gérant les utilisateurs (requêtes SQL préparées `SELECT * FROM users WHERE username = :username`, hachage et vérification des mots de passe via `password_verify()`).

- **V (View - Rendu graphique et templates) :**
  - **Rôle précis :** Se charge uniquement de l'affichage HTML/CSS pour le navigateur. Reçoit des données préformatées envoyées par les contrôleurs.
  - **Contenu concret :**
    - `header.php` / `footer.php` : Structure HTML5 commune (DOCTYPE, meta responsive, inclusion de `global.css`).
    - `home.php` : Page d'accueil avec le bouton CTA redirigeant vers la connexion.
    - `login.php` : Interface du formulaire de connexion envoyant les requêtes en `POST`.

- **C (Controller - Logique applicative et orchestration) :**
  - **Rôle précis :** Intercepte les actions de l'utilisateur (`GET`, `POST`), valide les champs soumis, interroge les modèles pour manipuler les données et décide quelle vue charger ou vers quelle page rediriger.
  - **Contenu concret :**
    - `AuthController.php` : Récupère `$_POST['username']` et `$_POST['password']`, sollicite `User.php` pour valider les identifiants, initialise la session `$_SESSION['user']`, et effectue la redirection (`header('Location: ...')`) ou renvoie un message d'erreur à la vue.

- **P (Product - Module métier dédié au catalogue) :**
  - **Rôle précis :** Ce dossier isole l'intégralité du domaine métier "Produits" du reste de l'application (approche modulaire). Cela évite de mélanger la gestion des utilisateurs/authentification avec la logique commerciale des produits.
  - **Contenu concret :**
    - `Product.php` : Entité représentant un produit (identifiant, référence, libellé, prix hors taxe, quantité en stock, calcul de TVA).
    - `ProductController.php` : Gère le cycle de vie des produits (CRUD : lister les articles du catalogue, afficher une fiche produit, mettre à jour le stock après une commande).

---

## Arborescence détaillée du projet

```text
├── Dockerfile                  # Construction de l'image Docker PHP 8.2 CLI + extensions PDO MySQL
├── Makefile                    # Commandes d'automatisation (build, up, watch, down)
├── README.md                   # Documentation technique et d'architecture
├── docker-compose.dev.yaml     # Configuration Docker Compose (ports 8000:8000, volume ./app)
└── app/
    ├── index.php               # Routeur central (aiguille / et /login.php vers les bonnes vues)
    │
    ├── Controller/             # Logique applicative générale
    │   └── AuthController.php  # Traitement du login/logout, gestion de session et redirections
    │
    ├── Model/                  # Couche de données et accès base
    │   ├── Database.php        # Initialisation de la connexion PDO MySQL
    │   └── User.php            # Requêtes préparées pour la gestion des comptes utilisateurs
    │
    ├── Product/                # Module métier autonome "Catalogue Produits"
    │   ├── Product.php         # Entité produit (propriétés, prix, stock, calculs métier)
    │   └── ProductController.php # Actions de consultation et modification des produits
    │
    ├── View/                   # Templates d'affichage HTML (sans DOCTYPE dupliqué)
    │   ├── header.php          # Squelette haut de page + lien CSS /style/global.css
    │   ├── footer.php          # Fermeture </body></html>
    │   ├── home.php            # Écran d'accueil avec bouton d'accès à la connexion
    │   └── login.php           # Formulaire de connexion (sécurisé en méthode POST)
    │
    └── style/                  # Feuilles de style
        └── global.css          # Thème sombre moderne, formulaires et boutons responsive
```

---

## Démarrage rapide

Le projet utilise Docker pour garantir un environnement de développement reproductible.

### 1. Construire l'image

```bash
make build
```

### 2. Démarrer l'application

```bash
make up
```

L'application est accessible sur [http://localhost:8000](http://localhost:8000).

### 3. Mode développement (synchronisation à chaud)

```bash
make watch
```

### 4. Arrêter les conteneurs

```bash
make down
```
