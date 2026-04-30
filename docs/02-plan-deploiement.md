# Plan de déploiement - CESIZen

## 1. Objectif

Ce document explique comment déployer l’application CESIZen dans un environnement cible.

L’objectif est de pouvoir installer l’application de manière claire et reproductible, depuis la récupération du code jusqu’à la vérification du bon fonctionnement.

## 2. Architecture

CESIZen est une application web développée avec Laravel.

Le projet est organisé comme suit :

- `backend/` : application Laravel
- `backend/app/` : logique métier
- `backend/routes/` : routes
- `backend/resources/views/` : interface Blade
- `backend/database/` : migrations et base SQLite
- `backend/tests/` : tests automatisés
- `.github/workflows/` : CI GitHub Actions
- `docs/` : documentation

L’application suit une architecture MVC.

## 3. Environnements

Trois environnements sont prévus :

- développement : travail local sur le projet
- test : validation avant mise en production
- production : version stable

## 4. Gestion des versions

Le projet utilise Git avec les branches suivantes :

- `develop` : développement
- `test` : validation
- `main` : version stable

Le cycle est le suivant :

```txt
develop -> test -> main
```

Une version stable est identifiée avec un tag, par exemple :

```txt
v1.0.0
```

## 5. Intégration continue

Une CI est mise en place avec GitHub Actions.

Elle est configurée dans :

```txt
.github/workflows/laravel-ci.yml
```

À chaque modification sur les branches principales, la CI :

- installe les dépendances
- prépare l’environnement
- lance les migrations
- exécute les tests

Si un test échoue, la version n’est pas validée.

## 6. Prérequis

Pour déployer l’application, il faut :

- PHP 8.2 ou supérieur
- Composer
- Git
- SQLite
- un serveur web Apache ou Nginx

## 7. Déploiement

Étapes principales :

```bash
cd /var/www
git clone URL_DU_DEPOT cesizen
cd cesizen/backend
composer install --no-dev --optimize-autoloader
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Le serveur web doit pointer vers :

```txt
/var/www/cesizen/backend/public
```

## 8. Configuration

Le fichier `.env` contient la configuration de l’application.

Il n’est pas versionné.

Exemple pour SQLite :

```txt
APP_ENV=production
APP_DEBUG=false
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

## 9. Vérification

Après le déploiement, il faut vérifier :

- accès à la page d’accueil
- inscription utilisateur
- connexion
- accès au diagnostic
- protection des pages admin

Tests automatisés :

```bash
php artisan test
```

## 10. Retour arrière

En cas de problème, on revient à une version stable :

```bash
git checkout v1.0.0
composer install --no-dev --optimize-autoloader
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan test
```

## 11. Sauvegarde

Avant chaque mise à jour, la base doit être sauvegardée :

```bash
cp database/database.sqlite database/backup.sqlite
```

## 12. Périmètre

Le projet est prêt à être déployé :

- structure du dépôt propre
- branches organisées
- CI en place
- tests fonctionnels
- procédure de déploiement définie
- procédure de rollback définie

La mise en ligne sur serveur peut se faire directement à partir de ce plan.