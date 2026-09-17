FROM php:8.2-cli

# Installer les dépendances et extensions
RUN docker-php-ext-install pdo pdo_mysql

# Créer l'utilisateur non-root
RUN useradd -u 1000 -m appuser

WORKDIR /usr/src/myapp

# Copier le code avec les bons droits
COPY --chown=appuser:appuser . /usr/src/myapp
USER appuser

EXPOSE 8000
CMD ["php", "-S", "0.0.0.0:8000", "-t", "php"]