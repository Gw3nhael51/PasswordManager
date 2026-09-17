COMPOSE = docker compose -f docker-compose.dev.yaml

.PHONY: build up watch down logs run

# Construction de l'image
build:
	$(COMPOSE) build

# Lancement en arrière-plan
up:
	$(COMPOSE) up -d

# Lancement en mode watch (synchronisation en temps réel)
watch:
	$(COMPOSE) watch

# Arrêt des conteneurs
down:
	$(COMPOSE) down

# Suivi des logs
logs:
	$(COMPOSE) logs -f

# Exécution directe du conteneur
run:
	docker run -p 8000:8000 php-exercise

clean:
	docker system prune -f