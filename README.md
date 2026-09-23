# PasswordManager - Self-Hosted Local Password Vault & Security Dashboard

An open-source, local-first password manager and security dashboard built with **PHP 8.2**, **PostgreSQL 16**, **Docker**, and **Vanilla JavaScript** styled with **Tailwind CSS**.

---

## 🎯 Purpose & Philosophy

VaultPanel is designed to run entirely offline on a local machine (`localhost`). It requires **no cloud registration**, **no external dependencies**, and stores sensitive credentials in an isolated, encrypted PostgreSQL database running inside a Docker container.

This project serves as a hands-on learning environment to practice:
- **PHP**: MVC architecture, PDO database abstraction, OpenSSL symmetric encryption (AES-256), session management, and JSON API design.
- **Docker & Docker Compose**: Multi-container orchestration (PHP CLI server + PostgreSQL), file synchronization with `watch`, and data volume persistence.
- **SQL (PostgreSQL)**: Relational schema design, role isolation, data aggregation (`COUNT`, `AVG`, `GROUP BY`), and indexes.
- **JavaScript (ES6+)**: Consuming internal REST APIs via `fetch()`, interactive password generator, clipboard management, and data visualization with Chart.js.

---

## ✨ Features

- **🔐 Personal Encrypted Vault**: Store, update, and manage credentials (title, URL, username, encrypted password, category, notes, favorites).
- **👥 Role-Based Access Control (RBAC)**:
  - **`user`**: Private access to personal credentials, view/copy access to shared credentials, personal password health analytics.
  - **`admin`**: Full access to personal credentials, create/update/delete shared items, user management, and security audit logs.
- **📊 Security Audit Dashboard**:
  - Global password health score.
  - Identification of weak, reused, or outdated passwords.
  - Category breakdown and credential distribution.
- **⚡ Interactive Password Generator**:
  - Configurable length and character sets (uppercase, lowercase, numbers, symbols).
  - Real-time password strength meter and one-click copy with automatic clipboard clearing.
- **🛡️ AES-256 Symmetric Encryption**: Passwords encrypted at rest using PHP's native `openssl_encrypt()` before reaching the database.

---

## 🏗️ Architecture

```text
├── Dockerfile                  # PHP 8.2 runtime with PDO PostgreSQL & OpenSSL
├── docker-compose.dev.yaml     # Orchestrates web service and PostgreSQL container
├── Makefile                    # Developer shortcuts (build, up, watch, db-init)
├── README.md                   # Project documentation
└── app/
    ├── index.php               # Front controller & central router
    │
    ├── Controller/             # Application controllers
    │   ├── auth.php            # Session & authentication handler
    │   ├── register.php        # Account creation handler
    │   └── VaultController.php # Password manager CRUD & API actions
    │
    ├── Model/                  # Data access layer
    │   ├── config.php          # Database PDO connection singleton
    │   ├── User.php            # User authentication & role management
    │   └── Vault.php           # Vault items, encryption & SQL queries
    │
    ├── database/
    │   └── init.sql            # PostgreSQL schema definition & test seed data
    │
    ├── View/                   # Presentation layer (HTML5 / Tailwind CSS)
    │   ├── header.php          # HTML layout header & Tailwind setup
    │   ├── footer.php          # HTML layout footer
    │   ├── home.php            # Landing page
    │   ├── login.php           # Login form
    │   ├── dashboard.php       # Main dashboard layout
    │   └── components/         # Reusable dashboard widgets
    │       ├── sidebar.php     # Navigation sidebar (with admin links)
    │       ├── topbar.php      # User session profile & quick actions
    │       ├── stats_cards.php # Security metrics & counter cards
    │       ├── generator.php   # Interactive JS password generator
    │       └── vault_list.php  # Credential table with search & filters
    │
    └── style/
        └── global.css          # Custom styling additions
```

---

## 🚀 Quick Start

### 1. Requirements
- [Docker](https://www.docker.com/) and [Docker Compose](https://docs.docker.com/compose/)
- [Make](https://www.gnu.org/software/make/) (optional, but recommended)

### 2. Build and Start the Application

```bash
# Build Docker images
make build

# Start containers in detached mode
make up
```

The application is now accessible at [http://localhost:8000](http://localhost:8000).

### 3. Development Mode (Hot-Reload)

To enable live file synchronization:

```bash
make watch
```

### 4. Database Reset / Seed

To re-apply [app/database/init.sql](file:///home/orion-pc/dev/projets/cours/docker/php_docker/app/database/init.sql):

```bash
make db-init
```

---

## 🔑 Default Test Accounts

| Username | Password | Role | Access Level |
| :--- | :--- | :---: | :--- |
| `admin` | `securepass` | `admin` | Full management, shared vault, users |
| `test_user` | `123456` | `user` | Personal vault, shared vault (read-only) |

---

## 🛠️ Useful Commands

| Command | Description |
| :--- | :--- |
| `make up` | Start all services in the background |
| `make down` | Stop all services |
| `make logs` | Stream container logs |
| `make sh` | Open a shell in the PHP web container |
| `make db-shell` | Open an interactive `psql` PostgreSQL console |
| `make clean` | Stop containers and remove persisted volumes |
