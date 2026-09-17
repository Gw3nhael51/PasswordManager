FROM php:8.2-cli

# Installer les dépendances et extensions
RUN docker-php-ext-install pdo pdo_mysql \
# Créer l'utilisateur non-root
    && useradd -u 1000 -m appuser

WORKDIR /var/www/html

# Copier le code avec les bons droits
COPY --chown=appuser:appuser ./app /var/www/html

USER appuser

EXPOSE 8000

CMD ["php", "-S", "0.0.0.0:8000", "index.php"]