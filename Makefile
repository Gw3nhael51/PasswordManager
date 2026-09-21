COMPOSE = docker compose -f docker-compose.dev.yaml

.PHONY: help build up watch down restart logs ps sh db-shell db-init clean

# afficher l'aide
help:
	@echo "Commandes disponibles :"
	@echo "  make build     - Construire les images Docker"
	@echo "  make up        - Démarrer l'application et la base de données en arrière-plan"
	@echo "  make watch     - Démarrer en mode watch (synchronisation en temps réel)"
	@echo "  make down      - Arrêter les conteneurs"
	@echo "  make restart   - Redémarrer les conteneurs"
	@echo "  make logs      - Suivre les logs de tous les conteneurs"
	@echo "  make ps        - Afficher l'état des conteneurs"
	@echo "  make sh        - Ouvrir un shell dans le conteneur PHP"
	@echo "  make db-shell  - Ouvrir la console PostgreSQL (psql)"
	@echo "  make db-init   - Réinitialiser la base de données avec init.sql"
	@echo "  make clean     - Arrêter les conteneurs et supprimer les volumes"

# construire les images
build:
	$(COMPOSE) build

# lancer les conteneurs en arrière-plan
up:
	$(COMPOSE) up -d

# lancer en mode watch (développement)
watch:
	$(COMPOSE) watch

# arrêter les conteneurs
down:
	$(COMPOSE) down

# redémarrer les conteneurs
restart:
	$(COMPOSE) restart

# suivre les logs
logs:
	$(COMPOSE) logs -f

# afficher l'état des conteneurs
ps:
	$(COMPOSE) ps

# ouvrir un shell dans le conteneur PHP
sh:
	$(COMPOSE) exec web sh

# ouvrir la console psql dans le conteneur postgresql
db-shell:
	$(COMPOSE) exec database psql -U postgres -d dashboard_db

# réexécuter le script init.sql dans la base
db-init:
	$(COMPOSE) exec -T database psql -U postgres -d dashboard_db < app/database/init.sql

# arrêter et nettoyer les volumes et conteneurs
clean:
	$(COMPOSE) down -v